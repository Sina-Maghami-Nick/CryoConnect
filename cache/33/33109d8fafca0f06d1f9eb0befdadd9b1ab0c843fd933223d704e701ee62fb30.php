<?php

/* expertsSignUp.html.twig */
class __TwigTemplate_3b1ddc1f5a3a89b2b7a69d6e59b7273555b1142e1116f32062db1ec3b727d2d2 extends Twig_Template
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
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>Experts Sign-up</title>
        <link rel=\"stylesheet\" href=\"https://unpkg.com/purecss@1.0.0/build/pure-min.css\" integrity=\"sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w\" crossorigin=\"anonymous\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    </head>
    <body>
        <form class=\"pure-form pure-form-aligned\">
            <fieldset>
                <div class=\"pure-control-group\">
                    <label for=\"firstName\">First Name</label>
                    <input id=\"firstName\" type=\"text\" placeholder=\"Username\">
                    <span class=\"pure-form-message-inline\">This is a required field.</span>
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"familyName\">Family Name</label>
                    <input id=\"familyName\" type=\"text\" placeholder=\"Username\">
                    <span class=\"pure-form-message-inline\">This is a required field.</span>
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"email\">Email Address</label>
                    <input id=\"email\" type=\"email\" placeholder=\"Email Address\">
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"foo\">Cryosphere  Countries</label>
                    <input id=\"CryosphereWhat\" type=\"text\" placeholder=\"What is your Cryosphere expertise\" list=\"suggestions\">
                    <datalist id=\"suggestions\">
                        ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "countries", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 33
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["country"], "CountryName", array()), "html", null, true);
            echo "\">
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "                    </datalist>
                </div>

                <div class=\"pure-controls\">
                    <label for=\"cb\" class=\"pure-checkbox\">
                        <input id=\"cb\" type=\"checkbox\"> I've read the terms and conditions
                    </label>

                    <button type=\"submit\" class=\"pure-button pure-button-primary\">Submit</button>
                </div>
            </fieldset>
        </form>
        <script>console.log(";
        // line 47
        echo json_encode($context);
        echo ");</script>
        ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "countries", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 49
            echo "        <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["country"], "CountryName", array()), "html", null, true);
            echo "\">
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "        



</body>

</html>
";
    }

    public function getTemplateName()
    {
        return "expertsSignUp.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 51,  91 => 49,  87 => 48,  83 => 47,  69 => 35,  60 => 33,  56 => 32,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "expertsSignUp.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/expertsSignUp.html.twig");
    }
}
