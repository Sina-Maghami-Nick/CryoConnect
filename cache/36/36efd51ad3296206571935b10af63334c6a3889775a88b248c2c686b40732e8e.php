<?php

/* fieldworks/fieldwork-connect-applicants.html.twig */
class __TwigTemplate_1b76bd06898bac95efd2c3e216a883ff571e960ba8f603782d38d460500113d9 extends Twig_Template
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
        <title>Fieldwork applicants</title>
        <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css\">
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.css\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
    </head>

    <body>
        <div class=\"row\">
            <div class=\"col s12 m12\">
                <div class=\"card cyan lighten-2\">
                    <div class=\"card-content\">
                        
                        <span class=\"card-title\">Expedition: ";
        // line 16
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_name", array());
        echo "</span>
                        <br>
                        <div class=\"row\">
                            <div class=\"col s2\">
                                <br><br><strong>Time you have left to choose:</strong>
                            </div>
                            <div class=\"col s10\"><p></p>
                                <div class=\"announcement-day-countdown\"></div>
                            </div>
                        </div>
                        <p>Number of accepted applicants: <strong>";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "accepted_applicant_count", array()), "html", null, true);
        echo "</strong></p>
                        <p>Number of seats left: <strong>";
        // line 27
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker_limit", array()) - twig_get_attribute($this->env, $this->source, $context, "accepted_applicant_count", array())), "html", null, true);
        echo "</strong></p>
                        <p>Website: <a href=\"";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_website", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_website", array()), "html", null, true);
        echo "</a></p>
                        <p>Start date: ";
        // line 29
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_start_date", array()), "F jS\\, Y"), "html", null, true);
        echo "</p>
                        <p>End date: ";
        // line 30
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_end_date", array()), "F jS\\, Y"), "html", null, true);
        echo "</p>
                        <p>Application deadline: ";
        // line 31
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_start_date", array()), "F jS\\, Y"), "html", null, true);
        echo "</p>
                        <p>Cost: ";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_cost", array()), "html", null, true);
        echo " Euros</p>
                        <p>Results announcement date: ";
        // line 33
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_announcement_deadline", array()), "F jS\\, Y"), "html", null, true);
        echo "</p>

                    </div>
                    <div class=\"card-action\">
                        <div class=\"row\">
                            <p class=\"center-align\">
                                <button class=\"btn modal-trigger waves-effect waves-light orange\" name=\"edit-expedition\" data-target=\"modal-edit-expedition\">Edit expedition info
                                    <i class=\"material-icons right\">edit</i>
                                </button>
                                <button class=\"btn modal-trigger waves-effect waves-light red\" name=\"delete-expedition\" data-target=\"modal-remove-expedition\">Delete expedition
                                    <i class=\"material-icons right\">delete_forever</i>
                                </button>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col s12 m12\">
                ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "applicants", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["applicant"]) {
            // line 55
            echo "                    <form class=\"application-submit col s12\" id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "Id", array()), "html", null, true);
            echo "\">
                        <div class=\"row\">
                            <div class=\"card purple lighten-5 hoverable\">
                                <div class=\"card-content black-text\">
                                    <span class=\"card-title\">Applicant name: ";
            // line 59
            echo twig_get_attribute($this->env, $this->source, $context["applicant"], "Name", array());
            echo "</span>
                                    <p>Website: <a href source=\"";
            // line 60
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "Website", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "Website", array()), "html", null, true);
            echo "</a></p>
                                    <p>Affiliation: ";
            // line 61
            echo twig_get_attribute($this->env, $this->source, $context["applicant"], "Affiliation", array());
            echo "</p>
                                    <p>Affiliation website: <a href source=\"";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "AffiliationWebsite", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "AffiliationWebsite", array()), "html", null, true);
            echo "</a></p>
                                    <p>Application reason: ";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "Reasons", array()), "html", null, true);
            echo "</p>
                                    <p>Email: ";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "Email", array()), "html", null, true);
            echo "</p>
                                    <p><strong>Requested spots: ";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "RequestedSpots", array()), "html", null, true);
            echo "</strong></p>
                                    
                                </div>
                                <div class=\"card-action\">
                                    ";
            // line 69
            if ((twig_get_attribute($this->env, $this->source, $context["applicant"], "Accepted", array()) == false)) {
                // line 70
                echo "                                        <label>
                                            <input type=\"checkbox\" class=\"filled-in\" required />
                                            <span><font color=\"black\">I agree to the terms and conditions<font color=\"red\">*</font></font></span>
                                        </label>
                                        </p>
                                        <div class=\"row\">
                                            <p class=\"center-align\">
                                                <button class=\"btn waves-effect waves-light green\" type=\"submit\" name=\"accep-applicantt\">Accept applicant
                                                    <i class=\"material-icons right\">check</i>
                                                </button>
                                                <button class=\"btn waves-effect waves-light red\" type=\"submit\" name=\"reject-applicantt\">Reject applicant
                                                    <i class=\"material-icons right\">close</i>
                                                </button>
                                            </p>
                                        </div>
                                    ";
            } else {
                // line 86
                echo "                                        <p><strong>This applicant is already accepted!</strong></p>
                                    ";
            }
            // line 88
            echo "                                </div>
                            </div>
                        </div>
                    </form>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['applicant'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "            </div>
        </div>

        <!-- Modal remove -->
        <div id=\"modal-remove-expedition\" class=\"modal\">
            <div class=\"modal-content\">
                <h4>Are you sure ?</h4><br>
                <p>By clicking on delete all of the data on this expedition will be deleted.
                    <br>
                    Once the expedition is deleted the applicants wil be informed by email.</p>
            </div>
            <div class=\"modal-footer\">
                <button id=\"delete-expedition-forever\" class=\"btn waves-effect waves-light red\">Delete expedition</button>
            </div>
        </div>

        <!-- Modal remove -->
        <div id=\"modal-edit-expedition\" class=\"modal\">
            <div class=\"modal-content\">

                <div class=\"row\">
                    <form class=\"col s12\" id=\"fieldwork_edit_form\">
                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"leader_name\" name=\"leader_name\" type=\"text\" class=\"validate\" value=\"";
        // line 117
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_name", array());
        echo "\" required>
                                <label for=\"leader_name\">Expedition leader's full name<font color=\"red\">*</font></label>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"leader_affiliation\" name=\"leader_affiliation\" type=\"text\" value=\"";
        // line 123
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_affiliation", array());
        echo "\" class=\"validate\" required>
                                <label for=\"leader_affiliation\">Expedition leader's primary affiliation<font color=\"red\">*</font></label>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"leader_website\" name=\"leader_website\" type=\"url\" value=\"";
        // line 129
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_website", array()), "html", null, true);
        echo "\" class=\"validate\">
                                <label for=\"leader_website\">Webpage with information about the expedition leader<font color=\"red\">*</font></label>
                                <span class=\"helper-text\">e.g. LinkedIn page - please enter the whole url including http://</span>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"project_name\" name=\"project_name\" type=\"text\" value=\"";
        // line 136
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_name", array());
        echo "\" class=\"validate\" required>
                                <label for=\"project_name\">Project or expedition name<font color=\"red\">*</font></label>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"project_website\" name=\"project_website\" type=\"url\" value=\"";
        // line 142
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_website", array()), "html", null, true);
        echo "\" class=\"validate\">
                                <label for=\"project_website\">Webpage with information about the project or expedition</label>
                                <span class=\"helper-text\">please enter the whole url including http://</span>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"locations\" name=\"locations\" type=\"text\" value=\"";
        // line 150
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_locations", array());
        echo "\" class=\"validate\" required>
                                <label for=\"locations\">More precise location</label>
                                <span class=\"helper-text\">please separate each location with comma</span>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <textarea id=\"science_goals\" name=\"science_goals\" class=\"materialize-textarea\">";
        // line 158
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_goal", array());
        echo "</textarea>
                                <label for=\"science_goals\">Scientific goal(s) of expedition</label>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"infomation_seeker_limit\" name=\"infomation_seeker_limit\" type=\"number\" min=\"";
        // line 165
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker_limit", array()), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker_limit", array()), "html", null, true);
        echo "\" class=\"validate\" required>
                                <label for=\"infomation_seeker_limit\">Maximum number of spots available for information seekers<font color=\"red\">*</font></label>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"infomation_seeker_cost\" name=\"infomation_seeker_cost\" type=\"number\" min=\"0\" value=\"";
        // line 171
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_cost", array()), "html", null, true);
        echo "\" class=\"validate\" required>
                                <label for=\"infomation_seeker_cost\">Approximate cost per information seeker in Euros<font color=\"red\">*</font></label>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <textarea id=\"package_included\" name=\"package_included\" class=\"materialize-textarea\" required>";
        // line 178
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_cost_inc", array());
        echo "</textarea>
                                <label for=\"package_included\">What would be covered by this cost?<font color=\"red\">*</font></label>
                                <span class=\"helper-text\">For instance travel, accommodation, food, insurance.</span>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <textarea id=\"package_excluded\" name=\"package_excluded\" class=\"materialize-textarea\">";
        // line 186
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_cost_exc", array());
        echo "</textarea>
                                <label for=\"package_excluded\">What would <u>not</u> be covered by this cost?</label>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <label>
                                    <input type=\"checkbox\" required/>
                                    <span>I agree to the terms and conditions<font color=\"red\">*</font></span>
                                </label>
                            </div>
                        </div>

                </div>

            </div>
            <div class=\"modal-footer\">
                <p class=\"center-align\">
                    <button id=\"edit-expedition-btn\" class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Update expedition
                        <i class=\"material-icons right\">edit</i>
                    </button>
                </p>
            </div>
        </form>
    </div>
