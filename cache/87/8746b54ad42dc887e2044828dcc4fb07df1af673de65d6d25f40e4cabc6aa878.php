<?php

/* experts-thank-you-page.html.twig */
class __TwigTemplate_0f9df9fe7445762ee731430e008ec8fac0708e4456a4f46284e8644c103ae5f0 extends Twig_Template
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
        echo "<h2><strong>Dear ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "expert_first_name", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "expert_last_name", array()), "html", null, true);
        echo " ,</strong></h2>
<h2><strong>Thank you for subscribing. Our agents will check your data entered and you will recieve a confirmation email. as soon as your data is validated.</strong></h2>
<h2><strong>Best,</strong></h2>
<h2><strong>Cryo Connect</strong></h2>
<p>&nbsp;</p>
<p>&nbsp;</p>";
    }

    public function getTemplateName()
    {
        return "experts-thank-you-page.html.twig";
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
        return new Twig_Source("", "experts-thank-you-page.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/experts-thank-you-page.html.twig");
    }
}
