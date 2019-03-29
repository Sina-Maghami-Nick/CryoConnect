<?php

/* information-seekers/emails/fieldwork-connect-bid-request-email.html.twig */
class __TwigTemplate_78992c40c98c1850851f84e067ce8a965fd5ad69fb4f944972cf3d5e83774e4b extends Twig_Template
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
<p>We received a  request from an information seeker (";
        // line 2
        echo ($context["information_seeker_name"] ?? null);
        echo " from ";
        echo ($context["information_seeker_affliation"] ?? null);
        echo ") to join your ";
        echo ($context["fieldwork_name"] ?? null);
        echo " expedition.<br>
    You have ";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_date_converter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "announcement_day", array()))), "diff", array(0 => twig_date_converter($this->env)), "method"), "format", array(0 => "%a"), "method"), "html", null, true);
        echo " day(s) to respond to this and other requests. Please use this link to approve/reject the requests:
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
        return "information-seekers/emails/fieldwork-connect-bid-request-email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 5,  36 => 3,  28 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "information-seekers/emails/fieldwork-connect-bid-request-email.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/information-seekers/emails/fieldwork-connect-bid-request-email.html.twig");
    }
}
