<?php

/* information-seekers/emails/fieldwork-connect-application-rejected-email.html.twig */
class __TwigTemplate_12358b0caffac428ccf6063d834be80f1c4883ff96cb9221ae2eed8e327f50fe extends Twig_Template
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
<p>We regret to inform you that you did not get selected to join ";
        // line 2
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_name", array());
        echo " expedition. Either too many information seekers showed an interest in the expedition, or the expedition plans changed. Please feel free to look for other scientific expeditions to the cryosphere that may be of interest to you at https://CryoConnect.net.
</p>

<p>Best,<br>
Cryo Connect</p>";
    }

    public function getTemplateName()
    {
        return "information-seekers/emails/fieldwork-connect-application-rejected-email.html.twig";
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
        return new Twig_Source("", "information-seekers/emails/fieldwork-connect-application-rejected-email.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/information-seekers/emails/fieldwork-connect-application-rejected-email.html.twig");
    }
}
