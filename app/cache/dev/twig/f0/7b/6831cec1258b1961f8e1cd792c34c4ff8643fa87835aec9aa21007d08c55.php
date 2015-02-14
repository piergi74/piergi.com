<?php

/* FrontendBundle:Templates:home_old.html.twig */
class __TwigTemplate_f07b6831cec1258b1961f8e1cd792c34c4ff8643fa87835aec9aa21007d08c55 extends Twig_Template
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
        echo "  <script type=\"text/javascript\" src=\"http://platform.linkedin.com/in.js\">
    api_key: 75enbyyzr86ojf
    authorize: false
  </script>
  <script type=\"text/javascript\">

  function loadData() {
   
  IN.API.Profile(\"me\")
     .result(function(result) { 
        \$(\"#profile\").html('<script type=\"IN/FullMemberProfile\" data-id=\"' + result.values[0].id + '\"></scr'+'ipt>');
        //\$(\"#profile\").html(script.outerHTML);
        IN.parse(document.getElementById(\"profile\"))
     })
  }

  </script>  
";
    }

    // line 25
    public function block_title($context, array $blocks = array())
    {
        // line 26
        echo "  Piergi.com - Start Page
";
    }

    // line 29
    public function block_body($context, array $blocks = array())
    {
        // line 30
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
          <a class=\"navbar-brand\" href=\"#\">Project name</a>
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


    <div class=\"container\">

      <!-- Main component for a primary marketing message or call to action -->
      <div class=\"jumbotron\">
        <h1>";
        // line 76
        echo twig_escape_filter($this->env, (isset($context["firstName"]) ? $context["firstName"] : $this->getContext($context, "firstName")), "html", null, true);
        echo "</h1>
        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
        <p>To see the difference between static and fixed top navbars, just scroll.</p>
        <p>
          <a class=\"btn btn-lg btn-primary\" href=\"../../components/#navbar\" role=\"button\">View navbar docs &raquo;</a>
        </p>
      </div>

    </div> <!-- /container -->  
    
    <div class=\"container\">

      <!-- Main component for a primary marketing message or call to action -->
      <div class=\"jumbotron\">
        <h1>Secondo container</h1>
        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
        <p>To see the difference between static and fixed top navbars, just scroll.</p>
        <p>
          <a class=\"btn btn-lg btn-primary\" href=\"../../components/#navbar\" role=\"button\">View navbar docs &raquo;</a>
        </p>
      </div>

    </div> <!-- /container -->      
    
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js\"></script>    

<!-- Latest compiled and minified CSS -->
<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css\">

<!-- Optional theme -->
<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css\">

<!-- Latest compiled and minified JavaScript -->
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js\"></script>
    
<script type=\"IN/Login\" data-onAuth=\"loadData\"></script>

<script src=\"//platform.linkedin.com/in.js\" type=\"text/javascript\"></script>

";
    }

    public function getTemplateName()
    {
        return "FrontendBundle:Templates:home_old.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 76,  73 => 30,  70 => 29,  65 => 26,  62 => 25,  41 => 6,  38 => 5,  11 => 3,);
    }
}
