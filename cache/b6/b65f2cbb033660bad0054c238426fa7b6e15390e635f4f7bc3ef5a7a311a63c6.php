<?php

/* api/emails/is-certain-date-today.html.twig */
class __TwigTemplate_5af9e0f20ff77f0ef3a85d38e535436bd33b742a767202596f7d65846c122e26 extends Twig_Template
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
        echo "<p>Dear ";
        echo twig_get_attribute($this->env, $this->source, $context, "leader_name", array());
        echo ",</p>
<p>Is the expedition \"";
        // line 2
        echo ($context["fieldwork_name"] ?? null);
        echo "\" expedition certain already ?<br>
    If yes, please use the following link to edit your expedition and set it as \"certain\":
    <br>
<a href=\"https://cryoconnect.net";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_dashboard", array(), array("e" => twig_get_attribute($this->env, $this->source, $context, "leader_email", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "\">https://cryoconnect.net";
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_dashboard", array(), array("e" => twig_get_attribute($this->env, $this->source, $context, "leader_email", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "</a></p>

<p>Best wishes,<br>
Cryo Connect</p>
";
    }

    public function getTemplateName()
    {
        return "api/emails/is-certain-date-today.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  28 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "api/emails/is-certain-date-today.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/api/emails/is-certain-date-today.html.twig");
    }
}
