<?php

/* FrontendBundle:Templates/Partials/locations:uk.html.twig */
class __TwigTemplate_0438677a01559f545114303696cb0f318ca129191b17673a70f64a4ded8a6246 extends Twig_Template
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
        echo "<img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((("bundles/frontend/images/flags/" . (isset($context["country"]) ? $context["country"] : $this->getContext($context, "country"))) . "_64.png"), null, true, null), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, (isset($context["country"]) ? $context["country"] : $this->getContext($context, "country")), "html", null, true);
        echo "\" />
&nbsp;
";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
    }

    public function getTemplateName()
    {
        return "FrontendBundle:Templates/Partials/locations:uk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 3,  19 => 1,);
    }
}
