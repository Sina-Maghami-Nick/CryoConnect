<?php

/* emails/fieldwork-connect-approval-email.html.twig */
class __TwigTemplate_cce2028eb00c896c472aa7510e311f3f6d52c41b2b0728b1646c3006577493b1 extends Twig_Template
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
        echo "<p>Dear Admin,</p>
<p>There is a new fieldwork request :&nbsp;</p>
";
        // line 8
        echo "<p>&nbsp;</p>
<p>Thank you,</p>
<p>Best wishes,</p>
<p>CryoConnect App</p>
<p>&nbsp;</p>
<p>&nbsp;</p>";
    }

    public function getTemplateName()
    {
        return "emails/fieldwork-connect-approval-email.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  27 => 8,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "emails/fieldwork-connect-approval-email.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/emails/fieldwork-connect-approval-email.html.twig");
    }
}
