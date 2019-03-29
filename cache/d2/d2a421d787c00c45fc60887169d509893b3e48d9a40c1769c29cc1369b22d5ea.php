<?php

/* information-seekers/fieldwork-connect-details.html.twig */
class __TwigTemplate_d9ecf7dc947dad57f5cdc14a0e4510883f83f19d833c680677e4701d18210e7f extends Twig_Template
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
        echo "<html>
    <head>
        <title>Fieldwork details</title>
        <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
    </head>

    <body>
        <div class=\"row\">
            ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "fieldworks", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["fieldwork"]) {
            // line 12
            echo "                <div class=\"col s12 m12\">
                <form class=\"application-submit col s12\" id=\"";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "Id", array()), "html", null, true);
            echo "\">
                    <div class=\"row\">
                        <div class=\"card green lighten-3 hoverable\">
                            <div class=\"card-content black-text\">
                                <span class=\"card-title\">Expedition name: ";
            // line 17
            echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkName", array());
            echo "</span>
                                <p>Expedition leader name: ";
            // line 18
            echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkLeaderName", array());
            echo "</p>
                                <p>Expedition leader affliation: ";
            // line 19
            echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkLeaderAffiliation", array());
            echo "</p>
                                <p>Expedition leader website: ";
            // line 20
            echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkLeaderWebsite", array());
            echo "</p>
                                <p>Expedition website: <a href source=\"";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkProjectWebsite", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkProjectWebsite", array()), "html", null, true);
            echo "</a></p>
                                <p>Region: ";
            // line 22
            echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkRegion", array());
            echo "</p>
                                <p>Location(s): ";
            // line 23
            echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkLocations", array());
            echo "</p>
                                <p>Start date: ";
            // line 24
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkStartDate", array()), 0, 10), "html", null, true);
            echo "</p>
                                <p>End date: ";
            // line 25
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkEndDate", array()), 0, 10), "html", null, true);
            echo "</p>
                                <p>Expedition goal(s): ";
            // line 26
            echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkGoal", array());
            echo "</p>
                                <p>Total spots offered: ";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkInformationSeekerLimit", array()), "html", null, true);
            echo "</p>
                                <p>Cost: ";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkInformationSeekerCost", array()), "html", null, true);
            echo " Euros</p>
                                <p>Included in the cost: ";
            // line 29
            echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkInformationSeekerPackageIncluded", array());
            echo "</p>
                                <p>Not included in the cost: ";
            // line 30
            echo twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkInformationSeekerPackageExcluded", array());
            echo "</p>
                                <p>Deadline: ";
            // line 31
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkInformationSeekerDeadline", array()), 0, 10), "html", null, true);
            echo "</p>
                                <p>Approximate date of decision on who joins by the expedition leader: ";
            // line 32
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkInformationSeekerAnnouncementDate", array()), 0, 10), "html", null, true);
            echo "</p>
                                ";
            // line 33
            if ((twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkIsCertain", array()) == false)) {
                // line 34
                echo "                                    <p>
                                        <strong>
                                            NOTE: this expedition is not certain yet, it will be certain at ";
                // line 36
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "FieldworkWhenCertain", array()), 0, 10), "html", null, true);
                echo "
                                        </strong>
                                    </p>
                                ";
            }
            // line 40
            echo "
                            </div>
                            <div class=\"card-action\">
                                ";
            // line 43
            if ((twig_get_attribute($this->env, $this->source, $context["fieldwork"], "ApplicationSent", array()) == false)) {
                // line 44
                echo "                                    ";
                // line 54
                echo "                                    ";
                // line 60
                echo "                                    <p class=\"center-align\">
                                        <button class=\"btn waves-effect waves-light green pulse\" type=\"submit\" name=\"action\">Apply
                                            <i class=\"material-icons right\">pan_tool</i>
                                        </button>
                                    </p>
                                ";
            } else {
                // line 66
                echo "                                    <p><strong>You have applied to join this expedition. You will be informed about the expedition leader’s decision by email.</strong></p>
                                ";
            }
            // line 68
            echo "                            </div>
                        </div>
                    </div>
                </form>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fieldwork'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "        </div>
    </body>


    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js\"></script>

    <script>
        ";
        // line 83
        echo "        \$(document).ready(function () {

            //form subbmition
            \$(\".application-submit\").submit(function (event) {

                /* stop form from submitting normally */
                event.preventDefault();

                var formObject = \$(this);


                \$.ajax({
                    type: 'POST',
                    headers: {
                        'Token-Authorization-X': `Bearer ";
        // line 97
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "token", array()), "html", null, true);
        echo "`,
                    },
                    url: \"";
        // line 99
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_bid_request_submit"), "html", null, true);
        echo "\",
                    data: formObject.serialize() + \"&e=";
        // line 100
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "email", array()), "html", null, true);
        echo "&ish=";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker_hash", array()), "html", null, true);
        echo "&fh=\" + formObject[0].id,
                            beforeSend: function () {
                                \$('.submitBtn').attr(\"disabled\", \"disabled\");
                                \$('.modal-body').css('opacity', '.5');
                            }
                })
                        .done(function (data) {
                            location.reload();
                        })
                        .fail(function (errMsg) {
                            alert('Apologies, an error occurred. Please try again or contact info@cryoconnect.net.');
                            \$('.submitBtn').removeAttr(\"disabled\");
                            \$('.modal-body').css('opacity', '');
                        });

            });

            //to initialize materelize forms
            \$('select').formSelect();

        });
        
    </script>
";
    }

    public function getTemplateName()
    {
        return "information-seekers/fieldwork-connect-details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 100,  193 => 99,  188 => 97,  172 => 83,  162 => 74,  151 => 68,  147 => 66,  139 => 60,  137 => 54,  135 => 44,  133 => 43,  128 => 40,  121 => 36,  117 => 34,  115 => 33,  111 => 32,  107 => 31,  103 => 30,  99 => 29,  95 => 28,  91 => 27,  87 => 26,  83 => 25,  79 => 24,  75 => 23,  71 => 22,  65 => 21,  61 => 20,  57 => 19,  53 => 18,  49 => 17,  42 => 13,  39 => 12,  35 => 11,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "information-seekers/fieldwork-connect-details.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/information-seekers/fieldwork-connect-details.html.twig");
    }
}
