<?php

/* FrontendBundle:Templates:start.html.twig */
class __TwigTemplate_42f9261a6b8e53aecf66af1dea04c6ec0f8549deaeed9c417a5f9494d4de5ad2 extends Twig_Template
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
    public function block_title($context, array $blocks = array())
    {
        // line 6
        echo "  Piergi.com - Start Page
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "  Hello start!
  <br/>
  ";
        // line 12
        $this->displayParentBlock("body", $context, $blocks);
        echo "
  <br/>
  ";
        // line 14
        $this->env->loadTemplate("FrontendBundle:Templates/Partials:partial.html.twig")->display($context);
        // line 15
        echo "
  <br/>
  <a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("stoke");
        echo "\">Stokes</a>
  
  
  <br/>
  ";
        // line 22
        echo "  ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("FrontendBundle:Frontend:ajax", array("max" => 3)));
        // line 25
        echo "
    
";
    }

    public function getTemplateName()
    {
        return "FrontendBundle:Templates:start.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 25,  70 => 22,  63 => 17,  59 => 15,  57 => 14,  52 => 12,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  11 => 3,);
    }
}
