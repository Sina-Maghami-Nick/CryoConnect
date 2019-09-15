<?php

/* experts/emails/experts-removed-notification-email.html.twig */
class __TwigTemplate_0d61d315d8a122dc2a6ff19e68104a6c396c45150e1877748ab798fe56d2b169 extends Twig_Template
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
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "expert_name", array()), "html", null, true);
        echo ",</p>
<p>Your records as a Cryosphere expert has been succesfully deleted upon your request through the export's dashboard.&nbsp;</p>

<p>Thank you,</p>
<p>Best,<br>Cryo Connect</p>";
    }

    public function getTemplateName()
    {
        return "experts/emails/experts-removed-notification-email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "experts/emails/experts-removed-notification-email.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/experts/emails/experts-removed-notification-email.html.twig");
    }
}
