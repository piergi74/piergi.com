<?php

namespace PRG\FrontendBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PRG\FrontendBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;


class DoctrineController extends Controller
{
  /**
   * @Route("/doctrine/create/{name}", name="doctrine_create")
   */
  public function createAction($name)
  {
    $product = new Product();
    $product->setName($name);

    $em = $this->getDoctrine()->getManager();
    $em->persist($product);
    $em->flush();

    //exit(\Doctrine\Common\Util\Debug::dump($product));
    return new Response('Created product id '.$product->getId());
  }
}
