<?php

namespace PRG\FrontendBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Validator\Constraints\DateTime;
use LinkedIn\LinkedIn;

use PRG\FrontendBundle\Entity\User;
use PRG\FrontendBundle\Entity\Position;
use PRG\FrontendBundle\Entity\Location;
use PRG\FrontendBundle\Entity\Country;
use PRG\FrontendBundle\Entity\Company;
use PRG\FrontendBundle\Entity\Skill;
use PRG\FrontendBundle\Entity\Education;

class DoctrineController extends Controller
{
  /**
   * @Route("/{_locale}", name="homepage", defaults={"_locale": "en"}, requirements={
   *     "_locale": "en|it"
   * })
   */  
  public function homeAction(Request $request) {
    $locale = $request->getLocale();

    $repository = $this->getDoctrine()->getRepository('FrontendBundle:User');
    $user = $repository->findOneByLinkedinId($this->container->getParameter('linkedin.user_id'));

    //$categoryName = $product->getCategory()->getName();

    if(!$user) {
      $user = new User();
      $user->setLinkedinId($this->container->getParameter('linkedin.user_id'));
      $user->setTranslatableLocale($locale); // change locale

      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();  
    }

    //dump($user);die;
    
    $name = $this->get('translator')->trans('name');
    $email = $this->get('translator')->trans('email');
    $message = $this->get('translator')->trans('message');
    $send = $this->get('translator')->trans('send');

    $defaultData = array('message' => $this->get('translator')->trans('Type your message here'));
    
    $form = $this->createFormBuilder($defaultData)
        ->add('name', 'text', array('label' => $name))
        ->add('email', 'email', array('label' => $email))
        ->add('message', 'textarea', array('label' => $message))
        ->add('send', 'submit', array('label' => $send))
        ->getForm()
    ;
    $form->handleRequest($request);
    $this->processForm($form);
    
    return $this->render('FrontendBundle:Templates:home.html.twig', array(
          'locale' => $locale,
          'user' => $user, 
          'form' => $form->createView()
        ));    
  }
  