</body>


<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.js\"></script>

<script>
    console.log(";
        // line 220
        echo json_encode($context);
        echo ");
    \$(document).ready(function () {

        var date = new Date('";
        // line 223
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_announcement_deadline", array())), "html", null, true);
        echo "'); //Month Days, Year HH:MM:SS
        var now = new Date();
        var diff = (date.getTime() / 1000) - (now.getTime() / 1000);
        var clock = \$('.announcement-day-countdown').FlipClock(diff, {
            clockFace: 'DailyCounter',
            countdown: true
        });
        \$(document).ready(function () {
            \$('.modal').modal();
        });
        //delete expedition
        \$(\"#delete-expedition-forever\").click(function () {

            var fieldworkId = \"";
        // line 236
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldworkId", array()), "html", null, true);
        echo "\";
            var fieldworkLeaderEmail = \"";
        // line 237
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_email", array()), "html", null, true);
        echo "\";
            var token = getUrlParameter('t');
            var postUrl = \"";
        // line 239
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_delete"), "html", null, true);
        echo "\";
            if (
                    String(token).trim() == '' ||
                    String(fieldworkId).trim() == '' ||
                    String(fieldworkLeaderEmail).trim() == '')
            {
                alert('Something went wrong! Please contact Cryo Connect!');
                return false;
            } else {
                \$.ajax({
                    type: 'DELETE',
                    headers: {
                        'Token-Authorization-X': `Bearer \${token}`,
                    },
                    url: postUrl,
                    data: 'e=' + fieldworkLeaderEmail + '&id=' + fieldworkId,
                    beforeSend: function () {
                        \$('#delete-expedition-forever').attr(\"disabled\", \"disabled\");
                        \$('.modal-remove-expedition').css('opacity', '.5');
                    }
                })
                        .done(function (data) {
                            alert('Your expedition has been succesfully deleted!');
                            window.location.href = \"/\";
                        })
                        .fail(function (errMsg) {
                            alert('Some problem occurred, please try again and make sure your enteries are correct. If problem consists please contact the IT support!');
                            \$('#delete-expedition-forever').removeAttr(\"disabled\");
                            \$('.modal-remove-expedition').css('opacity', '');
                        });
            }
        });
        //edit fieldwork subbmit
        \$(\"#fieldwork_edit_form\").submit(function (event) {

            /* stop form from submitting normally */
            event.preventDefault();

            var fieldworkId = \"";
        // line 277
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldworkId", array()), "html", null, true);
        echo "\";
            var fieldworkLeaderEmail = \"";
        // line 278
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_email", array()), "html", null, true);
        echo "\";
            var token = getUrlParameter('t');
            var postUrl = \"";
        // line 280
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_edit"), "html", null, true);
        echo "\";
            var formObject = \$(this);

            if (
                    String(token).trim() == '' ||
                    String(fieldworkId).trim() == '' ||
                    String(fieldworkLeaderEmail).trim() == '')
            {
                alert('Something went wrong! Please contact Cryo Connect!');
                return false;
            } else {
                \$.ajax({
                    type: 'PUT',
                    headers: {
                        'Token-Authorization-X': `Bearer \${token}`,
                    },
                    url: postUrl,
                    data: formObject.serialize() + '&e=' + fieldworkLeaderEmail + '&id=' + fieldworkId,
                    beforeSend: function () {
                        \$('#edit-expedition-btn').attr(\"disabled\", \"disabled\");
                        \$('.modal-edit-expedition').css('opacity', '.5');
                    }
                })
                        .done(function (data) {
                            location.reload();
                        })
                        .fail(function (errMsg) {
                            alert('Some problem occurred, please try again and make sure your enteries are correct. If problem consists please contact the IT support!');
                            \$('#edit-expedition-btn').removeAttr(\"disabled\");
                            \$('.modal-edit-expedition').css('opacity', '');
                        });
            }

        });
        //form subbmition
        \$(\".application-submit\").submit(function (event) {

            /* stop form from submitting normally */
            event.preventDefault();
            var formObject = \$(this);
            \$.ajax({
                type: 'POST',
                headers: {
                    'Token-Authorization-X': `Bearer ";
        // line 323
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "token", array()), "html", null, true);
        echo "`,
                },
                url: \"";
        // line 325
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_bid_request_submit"), "html", null, true);
        echo "\",
                data: formObject.serialize() + \"&e=";
        // line 326
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
                        alert('Some problem occurred, please try again and make sure your entries are correct. If problem consists please contact the IT support!');
                        \$('.submitBtn').removeAttr(\"disabled\");
                        \$('.modal-body').css('opacity', '');
                    });
        });
        //to initialize materelize forms
        \$('select').formSelect();

        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
        };
    });

</script>
";
    }

    public function getTemplateName()
    {
        return "fieldworks/fieldwork-connect-applicants.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  488 => 326,  484 => 325,  479 => 323,  433 => 280,  428 => 278,  424 => 277,  383 => 239,  378 => 237,  374 => 236,  358 => 223,  352 => 220,  315 => 186,  304 => 178,  294 => 171,  283 => 165,  273 => 158,  262 => 150,  251 => 142,  242 => 136,  232 => 129,  223 => 123,  214 => 117,  188 => 93,  178 => 88,  174 => 86,  156 => 70,  154 => 69,  147 => 65,  143 => 64,  139 => 63,  133 => 62,  129 => 61,  123 => 60,  119 => 59,  111 => 55,  107 => 54,  83 => 33,  79 => 32,  75 => 31,  71 => 30,  67 => 29,  61 => 28,  57 => 27,  53 => 26,  40 => 16,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "fieldworks/fieldwork-connect-applicants.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/fieldworks/fieldwork-connect-applicants.html.twig");
    }
}
