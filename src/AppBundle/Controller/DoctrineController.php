<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Product;

class DoctrineController extends Controller
{
  /**
   * @Route("/doctrine/create/{name}", name="doctrine_create")
   */
  public function createAction($name)
  {
    $product = new Product();
    $product->setName($name);
    $product->setTranslatableLocale('it'); // change locale
    
    $em = $this->getDoctrine()->getManager('test');
    $em->persist($product);
    $em->flush();

    //exit(\Doctrine\Common\Util\Debug::dump($product));
    return new Response('Created product id '.$product->getId());
  }
}
