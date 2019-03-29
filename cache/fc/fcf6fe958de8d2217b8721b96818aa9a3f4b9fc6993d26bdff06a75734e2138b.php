<?php

/* information-seekers/emails/fieldwork-connect-approval-email.html.twig */
class __TwigTemplate_8f17e4c562a1b7a3309a592ba9de42d4eeace4a632b5f65a1a7d10f64d82a2c7 extends Twig_Template
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
        echo "<p>Dear moderator,</p>
<p>
    ";
        // line 3
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerName", array());
        echo " (<a href=\"mailto:";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerEmail", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerEmail", array()), "html", null, true);
        echo "</a>) requested to recieve information about expeditions using the Cryo Connect website. Please approve the new listing using the following link:
    <br>
    <a href=\"https://cryoconnect.net";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_connect_approval", array(), array("id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "Id", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "\">https://cryoconnect.net";
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_connect_approval", array(), array("id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "Id", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "</a></p>

<p>Cryo Connect</p>";
    }

    public function getTemplateName()
    {
        return "information-seekers/emails/fieldwork-connect-approval-email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "information-seekers/emails/fieldwork-connect-approval-email.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/information-seekers/emails/fieldwork-connect-approval-email.html.twig");
    }
}
