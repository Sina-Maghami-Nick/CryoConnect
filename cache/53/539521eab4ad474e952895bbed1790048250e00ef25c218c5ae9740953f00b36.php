<?php

/* information-seekers/emails/fieldwork-connect-welcome-email.html.twig */
class __TwigTemplate_83b933abb17e2db395e2ca3c4094b0e7e97effd9c3f1efd042ba1dbe2110742b extends Twig_Template
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
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker_name", array());
        echo ",</p>
<p>Your request for information on expeditions has been approved. Click here to find this information, and to request joining an expedition:
<br><a href=\"https://cryoconnect.net";
        // line 3
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_detail", array(), array("e" => twig_get_attribute($this->env, $this->source, $context, "email", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "\">https://cryoconnect.net";
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_detail", array(), array("e" => twig_get_attribute($this->env, $this->source, $context, "email", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "</a></p>

<p>Best,
<br>Cryo Connect</p>";
    }

    public function getTemplateName()
    {
        return "information-seekers/emails/fieldwork-connect-welcome-email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "information-seekers/emails/fieldwork-connect-welcome-email.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/information-seekers/emails/fieldwork-connect-welcome-email.html.twig");
    }
}
