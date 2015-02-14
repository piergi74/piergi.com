<?php

/* FrontendBundle:Templates/Partials:aboutme.html.twig */
class __TwigTemplate_fb12950fe06ba416a1f8243c4dfe3f41acc1bc01ac083b4b6e6cd76b0ae3787c extends Twig_Template
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
  <div class=\"jumbotron wb row\" id=\"about\">


    <div class=\"col-md-4\">
      <!--img src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "pictureUrl", array()), "html", null, true);
        echo "\" alt=\"Piergi\" /-->
      <img src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/images/piergi_profile_168x191.jpg", null, true, null), "html", null, true);
        echo "\" alt=\"Piergiorgio Pili\" />
    </div>          

    <div class=\"col-md-8\" id=\"about1\">

      <h1>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "firstName", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "lastName", array()), "html", null, true);
        echo "</h1>

      <table>
        <tbody>
          <tr>
            <td>
              <p></p>
              <p>To see the difference between static and fixed top navbars, just scroll.</p>   

            </td>
            <td>

            </td>
          </tr>
        </tbody>
      </table>

      <p>
        <a class=\"btn btn-lg btn-primary\" href=\"http://www.hotelplayer.com\" target=\"_blank\" role=\"button\">hotelplayer.com &raquo;</a>
      </p>

    </div>
  </div>

</div> <!-- /container --> ";
    }

    public function getTemplateName()
    {
        return "FrontendBundle:Templates/Partials:aboutme.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 14,  32 => 9,  28 => 8,  19 => 1,);
    }
}
