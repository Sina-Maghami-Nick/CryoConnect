<?php

/* api/emails/expedition-announcement-deadline.html.twig */
class __TwigTemplate_eab7519713227fc4a3a85d18f46aab50b4ed9333b8e51634d9ae1d41188c7848 extends Twig_Template
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
        echo ". In 3 days the deadline that you set for inviting information seekers to join your expedition will pass. We therefore recommend that you click the link below at your earliest convenience, to accept or reject applicants:
    <br>
<a href=\"https://cryoconnect.net";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_dashboard", array(), array("e" => twig_get_attribute($this->env, $this->source, $context, "leader_email", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "\">https://cryoconnect.net";
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_dashboard", array(), array("e" => twig_get_attribute($this->env, $this->source, $context, "leader_email", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "</a></p>
<p>Nota bene: to keep the influx of email into your inbox low, you will receive no further messages on this topic. If we don't hear from you, the status of your expedition on Cryo Connect will automatically be changed to \"cancelled\" after your deadline passes.</p>
<p>Best wishes,<br>
Cryo Connect</p>
";
    }

    public function getTemplateName()
    {
        return "api/emails/expedition-announcement-deadline.html.twig";
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
        return new Twig_Source("", "api/emails/expedition-announcement-deadline.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/api/emails/expedition-announcement-deadline.html.twig");
    }
}
