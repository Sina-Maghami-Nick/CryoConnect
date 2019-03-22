<?php

/* fieldworks/fieldwork-connect-search.html.twig */
class __TwigTemplate_522fe7f2590dc63041028ab778fbdf39352ca9c5cbdc56a99b5a8de671bed834 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context, "fieldworks", array()))) {
            // line 3
            echo "    <div class=\"row\">
        ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "fieldworks", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["fieldwork"]) {
                // line 5
                echo "            <div class=\"card blue lighten-3 hoverable\">
                <div class=\"card-content black-text\">
                    <span class=\"card-title\">Expedition name: ";
                // line 7
                echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkName", array());
                echo "</span>
                    <p>Aim: ";
                // line 8
                echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkGoal", array());
                echo "</p>
                    <p>Region: ";
                // line 9
                echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkRegion", array());
                echo "</p>
                    <p>Location(s): ";
                // line 10
                echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkLocations", array());
                echo "</p>
                    <p>Start date: ";
                // line 11
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkStartDate", array()), 0, 10), "html", null, true);
                echo "</p>
                    <p>Duration: ";
                // line 12
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkDuration", array()), "html", null, true);
                echo " days</p>
                    <p>Deadline: ";
                // line 13
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkInformationSeekerDeadline", array()), 0, 10), "html", null, true);
                echo "</p>
                </div>
                <div class=\"card-action\">
                    <label>
                        <input name=\"fieldwork_ids[";
                // line 17
                echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkName", array());
                echo "]\" type=\"checkbox\" class=\"filled-in\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "Id", array()), "html", null, true);
                echo "\" required />
                        <span><font color=\"black\">Select to get more info</font></span>
                    </label> 
                </div>
            </div>

        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fieldwork'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "    </div>

    <div class=\"row\">
        <div class=\"input-field col s12\">
            <input id=\"information_seeker_name\" name=\"information_seeker_name\" type=\"text\" class=\"validate\" required>
            <label for=\"information_seeker_name\">Your full name<font color=\"red\">*</font></label>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"input-field col s12\">
            <input id=\"information_seeker_email\" name=\"information_seeker_email\" type=\"email\" class=\"validate\" required>
            <label for=\"information_seeker_email\">Your email<font color=\"red\">*</font></label>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"input-field col s12\">
            <input id=\"information_seeker_affiliation\" name=\"information_seeker_affiliation\" type=\"text\" class=\"validate\" required>
            <label for=\"information_seeker_affiliation\">Primary affiliation<font color=\"red\">*</font></label>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"input-field col s12\">
            <input id=\"information_seeker_website\" name=\"information_seeker_website\" type=\"url\" class=\"validate\">
            <label for=\"information_seeker_website\">Webpage with some information about you<font color=\"red\">*</font></label>
            <span class=\"helper-text\">i.e. show expedition leaders who you are - please enter the whole url including http://</span>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"input-field col s12\">
            <input id=\"information_seeker_affiliation_website\" name=\"information_seeker_affiliation_website\" type=\"url\" class=\"validate\" required>
            <label for=\"information_seeker_affiliation_website\">Webpage with information about your affiliation<font color=\"red\">*</font></label>
            <span class=\"helper-text\">please enter the whole url including http://</span>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"input-field col s12\">
            <textarea id=\"information_seeker_reasons\" name=\"information_seeker_reasons\" class=\"materialize-textarea\" required></textarea>
            <label for=\"information_seeker_reasons\">Reason for requesting expedition participation<font color=\"red\">*</font></label>
            <span class=\"helper-text\">i.e. which type of media, which topic</span>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"input-field col s12\">
            <label>
                <input id=\"termcondition\" type=\"checkbox\" required/>
                <span>I agree to the terms and conditions<font color=\"red\">*</font></span>
            </label>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"input-field col s12\">
            <p class=\"center-align\">
                <button id=\"submitBtnTwo\" class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Request more info on selected
                    <i class=\"material-icons right\">send</i>
                </button>
            </p>
        </div>
    </div>
";
        } else {
            // line 84
            echo "    <h4 align=\"center\">No results found!</h4>
";
        }
    }

    public function getTemplateName()
    {
        return "fieldworks/fieldwork-connect-search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 84,  82 => 24,  67 => 17,  60 => 13,  56 => 12,  52 => 11,  48 => 10,  44 => 9,  40 => 8,  36 => 7,  32 => 5,  28 => 4,  25 => 3,  23 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "fieldworks/fieldwork-connect-search.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/fieldworks/fieldwork-connect-search.html.twig");
    }
}
