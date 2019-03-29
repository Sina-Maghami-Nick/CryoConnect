<?php

/* information-seekers/emails/fieldwork-updated-email.html.twig */
class __TwigTemplate_f31a94dbf0b120df79d34bb22603a742769b62f03618663ce93d0e7215cdeb7a extends Twig_Template
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
<p>The expedition that you have applied for (";
        // line 2
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_name", array());
        echo ") has been updated. Please use the following link to see the changes:
<br><a href=\"https://cryoconnect.net";
        // line 3
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_detail", array(), array("e" => twig_get_attribute($this->env, $this->source, $context, "email", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()), "fh" => twig_get_attribute($this->env, $this->source, $context, "fieldwork_hash", array()))), "html", null, true);
        echo "\">https://cryoconnect.net";
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_detail", array(), array("e" => twig_get_attribute($this->env, $this->source, $context, "email", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()), "fh" => twig_get_attribute($this->env, $this->source, $context, "fieldwork_hash", array()))), "html", null, true);
        echo "</a></p>

<p>Best,<br>
Cryo Connect</p>";
    }

    public function getTemplateName()
    {
        return "information-seekers/emails/fieldwork-updated-email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 3,  28 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "information-seekers/emails/fieldwork-updated-email.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/information-seekers/emails/fieldwork-updated-email.html.twig");
    }
}
