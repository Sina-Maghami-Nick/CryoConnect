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
                            <div class=\"col s3\">
                                <br><strong>Please select the information seeker(s) of your choice within:</strong>
                            </div>
                            <div class=\"col s9\"><p></p>
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
            echo "                    <div class=\"row\">
                        <div class=\"card purple lighten-5 hoverable\">
                            <div class=\"card-content black-text\">
                                <span class=\"card-title\">Applicant name: ";
            // line 58
            echo twig_get_attribute($this->env, $this->source, $context["applicant"], "Name", array());
            echo "</span>
                                <p>Website: <a href source=\"";
            // line 59
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "Website", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "Website", array()), "html", null, true);
            echo "</a></p>
                                <p>Affiliation: ";
            // line 60
            echo twig_get_attribute($this->env, $this->source, $context["applicant"], "Affiliation", array());
            echo "</p>
                                <p>Affiliation website: <a href source=\"";
            // line 61
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "AffiliationWebsite", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "AffiliationWebsite", array()), "html", null, true);
            echo "</a></p>
                                <p>Application reason: ";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "Reasons", array()), "html", null, true);
            echo "</p>
                                <p>Email: ";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "Email", array()), "html", null, true);
            echo "</p>
                                <p><strong>Requested spots: ";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "RequestedSpots", array()), "html", null, true);
            echo "</strong></p>

                            </div>
                            <div class=\"card-action\">
                                ";
            // line 68
            if ((twig_get_attribute($this->env, $this->source, $context["applicant"], "Accepted", array()) == false)) {
                // line 69
                echo "                                    ";
                // line 74
                echo "                                    <div class=\"row\">
                                        <p class=\"center-align\">
                                            <button class=\"btn waves-effect waves-light green\" data-applicantid=\"";
                // line 76
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "Id", array()), "html", null, true);
                echo "\" name=\"accept-applicant\">Accept applicant
                                                <i class=\"material-icons right\">check</i>
                                            </button>
                                            <button class=\"btn modal-trigger waves-effect waves-light red\"  data-target=\"modal-reject-applicant\" name=\"reject-applicant-modal-toggle\" data-applicantid=\"";
                // line 79
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "Id", array()), "html", null, true);
                echo "\">Reject applicant
                                                <i class=\"material-icons right\">close</i>
                                            </button>
                                        </p>
                                    </div>
                                ";
            } else {
                // line 85
                echo "                                    <div class=\"row\">
                                        <strong>This applicant is already accepted!</strong>

                                        <i class=\"right\">
                                            <button class=\"btn-floating btn-medium modal-trigger waves-effect waves-light red\"  data-target=\"modal-reject-applicant\" name=\"reject-applicant-modal-toggle\" data-applicantid=\"";
                // line 89
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["applicant"], "Id", array()), "html", null, true);
                echo "\">
                                                <i class=\"material-icons right\">close</i>
                                            </button>
                                        </i>
                                    </div>


                                ";
            }
            // line 97
            echo "                            </div>
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['applicant'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        echo "            </div>
        </div>

        <!-- Modal reject -->
        <div id=\"modal-reject-applicant\" class=\"modal\">
            <div class=\"modal-content\">
                <h4>Are you sure to reject this applicant?</h4><br>
                <p>By proceeding the applicant will be rejected and <strong>permanently</strong> deleted from your expedition list.
                </p>
            </div>
            <div class=\"modal-footer\">
                <button id=\"withdraw-applicant\" class=\"btn waves-effect waves-light red\">remove applicant</button>
            </div>
        </div>

        <!-- Modal remove -->
        <div id=\"modal-remove-expedition\" class=\"modal\">
            <div class=\"modal-content\">
                <h4>Are you sure ?</h4><br>
                <p>By clicking on the 'delete' all of the data on this expedition will be deleted.
                    <br>
                    Once the expedition is deleted the applicants wil be informed by email.</p>
            </div>
            <div class=\"modal-footer\">
                <button id=\"delete-expedition-forever\" class=\"btn waves-effect waves-light red\">Delete expedition</button>
            </div>
        </div>

        <!-- Modal edit -->
        <div id=\"modal-edit-expedition\" class=\"modal\">
            <div class=\"modal-content\">

                <div class=\"row\">
                    <form class=\"col s12\" id=\"fieldwork_edit_form\">
                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"leader_name\" name=\"leader_name\" type=\"text\" class=\"validate\" value=\"";
        // line 137
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_name", array());
        echo "\" required>
                                <label for=\"leader_name\">Expedition leader's full name<font color=\"red\">*</font></label>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"leader_affiliation\" name=\"leader_affiliation\" type=\"text\" value=\"";
        // line 143
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_affiliation", array());
        echo "\" class=\"validate\" required>
                                <label for=\"leader_affiliation\">Expedition leader's primary affiliation<font color=\"red\">*</font></label>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"leader_website\" name=\"leader_website\" type=\"url\" value=\"";
        // line 149
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_website", array()), "html", null, true);
        echo "\" class=\"validate\">
                                <label for=\"leader_website\">Webpage with information about the expedition leader<font color=\"red\">*</font></label>
                                <span class=\"helper-text\">e.g. LinkedIn page - please enter the whole url including http://</span>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"project_name\" name=\"project_name\" type=\"text\" value=\"";
        // line 156
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_name", array());
        echo "\" class=\"validate\" required>
                                <label for=\"project_name\">Project or expedition name<font color=\"red\">*</font></label>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"project_website\" name=\"project_website\" type=\"url\" value=\"";
        // line 162
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_website", array()), "html", null, true);
        echo "\" class=\"validate\">
                                <label for=\"project_website\">Webpage with information about the project or expedition</label>
                                <span class=\"helper-text\">please enter the whole url including http://</span>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"locations\" name=\"locations\" type=\"text\" value=\"";
        // line 170
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_locations", array());
        echo "\" class=\"validate\" required>
                                <label for=\"locations\">More precise location</label>
                                <span class=\"helper-text\">please separate each location with comma</span>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <textarea id=\"science_goals\" name=\"science_goals\" class=\"materialize-textarea\">";
        // line 178
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_goal", array());
        echo "</textarea>
                                <label for=\"science_goals\">Scientific goal(s) of expedition</label>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"infomation_seeker_limit\" name=\"infomation_seeker_limit\" type=\"number\" min=\"";
        // line 185
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
        // line 191
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_cost", array()), "html", null, true);
        echo "\" class=\"validate\" required>
                                <label for=\"infomation_seeker_cost\">Approximate cost per information seeker in Euros<font color=\"red\">*</font></label>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <textarea id=\"package_included\" name=\"package_included\" class=\"materialize-textarea\" required>";
        // line 198
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_cost_inc", array());
        echo "</textarea>
                                <label for=\"package_included\">What would be covered by this cost?<font color=\"red\">*</font></label>
                                <span class=\"helper-text\">For instance travel, accommodation, food, insurance.</span>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <textarea id=\"package_excluded\" name=\"package_excluded\" class=\"materialize-textarea\">";
        // line 206
        echo twig_get_attribute($this->env, $this->source, $context, "fieldwork_cost_exc", array());
        echo "</textarea>
                                <label for=\"package_excluded\">What would <u>not</u> be covered by this cost?</label>
                            </div>
                        </div>

                        ";
        // line 219
        echo "                </div>

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
        // line 239
        echo json_encode($context);
        echo ");
    \$(document).ready(function () {

        var date = new Date('";
        // line 242
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
        //accept applicant
        \$('button[name=accept-applicant]').click(function () {
            var clickedBut = \$(this);
            var fieldworkId = \"";
        // line 255
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldworkId", array()), "html", null, true);
        echo "\";
            var fieldworkLeaderEmail = \"";
        // line 256
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_email", array()), "html", null, true);
        echo "\";
            var token = getUrlParameter('t');
            var applicantId = \$(this).data('applicantid');
            var postUrl = \"";
        // line 259
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_applicant_accept"), "html", null, true);
        echo "\";
            if (
                    String(token).trim() == '' ||
                    String(fieldworkId).trim() == '' ||
                    String(fieldworkLeaderEmail).trim() == '' ||
                    String(applicantId).trim() == '')
            {
                alert('Something went wrong! Please contact Cryo Connect!');
                return false;
            } else {
                \$.ajax({
                    type: 'POST',
                    headers: {
                        'Token-Authorization-X': `Bearer \${token}`,
                    },
                    url: postUrl,
                    data: 'e=' + fieldworkLeaderEmail + '&id=' + fieldworkId + '&aph=' + applicantId,
                    beforeSend: function () {
                        clickedBut.attr(\"disabled\", \"disabled\");
                    }
                })
                        .done(function (data) {
                            location.reload();
                        })
                        .fail(function (errMsg) {
                            alert('Apologies, an error occurred. Please try again or contact info@cryoconnect.net.');
                            clickedBut.removeAttr(\"disabled\");
                        });
            }
        });

        //reject applicant
        \$('button[name=reject-applicant-modal-toggle]').click(function () {
            document.getElementById(\"withdraw-applicant\").dataset.applicantid = \$(this).data('applicantid');
        });

        \$('#withdraw-applicant').click(function () {
            var fieldworkId = \"";
        // line 296
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldworkId", array()), "html", null, true);
        echo "\";
            var clickedBut = \$(this);
            var fieldworkLeaderEmail = \"";
        // line 298
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_email", array()), "html", null, true);
        echo "\";
            var token = getUrlParameter('t');
            var applicantId = \$(this).data('applicantid');
            var postUrl = \"";
        // line 301
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_applicant_reject"), "html", null, true);
        echo "\";
            if (
                    String(token).trim() == '' ||
                    String(fieldworkId).trim() == '' ||
                    String(fieldworkLeaderEmail).trim() == '' ||
                    String(applicantId).trim() == '')
            {
                alert('Something went wrong! Please contact Cryo Connect!');
                return false;
            } else {
                \$.ajax({
                    type: 'POST',
                    headers: {
                        'Token-Authorization-X': `Bearer \${token}`,
                    },
                    url: postUrl,
                    data: 'e=' + fieldworkLeaderEmail + '&id=' + fieldworkId + '&aph=' + applicantId,
                    beforeSend: function () {
                        clickedBut.attr(\"disabled\", \"disabled\");
                    }
                })
                        .done(function (data) {
                            location.reload();
                        })
                        .fail(function (errMsg) {
                            alert('Apologies, an error occurred. Please try again or contact info@cryoconnect.net.');
                            clickedBut.removeAttr(\"disabled\");
                        });
            }
        });

        //delete expedition
        \$(\"#delete-expedition-forever\").click(function () {

            var fieldworkId = \"";
        // line 335
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldworkId", array()), "html", null, true);
        echo "\";
            var fieldworkLeaderEmail = \"";
        // line 336
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_email", array()), "html", null, true);
        echo "\";
            var token = getUrlParameter('t');
            var postUrl = \"";
        // line 338
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
                            M.toast({
                                html: 'Your expedition has been succesfully deleted!',
                                displayLength: 5000,
                                completeCallback: function () {
                                    window.location.href = \"/\"
                                }
                            });
                        })
                        .fail(function (errMsg) {
                            alert('Apologies, an error occurred. Please try again or contact info@cryoconnect.net.');
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
        // line 380
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldworkId", array()), "html", null, true);
        echo "\";
            var fieldworkLeaderEmail = \"";
        // line 381
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "fieldwork_leader_email", array()), "html", null, true);
        echo "\";
            var token = getUrlParameter('t');
            var postUrl = \"";
        // line 383
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
                            alert('Apologies, an error occurred. Please try again or contact info@cryoconnect.net.');
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
        // line 425
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "token", array()), "html", null, true);
        echo "`,
                },
                url: \"";
        // line 427
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_bid_request_submit"), "html", null, true);
        echo "\",
                data: formObject.serialize() + \"&e=";
        // line 428
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
        return array (  606 => 428,  602 => 427,  597 => 425,  552 => 383,  547 => 381,  543 => 380,  498 => 338,  493 => 336,  489 => 335,  452 => 301,  446 => 298,  441 => 296,  401 => 259,  395 => 256,  391 => 255,  375 => 242,  369 => 239,  347 => 219,  339 => 206,  328 => 198,  318 => 191,  307 => 185,  297 => 178,  286 => 170,  275 => 162,  266 => 156,  256 => 149,  247 => 143,  238 => 137,  200 => 101,  191 => 97,  180 => 89,  174 => 85,  165 => 79,  159 => 76,  155 => 74,  153 => 69,  151 => 68,  144 => 64,  140 => 63,  136 => 62,  130 => 61,  126 => 60,  120 => 59,  116 => 58,  111 => 55,  107 => 54,  83 => 33,  79 => 32,  75 => 31,  71 => 30,  67 => 29,  61 => 28,  57 => 27,  53 => 26,  40 => 16,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "fieldworks/fieldwork-connect-applicants.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/fieldworks/fieldwork-connect-applicants.html.twig");
    }
}
