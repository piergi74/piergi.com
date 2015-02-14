<?php

/* FrontendBundle:Templates/Partials:carousel.html.twig */
class __TwigTemplate_62f88274458580b307633d2afe2c43c7cad2ab1414f1ced0f3ad236d9afa532f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- Carousel
================================================== -->
<div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">
  <!-- Indicators -->
  <ol class=\"carousel-indicators\">
    <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
    <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
    <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
  </ol>
  <div class=\"carousel-inner\" role=\"listbox\">
    <div class=\"item active\">
      <img src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/images/image5_carousel_1600x600.jpg", null, true, null), "html", null, true);
        echo "\" alt=\"First slide\" />
      <div class=\"container\">
        <div class=\"carousel-caption\">
          <h1>Piergiorgio Pili</h1>
          <p>Web developer</p>
          <p><a class=\"btn btn-lg btn-primary\" href=\"#\" role=\"button\">Read more</a></p>
        </div>
      </div>
    </div>
    <div class=\"item\">
      <img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/images/image2_carousel_1600x600.jpg", null, true, null), "html", null, true);
        echo "\" alt=\"Second slide\" />
      <div class=\"container\">
        <div class=\"carousel-caption\">
          <h1>Piergiorgio Pili</h1>
          <p>Travel consultant</p>
          <p><a class=\"btn btn-lg btn-primary\" href=\"#\" role=\"button\">Read more</a></p>
        </div>
      </div>
    </div>
    <div class=\"item\">
      <img src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/images/image3_carousel_1600x600.jpg", null, true, null), "html", null, true);
        echo "\" alt=\"Third slide\" />
      <div class=\"container\">
        <div class=\"carousel-caption\">
          <h1>One more for good measure.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class=\"btn btn-lg btn-primary\" href=\"#\" role=\"button\">Browse gallery</a></p>
        </div>
      </div>
    </div>
  </div>
  <a class=\"left carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\">
    <span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>
    <span class=\"sr-only\">Previous</span>
  </a>
  <a class=\"right carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"next\">
    <span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span>
    <span class=\"sr-only\">Next</span>
  </a>
</div><!-- /.carousel -->  ";
    }

    public function getTemplateName()
    {
        return "FrontendBundle:Templates/Partials:carousel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 32,  45 => 22,  32 => 12,  19 => 1,);
    }
}
