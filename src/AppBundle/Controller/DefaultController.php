<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Article;

class DefaultController extends Controller
{
  /**
   * @Route("/app/example", name="old_homepage")
   */
  public function indexAction()
  {
      return $this->render('default/index.html.twig');
  }
  
  /**
   * @Route("/app/posts", name="_app_demo_posts")
   */
  public function postsAction()
  {
    // doctrine

    $article = new Article();
    $article->setTitle('the title');
    $article->setCode('my code');
    
    $em = $this->getDoctrine()->getManager();
    $em->persist($article);
    $em->flush();

    dump($article->getSlug());die; //it works on doctrine
    //echo $article->getSlug();
    // prints: the-title-my-code

  }    
}
