<?php

/* FrontendBundle:Templates:home.html.twig */
class __TwigTemplate_613cca6b9830f3a7915740357d18e4585245658f81a30302fad33bacdeb61b40 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        try {
            $this->parent = $this->env->loadTemplate("FrontendBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(3);

            throw $e;
        }

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FrontendBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "  <!-- Latest compiled and minified CSS -->
  <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css\">
  <!-- Optional theme -->
  <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css\">  
  <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/css/ribbons.css"), "html", null, true);
        echo "\" />
";
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
        // line 14
        echo "  Piergi.com - Start Page
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo "
  <div id=\"profile\"></div>
    <!-- Static navbar -->
    <nav class=\"navbar navbar-default navbar-static-top\">
      <div class=\"container\">
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <!--a class=\"navbar-brand\" href=\"#\">Piergiorgio Pili</a-->
          <a class=\"navbar-brand\" href=\"#\" style=\"position:absolute;width:226px;padding:0px;\">
            <img src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/images/piergi_signature_226x51.png", null, true, null), "html", null, true);
        echo "\" alt=\"Piergi\" style=\"position:relative;padding:0;\" />
          </a>          
        </div>
        <div id=\"navbar\" class=\"navbar-collapse collapse\">
          <ul class=\"nav navbar-nav\">
            <li class=\"active\"><a href=\"#\">Home</a></li>
            <li><a href=\"#about\">About</a></li>
            <li><a href=\"#contact\">Contact</a></li>
            <li class=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">Dropdown <span class=\"caret\"></span></a>
              <ul class=\"dropdown-menu\" role=\"menu\">
                <li><a href=\"#\">Action</a></li>
                <li><a href=\"#\">Another action</a></li>
                <li><a href=\"#\">Something else here</a></li>
                <li class=\"divider\"></li>
                <li class=\"dropdown-header\">Nav header</li>
                <li><a href=\"#\">Separated link</a></li>
                <li><a href=\"#\">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class=\"nav navbar-nav navbar-right\">
            <li><a href=\"../navbar/\">Default</a></li>
            <li class=\"active\"><a href=\"./\">Static top <span class=\"sr-only\">(current)</span></a></li>
            <li><a href=\"../navbar-fixed-top/\">Fixed top</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    ";
        // line 62
        $this->env->loadTemplate("FrontendBundle:Templates/Partials:carousel.html.twig")->display(array_merge($context, array("firstName" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "firstName", array()), "lastName" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "lastName", array()))));
        // line 63
        echo "
    ";
        // line 64
        $this->env->loadTemplate("FrontendBundle:Templates/Partials:aboutme.html.twig")->display(array_merge($context, array("firstName" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "firstName", array()), "lastName" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "lastName", array()), "pictureUrl" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "pictureUrl", array()))));
        // line 65
        echo "    
    ";
        // line 66
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "positions", array()), 1, array(), "array"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["position"]) {
            // line 67
            echo "      ";
            $this->env->loadTemplate("FrontendBundle:Templates/Partials:position.html.twig")->display(array_merge($context, array("position" => $context["position"])));
            // line 68
            echo "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['position'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "    
    ";
        // line 70
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "educations", array()), 1, array(), "array"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["education"]) {
            // line 71
            echo "      ";
            $this->env->loadTemplate("FrontendBundle:Templates/Partials:education.html.twig")->display(array_merge($context, array("education" => $context["education"])));
            // line 72
            echo "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['education'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "    
    <div class=\"container content-box\">

      <!-- Main component for a primary marketing message or call to action -->
      <div class=\"jumbotron\">
        <h1>Web Developer</h1>
        <h2>Freelance</h2>
        <h3>
          ";
        // line 81
        $this->env->loadTemplate("FrontendBundle:Templates/Partials/locations:uk.html.twig")->display(array_merge($context, array("country" => "EU", "name" => "Europe")));
        // line 82
        echo "        </h3>
        <p>Developing websites and web-based applications using PHP Symfony framework and JQuery. XML web services integration to acquire and display real time data via AJAX.</p>
        <p>Facebook Integration via Facebook Connect and application development to post automatically to Facebook Pages or Twitter profiles.</p>
        <p>Optimizing the websites to improve the volume and quality of traffic from search engines (SEO). This includes: refactoring the HTML code, setting specific meta tags for every single page, combining and merging CSS and external JS scripts, url rewriting.</p>
        <br/>
        <img src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://symfony.com/logos/symfony_black_01.png?v=4", null, true, null), "html", null, true);
        echo "\" alt=\"Symfony!\" height=\"10%\" width=\"10%\" />
        <img src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://php.net//images/logos/php-med-trans-light.gif", null, true, null), "html", null, true);
        echo "\" alt=\"Php\" />
        <img src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://www.mysql.com/common/logos/logo-mysql-170x115.png", null, true, null), "html", null, true);
        echo "\" alt=\"MySql\" height=\"10%\" width=\"10%\" />
        <img src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://upload.wikimedia.org/wikipedia/en/7/79/Doctrine_logo_white.png", null, true, null), "html", null, true);
        echo "\" alt=\"Doctrine\" height=\"10%\" width=\"10%\" />
        <img src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://www.mongodb.com/sites/mongodb.com/files/media/mongodb-logo-rgb.jpeg", null, true, null), "html", null, true);
        echo "\" alt=\"MongoDB\" height=\"10%\" width=\"10%\" />
        <img src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://www.w3.org/html/logo/badge/html5-badge-h-solo.png", null, true, null), "html", null, true);
        echo "\" alt=\"Html\" />
        <img src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://upload.wikimedia.org/wikipedia/en/thumb/9/9e/JQuery_logo.svg/524px-JQuery_logo.svg.png", null, true, null), "html", null, true);
        echo "\" alt=\"JQuery\" height=\"10%\" width=\"10%\" />
        <img src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://upload.wikimedia.org/wikipedia/commons/3/32/Facebooklogo.png", null, true, null), "html", null, true);
        echo "\" alt=\"Facebook\" height=\"10%\" width=\"10%\" />
        <img src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://upload.wikimedia.org/wikipedia/commons/5/51/Logo_twitter_wordmark_1000.png", null, true, null), "html", null, true);
        echo "\" alt=\"Twitter\" height=\"10%\" width=\"10%\" />   
      </div>
      <div id=\"ribbon-container\">
        <a href=\"http://www.piergi.com\" id=\"ribbon\" target=\"_blank\">Hire me!</a>
      </div> 
      
    </div> <!-- /container -->      
    
    <div class=\"container content-box\">
      <div class=\"jumbotron wb row\">
        
        ";
        // line 106
        $this->env->loadTemplate("FrontendBundle:Templates/Partials:findme.html.twig")->display($context);
        echo " 

        ";
        // line 108
        $this->env->loadTemplate("FrontendBundle:Templates/Partials:contact.html.twig")->display($context);
        echo "   

      </div>
    </div> <!-- /container -->  
    
    <p class=\"acenter\">&copy; 2005 - P.IVA n. 03555800923</p>
    
";
    }

    // line 117
    public function block_javascripts($context, array $blocks = array())
    {
        // line 118
        echo "  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js\"></script>  
  <!-- Latest compiled and minified JavaScript -->
  <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js\"></script>
  <script src=\"//platform.linkedin.com/in.js\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "FrontendBundle:Templates:home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  280 => 118,  277 => 117,  265 => 108,  260 => 106,  246 => 95,  242 => 94,  238 => 93,  234 => 92,  230 => 91,  226 => 90,  222 => 89,  218 => 88,  214 => 87,  207 => 82,  205 => 81,  195 => 73,  181 => 72,  178 => 71,  161 => 70,  158 => 69,  144 => 68,  141 => 67,  124 => 66,  121 => 65,  119 => 64,  116 => 63,  114 => 62,  81 => 32,  65 => 18,  62 => 17,  57 => 14,  54 => 13,  48 => 10,  42 => 6,  39 => 5,  11 => 3,);
    }
}
