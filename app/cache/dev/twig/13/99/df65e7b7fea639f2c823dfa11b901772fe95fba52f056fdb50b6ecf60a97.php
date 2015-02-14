<?php

/* FrontendBundle:Templates/Partials:position.html.twig */
class __TwigTemplate_1399df65e7b7fea639f2c823dfa11b901772fe95fba52f056fdb50b6ecf60a97 extends Twig_Template
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
  <div class=\"jumbotron\">
    <h1>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "title", array()), "html", null, true);
        echo "</h1>
    <h2>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "company", array()), "name", array()), "html", null, true);
        echo "</h2>
    ";
        // line 6
        if ($this->getAttribute($this->getAttribute((isset($context["position"]) ? $context["position"] : null), "location", array(), "any", false, true), "country", array(), "any", true, true)) {
            // line 7
            echo "      ";
            $context["code"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "location", array()), "country", array()), "code", array());
            // line 8
            echo "    ";
        } else {
            // line 9
            echo "      ";
            $context["code"] = "EU";
            // line 10
            echo "    ";
        }
        // line 11
        echo "    <h3>
      ";
        // line 12
        $this->env->loadTemplate("FrontendBundle:Templates/Partials/locations:uk.html.twig")->display(array_merge($context, array("country" => (isset($context["code"]) ? $context["code"] : $this->getContext($context, "code")), "name" => $this->getAttribute($this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "location", array()), "name", array()))));
        // line 13
        echo "    </h3> 
    ";
        // line 14
        if (($this->getAttribute((isset($context["position"]) ? $context["position"] : null), "startDate", array(), "any", true, true) && $this->getAttribute((isset($context["position"]) ? $context["position"] : null), "endDate", array(), "any", true, true))) {
            // line 15
            echo "      ";
            $context["startMonth"] = $this->getAttribute($this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "startDate", array()), "month", array());
            // line 16
            echo "      ";
            $context["startYear"] = $this->getAttribute($this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "startDate", array()), "year", array());
            // line 17
            echo "      ";
            $context["endMonth"] = $this->getAttribute($this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "endDate", array()), "month", array());
            // line 18
            echo "      ";
            $context["endYear"] = $this->getAttribute($this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "endDate", array()), "year", array());
            // line 19
            echo "      <p>";
            echo twig_escape_filter($this->env, (isset($context["startMonth"]) ? $context["startMonth"] : $this->getContext($context, "startMonth")), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["startYear"]) ? $context["startYear"] : $this->getContext($context, "startYear")), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, (isset($context["endMonth"]) ? $context["endMonth"] : $this->getContext($context, "endMonth")), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["endYear"]) ? $context["endYear"] : $this->getContext($context, "endYear")), "html", null, true);
            echo "</p> 
    ";
        } elseif ($this->getAttribute((isset($context["position"]) ? $context["position"] : null), "startDate", array(), "any", true, true)) {
            // line 20
            echo " 
      ";
            // line 21
            $context["startMonth"] = $this->getAttribute($this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "startDate", array()), "month", array());
            // line 22
            echo "      ";
            $context["startYear"] = $this->getAttribute($this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "startDate", array()), "year", array());
            // line 23
            echo "      <p>";
            echo twig_escape_filter($this->env, (isset($context["startMonth"]) ? $context["startMonth"] : $this->getContext($context, "startMonth")), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["startYear"]) ? $context["startYear"] : $this->getContext($context, "startYear")), "html", null, true);
            echo " - present</p>
    ";
        } elseif ($this->getAttribute((isset($context["position"]) ? $context["position"] : null), "endDate", array(), "any", true, true)) {
            // line 25
            echo "      ";
            $context["endMonth"] = $this->getAttribute($this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "endDate", array()), "month", array());
            // line 26
            echo "      ";
            $context["endYear"] = $this->getAttribute($this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "endDate", array()), "year", array());
            // line 27
            echo "      <p>";
            echo twig_escape_filter($this->env, (isset($context["endMonth"]) ? $context["endMonth"] : $this->getContext($context, "endMonth")), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["endYear"]) ? $context["endYear"] : $this->getContext($context, "endYear")), "html", null, true);
            echo "</p> 
    ";
        }
        // line 28
        echo "             
    <p>";
        // line 29
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "summary", array()), "html", null, true));
        echo "</p>

  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "FrontendBundle:Templates/Partials:position.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 29,  110 => 28,  102 => 27,  99 => 26,  96 => 25,  88 => 23,  85 => 22,  83 => 21,  80 => 20,  68 => 19,  65 => 18,  62 => 17,  59 => 16,  56 => 15,  54 => 14,  51 => 13,  49 => 12,  46 => 11,  43 => 10,  40 => 9,  37 => 8,  34 => 7,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
