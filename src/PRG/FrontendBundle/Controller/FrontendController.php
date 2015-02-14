<?php

namespace PRG\FrontendBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use PRG\FrontendBundle\Form\StokeType;

//use Symfony\Component\Validator\Constraints\NotBlank;
//use Symfony\Component\Validator\Constraints as Assert;
//use Symfony\Component\Validator\Constraints\Type;

class FrontendController extends Controller
{
  /**
   * @Route("/start", name="start")
   */
  public function startAction()
  {
    // BundleName:DirectoryName:FileName 
    return $this->render('FrontendBundle:Templates:start.html.twig');
    //return new Response('<html><body>This is the start page!</body></html>'); //ok
  }

  /**
   * @Route("/stokes", name="stoke")
   */
  public function stokeAction(Request $request)
  {
    $name = $request->get('name');
    $quantity = $request->get('quantity');  
    $buying_price = $request->get('buying_price'); 
    $selling_price = $request->get('selling_price'); 
    
    $defaultData = array(
      'name' => isset($name) ? $name : '',
      'quantity' => isset($quantity) ? $quantity : 4000, 
      'buying_price' => isset($buying_price) ? $buying_price : 1, 
      'selling_price' => isset($selling_price) ? $selling_price : 2
    );
    // form created inside the Controller:
    /*
    $form = $this->createFormBuilder($defaultData)
      ->add('quantity', 'integer')
      ->add('buying_price', 'number', array('label' => 'Prezzo di acquisto', 'precision' => 4))
      ->add('selling_price', 'text', array(
          'label' => 'Prezzo di vendita', 
          //'precision' => 4,
          'constraints' => array(
              new NotBlank(array('message' => 'custom message from Piergi')),
              new Type(array(
                'type'    => 'numeric',
                'message' => 'The value {{ value }} is not a valid {{ type }}.',
              ))              
            )
          ))
      //->add('total_amount', 'money', array('label' => 'Somma investita'))
      ->add('calculate', 'submit')
      ->add('saveInSession', 'submit', array('label' => 'Save in session'))
      ->getForm();
      */
    
    // form created in its own PHP class
    $form = $this->createForm(new StokeType(), $defaultData);
    
    $form->handleRequest($request);

    if ($form->isValid()) {
      // data is an array with "quantity", "buying_price", and "selling_price" keys
      $data = $form->getData();

      //$this->storeInSession($request, $data);
      $form->get('saveInSession')->isClicked() ? $this->storeInSession($request, $data) : null ;
      
      if($request->isXmlHttpRequest()) {
        $json = json_encode($data);
        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
      }
    }

    return $this->render('FrontendBundle:Templates:stoke.html.twig', array(
      'form' => $form->createView(),
      'data' => $form->getData()
    ));              
  }    
  
  public function storeInSession(Request $request, $data) {
    $session = $request->getSession();
    $array =  $session->get('data');

    // if not exixts, save in session 
    $exists = false;
    if($array) {
      foreach($array as $item) {
        if($item['quantity'] == $data['quantity'] && 
                $item['buying_price'] == $data['buying_price'] &&
                $item['selling_price'] == $data['selling_price']) {
          $exists = true;
        }
      } 
    }
    if(!$exists) {
      $array[] = $data; // adding data to array
    }
    $session->set('data', $array);
  }
  /**
   * @Route("/remove-from-session/{key}", name="remove_from_session")
   */    
  public function removeFromSession(Request $request, $key) {
    $session = $request->getSession();
    $array =  $session->get('data');  
    unset($array[$key]);
    $session->set('data', $array);

    return $this->redirect($this->generateUrl('stoke'));
  }
  /**
   * @Route("/set-in-form/{key}", name="set_in_form")
   */    
  public function setInForm(Request $request, $key) {
    $session = $request->getSession();
    $array =  $session->get('data');  
    //unset($array[$key]);
    //$session->set('data', $array);

     return $this->redirect($this->generateUrl('stoke', array(
        'name' => $array[$key]['name'],
        'quantity' => $array[$key]['quantity'],
        'buying_price' => $array[$key]['buying_price'],
        'selling_price' => $array[$key]['selling_price']
       )));
  }

  /**
   * @Route("/ajax", name="ajax")
   */  
  public function ajaxAction() {
    // do something
    $articles = array();
    
    return $this->render(
        'FrontendBundle:Templates/Partials:ajax.html.twig', array('articles' => $articles)
    );    
  }
}
