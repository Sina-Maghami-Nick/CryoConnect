<?php

/* emails/experts-approval-email.html.twig */
class __TwigTemplate_1d3189e92e0dceadf8b479190210e4ddbefa92251adc4254172b4216f5cee98b extends Twig_Template
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
<p>There is a new expert request :&nbsp;</p>
<p>Expert Name : ";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "FirstName", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "LastName", array()), "html", null, true);
        echo "</p>
<p>Expert Email : ";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Email", array()), "html", null, true);
        echo "</p>
<p>Could you please approve/disapprove the new expert using the following link :&nbsp;</p>
<p><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("expert_approval", array(), array("id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Id", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("expert_approval", array(), array("id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Id", array()), "t" => twig_get_attribute($this->env, $this->source, $context, "token", array()))), "html", null, true);
        echo "</a></p>

<p>&nbsp;</p>
<p>Thank you,</p>
<p>Best wishes,</p>
<p>CryoConnect App</p>
<p>&nbsp;</p>
<p>&nbsp;</p>";
    }

    public function getTemplateName()
    {
        return "emails/experts-approval-email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  33 => 4,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "emails/experts-approval-email.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/emails/experts-approval-email.html.twig");
    }
}
