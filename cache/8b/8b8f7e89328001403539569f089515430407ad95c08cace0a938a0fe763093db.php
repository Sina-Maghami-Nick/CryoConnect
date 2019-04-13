<?php

/* information-seekers/emails/fieldwork-connect-application-accepted-email.html.twig */
class __TwigTemplate_7c6429a566cf30a3a238f5bc5a3c9864669f39ecb02bda32c0c0c0ab1a2550fc extends Twig_Template
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
<p>
 ";
        // line 3
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_name", array());
        echo ", the leader of the ";
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_name", array());
        echo " expedition, has approved your application to join the field campaign. Please contact her/him directly at <a href=\"mailto:";
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_email", array());
        echo "\">";
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_email", array());
        echo "</a> to learn all you need to know about the expedition. We wish you an enjoyable and insightful experience.
</p>

<p>Best,<br>
Cryo Connect</p>";
    }

    public function getTemplateName()
    {
        return "information-seekers/emails/fieldwork-connect-application-accepted-email.html.twig";
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
        return new Twig_Source("", "information-seekers/emails/fieldwork-connect-application-accepted-email.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/information-seekers/emails/fieldwork-connect-application-accepted-email.html.twig");
    }
}
