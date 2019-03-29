<?php

/* information-seekers/emails/fieldwork-deleted-email.html.twig */
class __TwigTemplate_f7ded785540ce39bb2241a9f9e576a8bf0d00a65fc59ed3d4c6a10887c4bfa56 extends Twig_Template
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
<p>We are sorry to inform you that the expedition that you have applied for (";
        // line 2
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_name", array());
        echo ") has been cancelled.</p>

<p>Best,<br>
Cryo Connect</p>";
    }

    public function getTemplateName()
    {
        return "information-seekers/emails/fieldwork-deleted-email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "information-seekers/emails/fieldwork-deleted-email.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/information-seekers/emails/fieldwork-deleted-email.html.twig");
    }
}
