<?php

/* fieldworks/fieldwork-registration.html.twig */
class __TwigTemplate_c8f1ad05cb23b2eacc4df792baacc5de6620a7cf09c493a8a746f7bd342d8adb extends Twig_Template
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
        // line 2
        echo "<html>
    <head>
        <title>Fieldwork registration</title>
        <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css\">
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
    </head>

    <body>
        <div class=\"row\">
            <form class=\"col s12\" id=\"fieldwork_form\">
                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"leader_name\" name=\"leader_name\" type=\"text\" class=\"validate\" required>
                        <label for=\"leader_name\">Expedition leader's full name<font color=\"red\">*</font></label>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"leader_email\" name=\"leader_email\" type=\"email\" class=\"validate\" required>
                        <label for=\"leader_email\">Expedition leader's email<font color=\"red\">*</font></label>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"leader_affiliation\" name=\"leader_affiliation\" type=\"text\" class=\"validate\" required>
                        <label for=\"leader_affiliation\">Expedition leader's primary affiliation<font color=\"red\">*</font></label>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"leader_website\" name=\"leader_website\" type=\"url\" class=\"validate\">
                        <label for=\"leader_website\">Webpage with information about the expedition leader<font color=\"red\">*</font></label>
                        <span class=\"helper-text\">e.g. LinkedIn page - please enter the whole url including http://</span>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"project_name\" name=\"project_name\" type=\"text\" class=\"validate\" required>
                        <label for=\"project_name\">Project or expedition name<font color=\"red\">*</font></label>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"project_website\" name=\"project_website\" type=\"url\" class=\"validate\">
                        <label for=\"project_website\">Webpage with information about the project or expedition</label>
                        <span class=\"helper-text\">please enter the whole url including http://</span>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <select id=\"cryosphere_where\" name=\"cryosphere_where\" required>
                            <option value=\"\" disabled selected>choose</option>
                            ";
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_where", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_where"]) {
            // line 58
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "Id", array()), "html", null, true);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "CryosphereWhereName", array());
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_where'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "                        </select>
                        <label for=\"cryosphere_where\">Region of expedition<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"locations\" name=\"locations\" type=\"text\" class=\"validate\" required>
                        <label for=\"locations\">More precise location</label>
                        <span class=\"helper-text\">please separate each location with comma</span>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"start_date\" name=\"start_date\" type=\"text\" class=\"datepicker\" required>
                        <label for=\"start_date\">Approximate expedition start date<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"end_date\" name=\"end_date\" type=\"text\" class=\"datepicker\" required>
                        <label for=\"start_date\">Approximate expedition end date<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <textarea id=\"science_goals\" name=\"science_goals\" class=\"materialize-textarea\"></textarea>
                        <label for=\"science_goals\">Scientific goal(s) of expedition</label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"infomation_seeker_limit\" name=\"infomation_seeker_limit\" type=\"number\" min=\"1\" class=\"validate\" required>
                        <label for=\"infomation_seeker_limit\">Maximum number of spots available for information seekers<font color=\"red\">*</font></label>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"infomation_seeker_cost\" name=\"infomation_seeker_cost\" type=\"number\" min=\"0\" class=\"validate\" required>
                        <label for=\"infomation_seeker_cost\">Approximate cost per information seeker in Euros<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <textarea id=\"package_included\" name=\"package_included\" class=\"materialize-textarea\" required></textarea>
                        <label for=\"package_included\">What would be covered by this cost?<font color=\"red\">*</font></label>
                        <span class=\"helper-text\">For instance travel, accommodation, food, insurance.</span>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <textarea id=\"package_excluded\" name=\"package_excluded\" class=\"materialize-textarea\"></textarea>
                        <label for=\"package_excluded\">What would <u>not</u> be covered by this cost?</label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"infomation_seeker_deadline\" name=\"infomation_seeker_deadline\" type=\"text\" class=\"datepicker\" required>
                        <label for=\"infomation_seeker_deadline\">Deadline for information seekers to apply<font color=\"red\">*</font></label>       
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <span class=\"helper-text\">Is it (virtually) certain that the expedition will take place?<font color=\"red\">*</font><br><br></span>
                        <div class=\"switch\">
                            <label>
                                No
                                <input id=\"project_certain\" name=\"project_certain\" type=\"checkbox\">
                                <span class=\"lever\"></span>
                                Yes
                            </label>
                        </div>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"project_certain_date\" name=\"project_certain_date\" type=\"text\" class=\"datepicker\" required>
                        <label for=\"project_certain_date\">If not, when will it be certain?</label>       
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"infomation_seeker_announcment_date\" name=\"infomation_seeker_announcment_date\" type=\"text\" class=\"datepicker\" required>
                        <label for=\"infomation_seeker_announcment_date\">When would information seeker applicants be informed of your decision?<font color=\"red\">*</font></label>       
                    </div>
                </div>        
                ";
        // line 164
        echo "
                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <p class=\"center-align\">
                            <button id=\"submitBtn\" class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Submit
                                <i class=\"material-icons right\">send</i>
                            </button>
                        </p>
                    </div>
                </div>

            </form>
        </div>




    </body>
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/flatpickr\"></script>
    <script>

        //enables date picker for uncertain dates
        \$(function () {
            \$('#project_certain').click(function () {
                if (\$(this).is(':checked')) {
                    \$('#project_certain_date').attr('disabled', 'disabled');
                } else {
                    \$('#project_certain_date').removeAttr('disabled');
                    \$('#project_certain_date').prop('required', false);
                }
            });
        });

        \$(document).ready(function () {

            //form subbmition
            \$(\"#fieldwork_form\").submit(function (event) {

                /* stop form from submitting normally */
                event.preventDefault();

                \$.ajax({
                    type: 'POST',
                    url: \"";
        // line 209
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork-registration"), "html", null, true);
        echo "\",
                    data: \$(this).serialize(),
                    beforeSend: function () {
                        \$('#submitBtn').attr(\"disabled\", \"disabled\");
                    }
                })
                        .done(function (data) {
                            document.body.innerHTML = data;
                            parent.scrollTo(0, 400);
                        })
                        .fail(function (errMsg) {
                            \$('#submitBtn').removeAttr(\"disabled\");
                            alert(\"Something has gone wrong! Please check your enteries and try again. If error persists, please contact us. Thank you\");
                        });

            });

            //to initialize materelize forms
            \$('select').formSelect();

            var todayDate = new Date();
            \$(\".datepicker\").flatpickr({
                minDate: todayDate,
                dateFormat: 'd M Y'
            });

            \$('.datepicker').on('focus', ({ currentTarget }) => \$(currentTarget).blur())
            \$(\".datepicker\").prop('readonly', false)

        });
    </script>
</html>";
    }

    public function getTemplateName()
    {
        return "fieldworks/fieldwork-registration.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 209,  193 => 164,  95 => 60,  84 => 58,  80 => 57,  23 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "fieldworks/fieldwork-registration.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/fieldworks/fieldwork-registration.html.twig");
    }
}
