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
<p>Thank you for listing your expedition (";
        // line 2
        echo ($context["fieldwork_name"] ?? null);
        echo ") on the Cryo Connect platform on ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_registeration_date", array()), "F jS\\, Y"), "html", null, true);
        echo ". Initially you indicated that the expedition was not guaranteed to take place. At this time, we would like to ask you to update your expedition information, and specifically to set the likelihood of the expedition to \"certain\", if this applies. Please use this link to access your information:
    <br>
<a href=\"https://cryoconnect.net";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_dashboard", array(), array("e" => twig_get_attribute($this->env, $this->source, $context, "leader_email", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "\">https://cryoconnect.net";
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_dashboard", array(), array("e" => twig_get_attribute($this->env, $this->source, $context, "leader_email", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "</a></p>
<p>Nota bene: to keep the influx of email into your inbox low, you will receive no further messages on this topic.</p>
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
        return array (  35 => 4,  28 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "api/emails/is-certain-date-today.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/api/emails/is-certain-date-today.html.twig");
    }
}
