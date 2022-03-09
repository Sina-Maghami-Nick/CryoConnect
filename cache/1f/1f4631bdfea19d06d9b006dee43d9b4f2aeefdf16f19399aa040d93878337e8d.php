<?php

/* ./macros/view-macros.html.twig */
class __TwigTemplate_ce5da6a78549e0230c206f2ad9f6b1c31eec98fab97c16d489192c1e8a7ee767 extends Twig_Template
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
        // line 5
        echo "
";
    }

    // line 2
    public function macro_recaptchaLoad(...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 3
            echo "    <script src=\"https://www.google.com/recaptcha/api.js?render=6LeyIZ4UAAAAABsMnmmR0r9iV2p3NCBPmal3iPjF\"></script>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 6
    public function macro_recaptchaExecute(...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 7
            echo "    grecaptcha.ready(function () {
        grecaptcha.execute('6LeyIZ4UAAAAABsMnmmR0r9iV2p3NCBPmal3iPjF', {action: 'app'}).then(function(token) {
            \$(document).data('repactcha-token', token);
        });
    });
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "./macros/view-macros.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 7,  49 => 6,  39 => 3,  28 => 2,  23 => 5,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "./macros/view-macros.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/macros/view-macros.html.twig");
    }
}
