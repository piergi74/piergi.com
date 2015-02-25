<?php

namespace PRG\FrontendBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;
use LinkedIn\LinkedIn;

use PRG\FrontendBundle\Document\User;
use PRG\FrontendBundle\Document\Position;

class HomeController extends Controller
{
  /**
   * @Route("/{_locale}", name="homepage", defaults={"_locale": "en"}, requirements={
   *     "_locale": "en|it"
   * })
   */  
  public function homeAction(Request $request) {
    
    //$_locale = $request->getLocale();
    
    $locale = $request->getLocale();

    //$request->setLocale($_locale);    
    //dump($request->getLocale());
    
    /*
    $to = "piergiorgio.pili@gmail.com";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: piergiorgio.pili@gmail.com" . "\r\n";

    mail($to,$subject,$txt,$headers);
    die;
    */

    $dm = $this->get('doctrine_mongodb')->getManager();
    $repository = $dm->getRepository('FrontendBundle:User');
    /*
    $user = $repository->findOneBy(
              array('linkedinId' => $this->container->getParameter('linkedin.user_id')), 
              array('positions.id','DESC')
            );  
     * 
     */
    
    $user = $dm
        ->createQueryBuilder('FrontendBundle:User')
        ->field('linkedinId')->equals($this->container->getParameter('linkedin.user_id'))
        //->field('positions')->sort('title', 'ASC') // no
        ->getQuery()
        ->getSingleResult()
        //->execute()
      ;  

    //dump($user);
    
    $name = $this->get('translator')->trans('name');
    $message = $this->get('translator')->trans('message');
    $send = $this->get('translator')->trans('send');

    $defaultData = array('message' => $this->get('translator')->trans('Type your message here'));
    
    $form = $this->createFormBuilder($defaultData)
        ->add('name', 'text', array('label' => $name))
        ->add('email', 'email')
        ->add('message', 'textarea', array('label' => $message))
        ->add('send', 'submit', array('label' => $send))
        ->getForm();

    $form->handleRequest($request);

    if ($form->isValid()) {
        // data is an array with "name", "email", and "message" keys
        $data = $form->getData();
        dump($data);
        
        $mailer = $this->get('mailer');
        $message = $mailer->createMessage()
            ->setSubject('You have Completed Registration!')
            ->setFrom('piergi@tiscali.it')
            ->setTo($data['email'])
            ->setBody($data['message'],
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;
        $mailer->send($message);        

    }
    
    return $this->render('FrontendBundle:Templates:home.html.twig', array(
          'locale' => $locale,
          'user' => $user, 
          'form' => $form->createView()
        ));    
  }
  
  /**
   * @Route("/update/", name="update_page"  )
   */
  public function updateAction(Request $request)
  {
    $session = $request->getSession();
    $linkedinTokens = $session->get('linkedin_tokens');
    //$sessionAccessToken = $linkedinTokens['access_token'];
    //print_r('$sessionAccessToken: '.$sessionAccessToken);die;
     
    $li = new LinkedIn(array(
        'api_key' => $this->container->getParameter('linkedin.api_key'), 
        'api_secret' => $this->container->getParameter('linkedin.secret_key'), 
        'callback_url' => $this->container->getParameter('linkedin.redirect_uri')
      ));
    
    if($request->get('error')) {
      // LinkedIn returned an error
      echo $request->get('error');
      die;
    } elseif($request->get('code') && !$linkedinTokens['access_token']) {
      //dump(empty($sessionAccessToken));die;
      // User authorized your application
      if (($request->get('state') == $request->get('state')) || !$linkedinTokens['expires_at'] ||
              (time() > $linkedinTokens['expires_at'])) {

          // Get token so you can make API calls
          $token = $li->getAccessToken($request->get('code'));
          //$token = $li->getAccessToken($_REQUEST['code']);
          $token_expires = $li->getAccessTokenExpiration();  //returns a json object

          // Store access token and expiration time
          //$linkedinTokens = $session->get('linkedin_tokens');
          $linkedinTokens['access_token'] = $token;
          $linkedinTokens['expires_in'] = $token_expires;
          $linkedinTokens['expires_at'] = time() + $token_expires;
          $session->set('linkedin_tokens', $linkedinTokens);

      } else {
          // CSRF attack? Or did you mix up your states?
          //print_r('exit');
          //exit;
      }      
     
    } else {
        //$linkedinTokens = $session->get('linkedin_tokens');
        //dump($session->get('linkedin_tokens/expires_at'));die; //null
        //dump(time() . ' ' .$linkedinTokens['expires_at']);die;
        //dump(time() > $linkedinTokens['expires_at']);die; //false
        //dump(time() > $session->get('linkedin_tokens/expires_at'));die; //true //not correct
        if(!$linkedinTokens['expires_at'] || (time() > $linkedinTokens['expires_at'])) {
            // Token has expired, clear the state
            //$_SESSION = array();
            $session->remove('linkedin_tokens');
        }
        if(!$linkedinTokens['access_token']) {
            // START authorization process
            //$this->getAuthorizationCode();
            $url = $li->getLoginUrl(
              array(
                LinkedIn::SCOPE_FULL_PROFILE, 
                LinkedIn::SCOPE_EMAIL_ADDRESS, 
                LinkedIn::SCOPE_NETWORK
              )
            );    
            return $this->redirect($url);
        }        
      $li->setAccessToken($linkedinTokens['access_token']);
    }
    
    /*
    // OAuth 2 Control Flow
    if (isset($_GET['error'])) {
        // LinkedIn returned an error
        print $_GET['error'] . ': ' . $_GET['error_description'];
        exit;
    } elseif (isset($_GET['code'])) {
        // User authorized your application
        if ($_SESSION['state'] == $_GET['state']) {
            // Get token so you can make API calls
            $this->getAccessToken();
        } else {
            // CSRF attack? Or did you mix up your states?
            exit;
        }
    } else { 
        if ((empty($_SESSION['expires_at'])) || (time() > $_SESSION['expires_at'])) {
            // Token has expired, clear the state
            $_SESSION = array();
        }
        if (empty($_SESSION['access_token'])) {
            // Start authorization process
            $this->getAuthorizationCode();
        }
    }
    */
    
    //$info = $li->get('/people/~:(first-name,last-name,positions,industry)');
    //$info = $li->get('/people/~/positions:(location)'); //ok
    //$info = $li->get('/people/~:(first-name,last-name,positions,positions:(location),industry)');
    $info = $li->get('/people/~:(id,first-name,last-name,picture-url,last-modified-timestamp,positions:(id,title,isCurrent,startDate,endDate,company,location,summary),industry,languages:(id,language,proficiency),skills,educations:(school-name,field-of-study,start-date,end-date,degree))');
    //$info = $li->get('/people/~');
    //$info = $li->get('/people/id=kZZE2X_xU3');
    //$info = json_encode($info);
    //dump($info);die;
    
    $id = json_encode($info['id']);
    $firstName = $info['firstName'];
    $lastName = $info['lastName'];
    $industry = $info['industry'];
    $lastModifiedTimestamp = json_encode($info['lastModifiedTimestamp']);
    $pictureUrl = $info['pictureUrl'];
    $educations = json_encode($info['educations']);
    $languages = json_encode($info['languages']);
    $positions = json_encode($info['positions']);
    $skills = json_encode($info['skills']);
    
    //dump($info['educations']['values']);die;
    
    $dm = $this->get('doctrine_mongodb')->getManager();
    $repository = $dm->getRepository('FrontendBundle:User');
    $user = $repository->findOneByLinkedinId($this->container->getParameter('linkedin.user_id')); //ok

    //$dm = $this->get('doctrine_mongodb')->getManager();
    //$user = $dm->getRepository('FrontendBundle:User')->find('{"_id":"'.$id.'"}');
    //$user = $this->get('doctrine_mongodb')->getRepository('FrontendBundle:User')->find($id);
    //$user = $repository->findAll();
    //$user = $repository->findOneBy(array('_id' => 'kZZE2X_xU3'));
    //$user = $repository->findOneByFirstName('Gigi');
    
    

    /*
    var_dump($user->getLastModifiedTimestamp()); //object
    var_dump(date('m/d/Y', (string)$user->getLastModifiedTimestamp())); //string '02/09/2015' (length=10)
    var_dump(date('m/d/Y', 1198419513)); //string '12/02/1973' (length=10)
    var_dump((string)$user->getLastModifiedTimestamp()); //
    var_dump(strtotime($lastModifiedTimestamp)); //
    var_dump($lastModifiedTimestamp); //string
    var_dump(new \DateTime(date('m/d/Y', $lastModifiedTimestamp)));
    var_dump(new \DateTime(date('m/d/Y', 1423494218)));
    var_dump($info['lastModifiedTimestamp']); //float
    die;
    */
    //dump($info['educations']['_total']);die;
    //dump($info['lastModifiedTimestamp']);die;
    $updatedInLinkedin = new \DateTime(date('m/d/Y', (string)$user->getLastModifiedTimestamp()));
    $updatedInMongo = new \DateTime(date('m/d/Y', substr($lastModifiedTimestamp, 0, -3)));
    //dump($info['positions']['values'][0]['id']);die;
    

    
    //if($user) {
      //if($updatedInLinkedin < $updatedInMongo) {
      if(3 < 4) {

        $this->updateUser($info);

        $uri = $uri = $this->get('router')->generate('homepage');
        return $this->redirect($uri);
        
      } else {
        
        return new Response('Nothing to update');      
      //$this->updateFromLinkedinAction($info);
      //throw $this->createNotFoundException('No user found for id '.$id);
      }
    //} else {
      //throw $this->createNotFoundException('No user found for id '.$id);
      //$this->updateFromLinkedinAction($info);
    //}  
 
    //return $this->render('FrontendBundle:Templates:home.html.twig', array('firstName' => $firstName));
    //return new Response($firstName);
  }
  
  public function updateUserOLD($info) 
  {
    $dm = $this->get('doctrine_mongodb')->getManager();
    $repository = $dm->getRepository('FrontendBundle:User');
    
    $qb = $dm->createQueryBuilder('FrontendBundle:User');
    $user = $qb
      ->update()
      //->multiple(true)
      //->addToSet('positions')
      //->addOr($qb->expr()->field('positions')->equals(false))
      ->field('firstName')->set($info['firstName'])
      ->field('lastName')->set($info['lastName'])
      ->field('industry')->set($info['industry'])
      ->field('lastModifiedTimestamp')->set(time())
      ->field('pictureUrl')->set($info['pictureUrl'])
      ->field('linkedinId')->equals($this->container->getParameter('linkedin.user_id'))
      ->field('positions')->exists(false)->set(array())  
      ->field('educations')->exists(false)->set($info['educations']['values'])
    ;
    $qb->getQuery()->execute();  
    //->getSingleResult();
    //dump($user);die;

    //Query::debug();           

    foreach($info['positions']['values'] as $position) {

      $qb1 = $dm->createQueryBuilder('FrontendBundle:User');
      $existingPosition = $qb1
        ->field('positions.linkedinId')->equals($position['id'])
        ->getQuery()->getSingleResult()
      ;    

      if($existingPosition) {
        $repository->updatePosition($position);
      } else {            
        $user->addPosition(new Position($position));
        $dm->persist($user);
        $dm->flush();
      }
    }             
  }

  public function updateUser($info)
  {
    $dm = $this->get('doctrine_mongodb')->getManager();
    $repository = $dm->getRepository('FrontendBundle:User');
    $user = $repository->findOneByLinkedinId($this->container->getParameter('linkedin.user_id'));
    
    //$user->setLinkedinId($info['linkediInd']);
    $user->setFirstName($info['firstName']);
    $user->setLastName($info['lastName']);
    $user->setIndustry($info['industry']);
    $user->setLastModifiedTimestamp(time());
    $user->setPictureUrl($info['pictureUrl']);
    
    if($info['educations']['_total'] > 0) {
      $user->setEducations($info['educations']['values']);
    }
    
    if($info['languages']['_total'] > 0) {
      $user->setLanguages($info['languages']['values']);
    }
    
    if($info['positions']['_total'] > 0){
      foreach($info['positions']['values'] as $position) {

        $existingPosition = $dm->createQueryBuilder('FrontendBundle:User')
          ->field('positions.linkedinId')->equals($position['id'])
          ->getQuery()->getSingleResult()
        ;            
        if($existingPosition) {
          $repository->updatePosition($position);
        } else {            
          $user->addPosition(new Position($position));
          $dm->persist($user);
          $dm->flush();
        }
      }
    }
    
    if($info['skills']['_total'] > 0) {
      $user->setSkills($info['skills']['values']);
    }


    $dm->persist($user);
    $dm->flush();      
  }
  
  /**
   * @Route("/updateOLD", name="update_mongodb")
   */    
  public function updateFromLinkedinActionOLD($info)
  {
    
    $id = json_encode($info['id']);
    $firstName = json_encode($info['firstName']);
    $lastName = json_encode($info['lastName']);
    $industry = json_encode($info['industry']);
    $lastModifiedTimestamp = json_encode($info['lastModifiedTimestamp']);
    $pictureUrl = json_encode($info['pictureUrl']);
    $educations = json_encode($info['educations']);
    $languages = json_encode($info['languages']);
    $positions = json_encode($info['positions']);
    $skills = json_encode($info['skills']);    
    
    $user = new User();
    //$user->setId('kZZE2X_xU3');
    $user->setFirstName('A Foo Bar');
    $user->setLastName('A Foo Bar');
    $user->setIndustry($info['industry']);
    $user->setLastModifiedTimestamp(time());
    $user->setPictureUrl('http://www.url.com');
    $user->setEducations(array('{"name":"french"},{"year":1999}'));
    $user->setLanguages(array('E' => 'F'));
    $user->setPositions(array('G' => 'H'));
    $user->setSkills(array('I' => 'B'));

    $dm = $this->get('doctrine_mongodb')->getManager();
    $dm->persist($user);
    $dm->flush();

    return new Response('Updated user id '.$user->getId());
  }
  
  /**
   * @Route("/posts", name="_demo_posts")
   */
  public function postsAction()
  {
    $dm = $this->get('doctrine_mongodb')->getManager();
    $repository = $dm->getRepository('FrontendBundle:User');    
      //$em = $this->getDoctrine()->getEntityManager();
      //$repository = $em->getRepository('AcmeDemoBundle:BlogPost');
      // create some posts in case if there aren't any
      if (!$repository->findOneByFirstName('Gianni')) {
          $post = new User();
          $post->setFirstName('Gianni');
          $post->setIndustry('Industry');

          $next = new User();
          $next->setFirstName('Gianni');
          $next->setIndustry('Industria');
          $next->setTranslatableLocale('it_it'); // change locale

          $dm->persist($post);
          $dm->persist($next);
          $dm->flush();
      }
      
      $posts = $dm->createQueryBuilder('FrontendBundle:User')
        ->field('firstName')->equals('Gianni')
        ->getQuery()->execute()
      ;            

      $post = $dm->createQueryBuilder('FrontendBundle:User')
        ->field('firstName')->equals('Gianni')
        //->field('linkedinId')->equals('kZZE2X_xU3')
        ->getQuery()->getSingleResult()
      ;         
      //dump($post->getSlug());die;
      $repository2 = $dm->getRepository('Gedmo\Translatable\Document\Translation');
      $translations = $repository2->findTranslations($post);
      
      //dump($translations);die;
      dump($posts->toArray());die;
      die(var_dump($posts).pretty());
  }  
}
