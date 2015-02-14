<?php

/* FrontendBundle:Templates/Partials:calculated.html.twig */
class __TwigTemplate_77a66f5dc49ef15f3a8324efbcce8d6e9750b32f87fd6bf646738f88ea60ccc3 extends Twig_Template
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
        $context["qt"] = $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "quantity", array());
        // line 2
        $context["bp"] = $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "buying_price", array());
        // line 3
        $context["sp"] = $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "selling_price", array());
        // line 4
        echo "
<table>
  <thead>
    <tr>
      <th>Titolo</th>
      <th>Volume</th>
      <th>Acquisto</th>
      <th>Attuale</th>
      <th>Capitale investito</th>
      <th>Capitale al valore presente</th>
      <th>Variazione percentuale</th>
      <th>Guadagno lordo</th>
      <th>Commissioni all'acquisto</th>
      <th>Commissioni alla vendita</th>
      <th>Tobin tax</th>
      <th>Capital gain</th>
      <th>Variazione netta</th>
      <th>Guadagno netto</th>
      <th>No Loss</th>
      <th>Stop Loss 50%</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        ";
        // line 30
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "name", array(), "any", true, true)) {
            // line 31
            echo "          ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "name", array())), "html", null, true);
            echo "
        ";
        }
        // line 32
        echo "        
      </td>
      <td>";
        // line 34
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["qt"]) ? $context["qt"] : $this->getContext($context, "qt")), 0, ",", "."), "html", null, true);
        echo "</td>
      <td>";
        // line 35
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["bp"]) ? $context["bp"] : $this->getContext($context, "bp")), 3, ",", "."), "html", null, true);
        echo "</td>
      <td>";
        // line 36
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["sp"]) ? $context["sp"] : $this->getContext($context, "sp")), 3, ",", "."), "html", null, true);
        echo "</td>
      <td>
        ";
        // line 39
        echo "        ";
        $context["ci"] = ((isset($context["qt"]) ? $context["qt"] : $this->getContext($context, "qt")) * (isset($context["bp"]) ? $context["bp"] : $this->getContext($context, "bp")));
        // line 40
        echo "        ";
        // line 41
        echo "        ";
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["ci"]) ? $context["ci"] : $this->getContext($context, "ci")), 2, ",", "."), "html", null, true);
        echo "
      </td>
      <td>
        ";
        // line 45
        echo "        ";
        $context["cp"] = ((isset($context["qt"]) ? $context["qt"] : $this->getContext($context, "qt")) * (isset($context["sp"]) ? $context["sp"] : $this->getContext($context, "sp")));
        // line 46
        echo "        ";
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")), 2, ",", "."), "html", null, true);
        echo "
      </td>
      ";
        // line 48
        $context["vp"] = ((((isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")) - (isset($context["ci"]) ? $context["ci"] : $this->getContext($context, "ci"))) / (isset($context["ci"]) ? $context["ci"] : $this->getContext($context, "ci"))) * 100);
        // line 49
        echo "      <td class=\"";
        if (((isset($context["vp"]) ? $context["vp"] : $this->getContext($context, "vp")) < 0)) {
            echo "red";
        } else {
            echo "green";
        }
        echo "\">
        ";
        // line 51
        echo "
        ";
        // line 52
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["vp"]) ? $context["vp"] : $this->getContext($context, "vp")), 2, ",", "."), "html", null, true);
        echo "%
      </td>
      ";
        // line 54
        $context["gl"] = ((isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")) - (isset($context["ci"]) ? $context["ci"] : $this->getContext($context, "ci")));
        // line 55
        echo "      <td class=\"";
        if (((isset($context["gl"]) ? $context["gl"] : $this->getContext($context, "gl")) < 0)) {
            echo "red";
        } else {
            echo "green";
        }
        echo "\">
        ";
        // line 57
        echo "
        ";
        // line 58
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["gl"]) ? $context["gl"] : $this->getContext($context, "gl")), 2, ",", "."), "html", null, true);
        echo "
      </td>
      <td>
        ";
        // line 62
        echo "        ";
        $context["ca"] = min(max((((isset($context["ci"]) ? $context["ci"] : $this->getContext($context, "ci")) / 100) * 0.19), 2.95), 19);
        // line 63
        echo "        ";
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["ca"]) ? $context["ca"] : $this->getContext($context, "ca")), 2, ",", "."), "html", null, true);
        echo "
      </td>
      <td>
        ";
        // line 67
        echo "        ";
        $context["cv"] = min(max((((isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")) / 100) * 0.19), 2.95), 19);
        // line 68
        echo "        ";
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["cv"]) ? $context["cv"] : $this->getContext($context, "cv")), 2, ",", "."), "html", null, true);
        echo "        
      </td>
      <td>
        ";
        // line 72
        echo "        ";
        $context["tt"] = (((isset($context["ci"]) ? $context["ci"] : $this->getContext($context, "ci")) / 100) * 0.1);
        // line 73
        echo "        ";
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["tt"]) ? $context["tt"] : $this->getContext($context, "tt")), 2, ",", "."), "html", null, true);
        echo "
      </td>
      <td>
        ";
        // line 77
        echo "        ";
        $context["cg"] = ((((((isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")) - (isset($context["ci"]) ? $context["ci"] : $this->getContext($context, "ci"))) - (isset($context["ca"]) ? $context["ca"] : $this->getContext($context, "ca"))) - (isset($context["cv"]) ? $context["cv"] : $this->getContext($context, "cv"))) / 100) * 26);
        // line 78
        echo "        ";
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, max((isset($context["cg"]) ? $context["cg"] : $this->getContext($context, "cg")), 0), 2, ",", "."), "html", null, true);
        echo "
      </td>
      ";
        // line 80
        $context["vn"] = (((((isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")) - ((((isset($context["ca"]) ? $context["ca"] : $this->getContext($context, "ca")) + (isset($context["cv"]) ? $context["cv"] : $this->getContext($context, "cv"))) + (isset($context["tt"]) ? $context["tt"] : $this->getContext($context, "tt"))) + max((isset($context["cg"]) ? $context["cg"] : $this->getContext($context, "cg")), 0))) * 100) / (isset($context["ci"]) ? $context["ci"] : $this->getContext($context, "ci"))) - 100);
        // line 81
        echo "      <td class=\"";
        if (((isset($context["vn"]) ? $context["vn"] : $this->getContext($context, "vn")) < 0)) {
            echo "red";
        } else {
            echo "green";
        }
        echo "\">
        ";
        // line 83
        echo "        
        ";
        // line 84
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["vn"]) ? $context["vn"] : $this->getContext($context, "vn")), 2, ",", "."), "html", null, true);
        echo "%
      </td>
      
      ";
        // line 87
        if (((isset($context["gl"]) ? $context["gl"] : $this->getContext($context, "gl")) > 0)) {
            // line 88
            echo "        ";
            $context["gn"] = (((((isset($context["gl"]) ? $context["gl"] : $this->getContext($context, "gl")) - (isset($context["ca"]) ? $context["ca"] : $this->getContext($context, "ca"))) - (isset($context["cv"]) ? $context["cv"] : $this->getContext($context, "cv"))) - (isset($context["tt"]) ? $context["tt"] : $this->getContext($context, "tt"))) - (isset($context["cg"]) ? $context["cg"] : $this->getContext($context, "cg")));
            // line 89
            echo "      ";
        } else {
            echo " 
        ";
            // line 90
            $context["gn"] =  -((((abs((isset($context["gl"]) ? $context["gl"] : $this->getContext($context, "gl"))) + (isset($context["ca"]) ? $context["ca"] : $this->getContext($context, "ca"))) + (isset($context["cv"]) ? $context["cv"] : $this->getContext($context, "cv"))) + (isset($context["tt"]) ? $context["tt"] : $this->getContext($context, "tt"))) + max((isset($context["cg"]) ? $context["cg"] : $this->getContext($context, "cg")), 0));
            // line 91
            echo "      ";
        }
        echo "       

      <td class=\"";
        // line 93
        if (((isset($context["gn"]) ? $context["gn"] : $this->getContext($context, "gn")) < 0)) {
            echo "red";
        } else {
            echo "green";
        }
        echo "\">
        ";
        // line 95
        echo "        
        ";
        // line 96
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["gn"]) ? $context["gn"] : $this->getContext($context, "gn")), 2, ",", "."), "html", null, true);
        echo "
      </td>
      <td>
        ";
        // line 100
        echo "        
        ";
        // line 101
        if ((((((isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")) / 100) * 0.19) > 2.95) && ((((isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")) / 100) * 0.19) < 19))) {
            // line 102
            echo "          ";
            $context["ts"] = ((((isset($context["ci"]) ? $context["ci"] : $this->getContext($context, "ci")) + (isset($context["ca"]) ? $context["ca"] : $this->getContext($context, "ca"))) + ((5 / 4) * (isset($context["tt"]) ? $context["tt"] : $this->getContext($context, "tt")))) / (0.9981 * (isset($context["qt"]) ? $context["qt"] : $this->getContext($context, "qt"))));
            // line 103
            echo "        ";
        } else {
            // line 104
            echo "          ";
            $context["ts"] = (((((isset($context["ci"]) ? $context["ci"] : $this->getContext($context, "ci")) + (isset($context["ca"]) ? $context["ca"] : $this->getContext($context, "ca"))) + ((5 / 4) * (isset($context["tt"]) ? $context["tt"] : $this->getContext($context, "tt")))) + (isset($context["cv"]) ? $context["cv"] : $this->getContext($context, "cv"))) / (isset($context["qt"]) ? $context["qt"] : $this->getContext($context, "qt")));
            // line 105
            echo "        ";
        }
        echo "        
        
        ";
        // line 107
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["ts"]) ? $context["ts"] : $this->getContext($context, "ts")), 3, ",", "."), "html", null, true);
        echo "
      </td>
      <td>
        ";
        // line 111
        echo "
        ";
        // line 112
        if ((((((isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")) / 100) * 0.19) > 2.95) && ((((isset($context["cp"]) ? $context["cp"] : $this->getContext($context, "cp")) / 100) * 0.19) < 19))) {
            // line 113
            echo "          ";
            $context["mts"] = ((((((5 / 4) * ((isset($context["gn"]) ? $context["gn"] : $this->getContext($context, "gn")) * 0.5)) + (isset($context["ci"]) ? $context["ci"] : $this->getContext($context, "ci"))) + (isset($context["ca"]) ? $context["ca"] : $this->getContext($context, "ca"))) + ((5 / 4) * (isset($context["tt"]) ? $context["tt"] : $this->getContext($context, "tt")))) / (0.9981 * (isset($context["qt"]) ? $context["qt"] : $this->getContext($context, "qt"))));
            // line 114
            echo "        ";
        } else {
            // line 115
            echo "          ";
            $context["mts"] = (((((((5 / 4) * ((isset($context["gn"]) ? $context["gn"] : $this->getContext($context, "gn")) * 0.5)) + (isset($context["ci"]) ? $context["ci"] : $this->getContext($context, "ci"))) + (isset($context["ca"]) ? $context["ca"] : $this->getContext($context, "ca"))) + ((5 / 4) * (isset($context["tt"]) ? $context["tt"] : $this->getContext($context, "tt")))) + (isset($context["cv"]) ? $context["cv"] : $this->getContext($context, "cv"))) / (isset($context["qt"]) ? $context["qt"] : $this->getContext($context, "qt")));
            // line 116
            echo "        ";
        }
        echo "        
        
        ";
        // line 118
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["mts"]) ? $context["mts"] : $this->getContext($context, "mts")), 3, ",", "."), "html", null, true);
        echo "
      </td>
      <td></td>
    </tr>    
    ";
        // line 122
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "data"), "method"));
        foreach ($context['_seq'] as $context["key"] => $context["session_data"]) {
            // line 123
            echo "      <tr class=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">
        <td>
          ";
            // line 125
            if ($this->getAttribute($context["session_data"], "name", array(), "any", true, true)) {
                // line 126
                echo "            ";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["session_data"], "name", array())), "html", null, true);
                echo " 
          ";
            }
            // line 127
            echo "          
        </td>
        <td>";
            // line 129
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["session_data"], "quantity", array()), 0, ",", "."), "html", null, true);
            echo "</td>
        <td>";
            // line 130
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["session_data"], "buying_price", array()), 3, ",", "."), "html", null, true);
            echo "</td>
        <td>";
            // line 131
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["session_data"], "selling_price", array()), 3, ",", "."), "html", null, true);
            echo "</td>
        <td>
          ";
            // line 133
            $context["s_ci"] = ($this->getAttribute($context["session_data"], "quantity", array()) * $this->getAttribute($context["session_data"], "buying_price", array()));
            // line 134
            echo "          ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["s_ci"]) ? $context["s_ci"] : $this->getContext($context, "s_ci")), 2, ",", "."), "html", null, true);
            echo "
        </td>
        <td>
          ";
            // line 137
            $context["s_cp"] = ($this->getAttribute($context["session_data"], "quantity", array()) * $this->getAttribute($context["session_data"], "selling_price", array()));
            // line 138
            echo "          ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["s_cp"]) ? $context["s_cp"] : $this->getContext($context, "s_cp")), 2, ",", "."), "html", null, true);
            echo "
        </td>
        <td>
          ";
            // line 141
            $context["s_vp"] = ((((isset($context["s_cp"]) ? $context["s_cp"] : $this->getContext($context, "s_cp")) - (isset($context["s_ci"]) ? $context["s_ci"] : $this->getContext($context, "s_ci"))) / (isset($context["s_ci"]) ? $context["s_ci"] : $this->getContext($context, "s_ci"))) * 100);
            // line 142
            echo "          ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["s_vp"]) ? $context["s_vp"] : $this->getContext($context, "s_vp")), 2, ",", "."), "html", null, true);
            echo "%
        </td>
        <td>
          ";
            // line 146
            echo "          ";
            $context["s_gl"] = ((isset($context["s_cp"]) ? $context["s_cp"] : $this->getContext($context, "s_cp")) - (isset($context["s_ci"]) ? $context["s_ci"] : $this->getContext($context, "s_ci")));
            // line 147
            echo "          ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["s_gl"]) ? $context["s_gl"] : $this->getContext($context, "s_gl")), 2, ",", "."), "html", null, true);
            echo "          
        </td>
        <td>
          ";
            // line 151
            echo "          ";
            $context["s_ca"] = min(max((((isset($context["s_ci"]) ? $context["s_ci"] : $this->getContext($context, "s_ci")) / 100) * 0.19), 2.95), 19);
            // line 152
            echo "          ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["s_ca"]) ? $context["s_ca"] : $this->getContext($context, "s_ca")), 2, ",", "."), "html", null, true);
            echo "          
        </td>
        <td>
          ";
            // line 156
            echo "          ";
            $context["s_cv"] = min(max((((isset($context["s_cp"]) ? $context["s_cp"] : $this->getContext($context, "s_cp")) / 100) * 0.19), 2.95), 19);
            // line 157
            echo "          ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["s_cv"]) ? $context["s_cv"] : $this->getContext($context, "s_cv")), 2, ",", "."), "html", null, true);
            echo "              
        </td>
        <td>
          ";
            // line 161
            echo "          ";
            $context["s_tt"] = (((isset($context["s_ci"]) ? $context["s_ci"] : $this->getContext($context, "s_ci")) / 100) * 0.1);
            // line 162
            echo "          ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["s_tt"]) ? $context["s_tt"] : $this->getContext($context, "s_tt")), 2, ",", "."), "html", null, true);
            echo "          
        </td>
        <td>
          ";
            // line 166
            echo "          ";
            $context["s_cg"] = ((((((isset($context["s_cp"]) ? $context["s_cp"] : $this->getContext($context, "s_cp")) - (isset($context["s_ci"]) ? $context["s_ci"] : $this->getContext($context, "s_ci"))) - (isset($context["s_ca"]) ? $context["s_ca"] : $this->getContext($context, "s_ca"))) - (isset($context["s_cv"]) ? $context["s_cv"] : $this->getContext($context, "s_cv"))) / 100) * 26);
            // line 167
            echo "          ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, max((isset($context["s_cg"]) ? $context["s_cg"] : $this->getContext($context, "s_cg")), 0), 2, ",", "."), "html", null, true);
            echo "          
        </td>
        ";
            // line 169
            $context["s_vn"] = (((((isset($context["s_cp"]) ? $context["s_cp"] : $this->getContext($context, "s_cp")) - ((((isset($context["s_ca"]) ? $context["s_ca"] : $this->getContext($context, "s_ca")) + (isset($context["s_cv"]) ? $context["s_cv"] : $this->getContext($context, "s_cv"))) + (isset($context["s_tt"]) ? $context["s_tt"] : $this->getContext($context, "s_tt"))) + max((isset($context["s_cg"]) ? $context["s_cg"] : $this->getContext($context, "s_cg")), 0))) * 100) / (isset($context["s_ci"]) ? $context["s_ci"] : $this->getContext($context, "s_ci"))) - 100);
            // line 170
            echo "        <td class=\"";
            if (((isset($context["s_vn"]) ? $context["s_vn"] : $this->getContext($context, "s_vn")) < 0)) {
                echo "red";
            } else {
                echo "green";
            }
            echo "\">
          ";
            // line 172
            echo "          
          ";
            // line 173
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["s_vn"]) ? $context["s_vn"] : $this->getContext($context, "s_vn")), 2, ",", "."), "html", null, true);
            echo "%          
        </td>
        ";
            // line 175
            if (((isset($context["s_gl"]) ? $context["s_gl"] : $this->getContext($context, "s_gl")) > 0)) {
                // line 176
                echo "          ";
                $context["s_gn"] = (((((isset($context["s_gl"]) ? $context["s_gl"] : $this->getContext($context, "s_gl")) - (isset($context["s_ca"]) ? $context["s_ca"] : $this->getContext($context, "s_ca"))) - (isset($context["s_cv"]) ? $context["s_cv"] : $this->getContext($context, "s_cv"))) - (isset($context["s_tt"]) ? $context["s_tt"] : $this->getContext($context, "s_tt"))) - (isset($context["s_cg"]) ? $context["s_cg"] : $this->getContext($context, "s_cg")));
                // line 177
                echo "        ";
            } else {
                echo " 
          ";
                // line 178
                $context["s_gn"] =  -((((abs((isset($context["s_gl"]) ? $context["s_gl"] : $this->getContext($context, "s_gl"))) + (isset($context["s_ca"]) ? $context["s_ca"] : $this->getContext($context, "s_ca"))) + (isset($context["s_cv"]) ? $context["s_cv"] : $this->getContext($context, "s_cv"))) + (isset($context["s_tt"]) ? $context["s_tt"] : $this->getContext($context, "s_tt"))) + max((isset($context["s_cg"]) ? $context["s_cg"] : $this->getContext($context, "s_cg")), 0));
                // line 179
                echo "        ";
            }
            echo "           
        <td class=\"";
            // line 180
            if (((isset($context["s_gn"]) ? $context["s_gn"] : $this->getContext($context, "s_gn")) < 0)) {
                echo "red";
            } else {
                echo "green";
            }
            echo "\">
          ";
            // line 182
            echo "
          ";
            // line 183
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["s_gn"]) ? $context["s_gn"] : $this->getContext($context, "s_gn")), 2, ",", "."), "html", null, true);
            echo "          
        </td>
        <td>
          ";
            // line 187
            echo "
          ";
            // line 188
            if ((((((isset($context["s_cp"]) ? $context["s_cp"] : $this->getContext($context, "s_cp")) / 100) * 0.19) > 2.95) && ((((isset($context["s_cp"]) ? $context["s_cp"] : $this->getContext($context, "s_cp")) / 100) * 0.19) < 19))) {
                // line 189
                echo "            ";
                $context["s_ts"] = ((((isset($context["s_ci"]) ? $context["s_ci"] : $this->getContext($context, "s_ci")) + (isset($context["s_ca"]) ? $context["s_ca"] : $this->getContext($context, "s_ca"))) + ((5 / 4) * (isset($context["s_tt"]) ? $context["s_tt"] : $this->getContext($context, "s_tt")))) / (0.9981 * $this->getAttribute($context["session_data"], "quantity", array())));
                // line 190
                echo "          ";
            } else {
                // line 191
                echo "            ";
                $context["s_ts"] = (((((isset($context["s_ci"]) ? $context["s_ci"] : $this->getContext($context, "s_ci")) + (isset($context["s_ca"]) ? $context["s_ca"] : $this->getContext($context, "s_ca"))) + ((5 / 4) * (isset($context["s_tt"]) ? $context["s_tt"] : $this->getContext($context, "s_tt")))) + (isset($context["s_cv"]) ? $context["s_cv"] : $this->getContext($context, "s_cv"))) / $this->getAttribute($context["session_data"], "quantity", array()));
                // line 192
                echo "          ";
            }
            echo "        

          ";
            // line 194
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["s_ts"]) ? $context["s_ts"] : $this->getContext($context, "s_ts")), 3, ",", "."), "html", null, true);
            echo "
        </td>
        <td>
          ";
            // line 198
            echo "
          ";
            // line 199
            if ((((((isset($context["s_cp"]) ? $context["s_cp"] : $this->getContext($context, "s_cp")) / 100) * 0.19) > 2.95) && ((((isset($context["s_cp"]) ? $context["s_cp"] : $this->getContext($context, "s_cp")) / 100) * 0.19) < 19))) {
                // line 200
                echo "            ";
                $context["s_mts"] = ((((((5 / 4) * ((isset($context["s_gn"]) ? $context["s_gn"] : $this->getContext($context, "s_gn")) * 0.5)) + (isset($context["s_ci"]) ? $context["s_ci"] : $this->getContext($context, "s_ci"))) + (isset($context["s_ca"]) ? $context["s_ca"] : $this->getContext($context, "s_ca"))) + ((5 / 4) * (isset($context["s_tt"]) ? $context["s_tt"] : $this->getContext($context, "s_tt")))) / (0.9981 * $this->getAttribute($context["session_data"], "quantity", array())));
                // line 201
                echo "          ";
            } else {
                // line 202
                echo "            ";
                $context["s_mts"] = (((((((5 / 4) * ((isset($context["s_gn"]) ? $context["s_gn"] : $this->getContext($context, "s_gn")) * 0.5)) + (isset($context["s_ci"]) ? $context["s_ci"] : $this->getContext($context, "s_ci"))) + (isset($context["s_ca"]) ? $context["s_ca"] : $this->getContext($context, "s_ca"))) + ((5 / 4) * (isset($context["s_tt"]) ? $context["s_tt"] : $this->getContext($context, "s_tt")))) + (isset($context["s_cv"]) ? $context["s_cv"] : $this->getContext($context, "s_cv"))) / $this->getAttribute($context["session_data"], "quantity", array()));
                // line 203
                echo "          ";
            }
            echo "        

          ";
            // line 205
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["s_mts"]) ? $context["s_mts"] : $this->getContext($context, "s_mts")), 3, ",", "."), "html", null, true);
            echo "
        </td>     
        <td>
          ";
            // line 209
            echo "          <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("remove_from_session", array("key" => $context["key"])), "html", null, true);
            echo "\">Remove</a>
          <br/>
          <a href=\"";
            // line 211
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("set_in_form", array("key" => $context["key"])), "html", null, true);
            echo "\">Set</a>
        </td>
      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['session_data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 214
        echo "       
  </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "FrontendBundle:Templates/Partials:calculated.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  517 => 214,  507 => 211,  501 => 209,  495 => 205,  489 => 203,  486 => 202,  483 => 201,  480 => 200,  478 => 199,  475 => 198,  469 => 194,  463 => 192,  460 => 191,  457 => 190,  454 => 189,  452 => 188,  449 => 187,  443 => 183,  440 => 182,  432 => 180,  427 => 179,  425 => 178,  420 => 177,  417 => 176,  415 => 175,  410 => 173,  407 => 172,  398 => 170,  396 => 169,  390 => 167,  387 => 166,  380 => 162,  377 => 161,  370 => 157,  367 => 156,  360 => 152,  357 => 151,  350 => 147,  347 => 146,  340 => 142,  338 => 141,  331 => 138,  329 => 137,  322 => 134,  320 => 133,  315 => 131,  311 => 130,  307 => 129,  303 => 127,  297 => 126,  295 => 125,  289 => 123,  285 => 122,  278 => 118,  272 => 116,  269 => 115,  266 => 114,  263 => 113,  261 => 112,  258 => 111,  252 => 107,  246 => 105,  243 => 104,  240 => 103,  237 => 102,  235 => 101,  232 => 100,  226 => 96,  223 => 95,  215 => 93,  209 => 91,  207 => 90,  202 => 89,  199 => 88,  197 => 87,  191 => 84,  188 => 83,  179 => 81,  177 => 80,  171 => 78,  168 => 77,  161 => 73,  158 => 72,  151 => 68,  148 => 67,  141 => 63,  138 => 62,  132 => 58,  129 => 57,  120 => 55,  118 => 54,  113 => 52,  110 => 51,  101 => 49,  99 => 48,  93 => 46,  90 => 45,  83 => 41,  81 => 40,  78 => 39,  73 => 36,  69 => 35,  65 => 34,  61 => 32,  55 => 31,  53 => 30,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
