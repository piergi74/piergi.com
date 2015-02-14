<?php

/* FrontendBundle:Templates/Partials:education.html.twig */
class __TwigTemplate_62cc72327898dea1ed0a10c12d142f4c9ba18c3c73d8d4c747030988a64f4bc2 extends Twig_Template
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
        echo "<div class=\"container\">
  <!-- Main component for a primary marketing message or call to action -->
  <div class=\"jumbotron education\">
    <h1>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : $this->getContext($context, "education")), "schoolName", array()), "html", null, true);
        echo "</h1>
    <h2>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : $this->getContext($context, "education")), "degree", array()), "html", null, true);
        echo "</h2>
    ";
        // line 6
        if ($this->getAttribute((isset($context["education"]) ? $context["education"] : null), "fieldOfStudy", array(), "any", true, true)) {
            // line 7
            echo "      <h3>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : $this->getContext($context, "education")), "fieldOfStudy", array()), "html", null, true);
            echo "</h3> 
    ";
        }
        // line 8
        echo "          
    ";
        // line 9
        if (($this->getAttribute((isset($context["education"]) ? $context["education"] : null), "startDate", array(), "any", true, true) && $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "endDate", array(), "any", true, true))) {
            // line 10
            echo "      ";
            $context["startDate"] = $this->getAttribute($this->getAttribute((isset($context["education"]) ? $context["education"] : $this->getContext($context, "education")), "startDate", array()), "year", array());
            // line 11
            echo "      ";
            $context["endDate"] = $this->getAttribute($this->getAttribute((isset($context["education"]) ? $context["education"] : $this->getContext($context, "education")), "endDate", array()), "year", array());
            // line 12
            echo "      <p>";
            echo twig_escape_filter($this->env, (isset($context["startDate"]) ? $context["startDate"] : $this->getContext($context, "startDate")), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, (isset($context["endDate"]) ? $context["endDate"] : $this->getContext($context, "endDate")), "html", null, true);
            echo "</p> 
    ";
        } elseif ($this->getAttribute((isset($context["education"]) ? $context["education"] : null), "startDate", array(), "any", true, true)) {
            // line 13
            echo " 
      ";
            // line 14
            $context["startDate"] = $this->getAttribute($this->getAttribute((isset($context["education"]) ? $context["education"] : $this->getContext($context, "education")), "startDate", array()), "year", array());
            // line 15
            echo "      <p>";
            echo twig_escape_filter($this->env, (isset($context["startDate"]) ? $context["startDate"] : $this->getContext($context, "startDate")), "html", null, true);
            echo "</p>
    ";
        } elseif ($this->getAttribute((isset($context["education"]) ? $context["education"] : null), "endDate", array(), "any", true, true)) {
            // line 17
            echo "      ";
            $context["endDate"] = $this->getAttribute($this->getAttribute((isset($context["education"]) ? $context["education"] : $this->getContext($context, "education")), "endDate", array()), "year", array());
            // line 18
            echo "      <p>";
            echo twig_escape_filter($this->env, (isset($context["endDate"]) ? $context["endDate"] : $this->getContext($context, "endDate")), "html", null, true);
            echo "</p> 
    ";
        }
        // line 19
        echo "            
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "FrontendBundle:Templates/Partials:education.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 19,  73 => 18,  70 => 17,  64 => 15,  62 => 14,  59 => 13,  51 => 12,  48 => 11,  45 => 10,  43 => 9,  40 => 8,  34 => 7,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