  public function processForm($form) {
    if ($form->isValid()) {
      // data is an array with "name", "email", and "message" keys
      $data = $form->getData();
      //dump($data);

      $mailer = $this->get('mailer');
      $message = $mailer->createMessage()
          ->setSubject('New email from piergi.com')
          ->setFrom($data['email'])
          ->setTo($this->container->getParameter('mailer_user'))
          ->setBody($data['message'], 'text/html')
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
  }
  
  /**
   * @Route("/update/", name="update_page")
   */
  public function updateAction(Request $request)
  {
    $defaultLocale = $this->container->getParameter('locale');
    
    //dump($locale);die;
    
    $session = $request->getSession();
    $linkedinTokens = $session->get('linkedin_tokens');
    //$sessionAccessToken = $linkedinTokens['access_token'];
    //print_r('$sessionAccessToken: '.$sessionAccessToken);die;
    
    $session->set('_locale', $defaultLocale);
    $locale = $session->get('_locale');
    //dump('$locale = $session->set(_locale, $defaultLocale): '. $locale);die;
     
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
    $info = $li->get('/people/~:(id,first-name,last-name,picture-url,last-modified-timestamp,positions:(id,title,isCurrent,startDate,endDate,company,location,summary),industry,languages:(id,language,proficiency),skills,educations:(id,school-name,field-of-study,start-date,end-date,degree))');
    //$info = $li->get('/people/~');
    //$info = $li->get('/people/id=kZZE2X_xU3');
    //$info = json_encode($info);
    //dump($info);die;
    /*
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
    */
    //dump($info['educations']['values']);die;
    
    //$em = $this->getDoctrine()->getRepository('FrontendBundle:User');
    //$user = $em->findOneByLinkedinId($this->container->getParameter('linkedin.user_id'));

    
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

  public function updateUser($info)
  {
    $locale = $this->container->getParameter('locale');
    //$session = $request->getSession();
    //$locale = $session->get('_locale');
    //dump('$locale = $session->get(_locale): '. $locale);
    
    $repository = $this->getDoctrine()->getRepository('FrontendBundle:User');
    $user = $repository->findOneByLinkedinId($this->container->getParameter('linkedin.user_id'));
    
    
    //$user->setLinkedinId($info['linkedinId']);
    $user->setFirstName($info['firstName']);
    $user->setLastName($info['lastName']);
    $user->setIndustry($info['industry']);
    //$user->setLastModifiedTimestamp(time());
    $user->setPictureUrl($info['pictureUrl']);
    
    if($info['languages']['_total'] > 0) {
      //$user->setLanguages($info['languages']['values']);
    }
    
    if($info['positions']['_total'] > 0){

      foreach($info['positions']['values'] as $position) {

        $existingPosition = $this->getDoctrine()
            ->getRepository('FrontendBundle:Position')
            ->findOneByLinkedinId($position['id'])
        ;
        $startMonth = ($position['startDate']['month']) ? $position['startDate']['month'] : 1;
        
        
        if($existingPosition) {
          $existingPosition->setUser($user);
          $existingPosition->setIsCurrent($position['isCurrent']);
          $existingPosition->setTitle($position['title']);
          $existingPosition->setSummary($position['summary']);
          $existingPosition->setTranslatableLocale($locale);
          
          $existingLocation = $existingPosition->getLocation();
          if($existingLocation) {
            $existingLocation->setName($position['location']['name']);
            $existingLocation->setPosition($existingPosition);
            $existingLocation->setTranslatableLocale($locale);
            if(isset($position['location']['country'])) {
              $existingCountry = $existingLocation->getCountry();
              if($existingCountry) {
                $existingCountry->setCode($position['location']['country']['code']);
                $existingCountry->setName($position['location']['country']['name']);
                $existingCountry->setLocation($existingLocation);
                $existingCountry->setTranslatableLocale($locale);
              } else {
                $newCountry = new Country();
                $newCountry->setCode($position['location']['country']['code']);
                $newCountry->setName($position['location']['country']['name']);
                $newCountry->setLocation($existingLocation);
                $newCountry->setTranslatableLocale($locale);
                //$existingLocation->setCountry($newCountry);              
              }
            }
            $existingLocation->setPosition($existingPosition);
            $existingPosition->setLocation($existingLocation);
          } else {
            $newLocation = new Location();
            $newLocation->setName($position['location']['name']);
            $newLocation->setPosition($existingPosition); 
            $newLocation->setTranslatableLocale($locale);
            if(isset($position['location']['country'])) {
              $newCountry = new Country();
              $newCountry->setCode($position['location']['country']['code']);
              $newCountry->setName($position['location']['country']['name']);
              $newCountry->setLocation($newLocation);
              $newCountry->setTranslatableLocale($locale);
            }
            $newLocation->setPosition($existingPosition);
            $existingPosition->setLocation($newLocation);
          }
          
          $existingCompany = $existingPosition->getCompany();
          if($existingCompany) {
            $existingCompany->setName($position['company']['name']);
            $existingCompany->setPosition($existingPosition);
            $existingPosition->setCompany($existingCompany);
          } else {
            $newCompany = new Company();
            $newCompany->setName($position['company']['name']);
            $newCompany->setPosition($existingPosition);
            $existingPosition->setCompany($newCompany);             
          }
          
          $existingPosition->setStartDate(new \DateTime(date('Y-m-d', mktime(0,0,0,$startMonth,1,$position['startDate']['year']))));
          if(isset($position['endDate'])) {
            $endMonth = ($position['endDate']['month']) ? $position['endDate']['month'] : 1;
            $existingPosition->setEndDate(new \DateTime(date('Y-m-d', mktime(0,0,0,$endMonth,1,$position['endDate']['year']))));
          }

          //$repository->updatePosition($position);
        } else {        
          $newPosition = new Position();
          $newPosition->setUser($user);
          $newPosition->setLinkedinId($position['id']);
          $newPosition->setIsCurrent($position['isCurrent']);
          $newPosition->setTitle($position['title']);
          $newPosition->setSummary($position['summary']);  
          $newPosition->setTranslatableLocale($locale);
          
          $newLocation = new Location();
          $newLocation->setName($position['location']['name']);
          
          
          if(isset($position['location']['country'])) {
            $existingCountry = $this->getDoctrine()
              ->getRepository('FrontendBundle:Country')
              ->findOneByCode($position['location']['country']['code'])
            ;
            if(!$existingCountry) {
              $newCountry = new Country();
              $newCountry->setCode($position['location']['country']['code']);
              $newCountry->setName($position['location']['country']['name']);
              $newCountry->setLocation($newLocation);
              $newLocation->setCountry($newCountry);
              $newCountry->setTranslatableLocale($locale);
            } else {
              $newLocation->setCountry($existingCountry);
            }
          }
          $newLocation->setPosition($newPosition);
          $newPosition->setLocation($newLocation);  
          
          $newCompany = new Company();
          $newCompany->setName($position['company']['name']);
          $newCompany->setPosition($newPosition);
          $newPosition->setCompany($newCompany); 
          
          $newPosition->setStartDate(new \DateTime(date('Y-m-d', mktime(0,0,0,$startMonth,1,$position['startDate']['year']))));
          $user->addPosition($newPosition);
          //$dm->persist($user);
          //$dm->flush();
        }
      }

    }
    
    if($info['skills']['_total'] > 0) {
      foreach($info['skills']['values'] as $skill) {
        $existingSkill = $this->getDoctrine()
            ->getRepository('FrontendBundle:Skill')
            ->findOneByLinkedinId($skill['id'])
        ;     
        if(!$existingSkill) {
          $newSkill = new Skill();
          $newSkill->setLinkedinId($skill['id']);
          $newSkill->setName($skill['skill']['name']);
          $newSkill->setUser($user);
          $newSkill->setTranslatableLocale($locale);
          $user->addSkill($newSkill);
        }
      }
    }

    if($info['educations']['_total'] > 0) {
      foreach($info['educations']['values'] as $education) {
        $existingEducation = $this->getDoctrine()
            ->getRepository('FrontendBundle:Education')
            ->findOneByLinkedinId($education['id'])
        ;  
        $educationStartMonth = (isset($education['startDate']['month'])) ? $education['startDate']['month'] : 1;
        $educationEndMonth = (isset($education['endDate']['month'])) ? $education['endDate']['month'] : 1;
        if(!$existingEducation) {
          $newEducation = new Education();
          $newEducation->setLinkedinId($education['id']);
          $newEducation->setDegree($education['degree']);
          if(isset($education['fieldOfStudy']))
            $newEducation->setFieldOfStudy($education['fieldOfStudy']);
          $newEducation->setSchoolName($education['schoolName']);
          
          if(isset($education['startDate']))
            $newEducation->setStartDate(new \DateTime(date('Y-m-d', mktime(0,0,0,$educationStartMonth,1,$education['startDate']['year']))));
          if(isset($education['endDate']))
            $newEducation->setEndDate(new \DateTime(date('Y-m-d', mktime(0,0,0,$educationEndMonth,1,$education['endDate']['year']))));
          $newEducation->setUser($user);
          $user->addEducation($newEducation);
          $newEducation->setTranslatableLocale($locale);
        } else {
          $existingEducation->setDegree($education['degree']);
          if(isset($education['fieldOfStudy']))
            $existingEducation->setFieldOfStudy($education['fieldOfStudy']);
          $existingEducation->setSchoolName($education['schoolName']);  
          if(isset($education['startDate']))
            $existingEducation->setStartDate(new \DateTime(date('Y-m-d', mktime(0,0,0,$educationStartMonth,1,$education['startDate']['year']))));
          if(isset($education['endDate']))
            $existingEducation->setEndDate(new \DateTime(date('Y-m-d', mktime(0,0,0,$educationEndMonth,1,$education['endDate']['year']))));     
          $existingEducation->setTranslatableLocale($locale);
        }
      }
    }
    
    $user->setTranslatableLocale($locale); // set locale to default
    //dump('$user->setTranslatableLocale($locale): ' . $locale);
    
    $em = $this->getDoctrine()->getManager();
    $em->persist($user);
    $em->flush();      
  }


}
