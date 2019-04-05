<?php

/* fieldworks/fieldwork-thank-you-page.html.twig */
class __TwigTemplate_90e891cf80faa98f7ffabd6749018c4951c5aedda884990e4a87cc5ae7e71a57 extends Twig_Template
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
        echo "Dear ";
        echo twig_get_attribute($this->env, $this->source, $context, "leader_name", array());
        echo ",<br>
<p>
Thank you for registering your expedition. You will receive a confirmation email as soon as our moderator team verifies the data that you provided.
</p>
Best,<br>
Cryo Connect
";
    }

    public function getTemplateName()
    {
        return "fieldworks/fieldwork-thank-you-page.html.twig";
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
        return new Twig_Source("", "fieldworks/fieldwork-thank-you-page.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/fieldworks/fieldwork-thank-you-page.html.twig");
    }
}
