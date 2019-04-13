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
<p>There are only 3 days left until the accepeted applicants annoucement date for: \"";
        // line 2
        echo ($context["fieldwork_name"] ?? null);
        echo "\"!<br>
    Please use the following link to accept or reject the information seekers who applied for this expedition:
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
        return "api/emails/expedition-announcement-deadline.html.twig";
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
        return new Twig_Source("", "api/emails/expedition-announcement-deadline.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/api/emails/expedition-announcement-deadline.html.twig");
    }
}
