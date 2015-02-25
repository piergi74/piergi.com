<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Document\Product;
use AppBundle\Document\Article;

class MongoController extends Controller
{
  /**
   * @Route("/mongo/create", name="mongo_create")
   */  
  public function createAction()
  {
    $product = new Product();
    $product->setName('A Foo Bar');
    $product->setPrice('19.99');

    $dm = $this->get('doctrine_mongodb')->getManager();
    $dm->persist($product);
    $dm->flush();

    return new Response('Created product id '.$product->getId());
  }
  /**
   * @Route("/mongo", name="mongo_index")
   */    
  public function indexAction()
  {
    $products = $this->get('doctrine_mongodb')
        //->getManager()
        ->getRepository('FrontendBundle:Product')
        ->findAll()
      ;

    if(!$products) {
      throw $this->createNotFoundException('No product found for id '.$id);
    }
    $output = '';
    foreach($products as $product) {
      $output.= 'Product id '.$product->getId().' '.$product->getName().' '.$product->getPrice().'<br/>';
    }
    // do something, like pass the $product object into a template
    return new Response($output);
  }    
  
  /**
   * @Route("/mongo/show/{id}", name="mongo_show", requirements={"id": "\d+|\w+"})
   */    
  public function showAction($id)
  {
    //print_r('$id: ' . $id);die;
    $product = $this->get('doctrine_mongodb')
        //->getManager()
        ->getRepository('FrontendBundle:Product')
        ->find($id)
        //->findOneByPrice(19.99)
        //->findByPrice(19.99)
        ;
    //var_dump($product); //array
    //print_r('$product: ' . $product->getId());die;
    if (!$product) {
        throw $this->createNotFoundException('No product found for id '.$id);
    }
    // do something, like pass the $product object into a template
    return new Response('Product id '.$product->getId());
  }  
  /**
   * @Route("/mongo/update/{id}", name="mongo_update")
   */     
  public function updateAction($id)
  {
      $dm = $this->get('doctrine_mongodb')->getManager();
      $product = $dm->getRepository('FrontendBundle:Product')->find($id);

      if (!$product) {
          throw $this->createNotFoundException('No product found for id '.$id);
      }

      $product->setName('New product name!');
      $dm->flush();

      //return $this->redirect($this->generateUrl('homepage'));
      return new Response('Updated product id '.$product->getId());
  }  
}
