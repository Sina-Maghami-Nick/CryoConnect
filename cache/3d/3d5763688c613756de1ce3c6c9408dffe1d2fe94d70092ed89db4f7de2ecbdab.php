<?php

/* fieldworks/emails/fieldwork-approval-email.html.twig */
class __TwigTemplate_055c372c487bee7a096f915f6f3e27291ce8635f55882bd1abdd19e9618a63d8 extends Twig_Template
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
    A new expedition was added to the Cryo Connect database by ";
        // line 3
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork", array()), "FieldworkLeaderName", array());
        echo " (<a href=\"mailto:";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork", array()), "FieldworkLeaderEmail", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork", array()), "FieldworkLeaderEmail", array()), "html", null, true);
        echo "</a>)
    Please approve the new listing using the following link:&nbsp;
</p>
<p><a href=\"https://cryoconnect.net";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_approval", array(), array("id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork", array()), "Id", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "\">https://cryoconnect.net";
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_approval", array(), array("id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork", array()), "Id", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "</a></p>

<p>Best,<br>
Cryo Connect</p>";
    }

    public function getTemplateName()
    {
        return "fieldworks/emails/fieldwork-approval-email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 6,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "fieldworks/emails/fieldwork-approval-email.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/fieldworks/emails/fieldwork-approval-email.html.twig");
    }
}
