<?php

/* experts/expert-approval.html.twig */
class __TwigTemplate_d4a75323a44c1154c5a0672475102bf8ef43ee1537d8176cd0277d8cb5c399a6 extends Twig_Template
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
        echo "<!doctype html>
<html lang=\"en\">
    <head>
        <!-- Required meta tags -->
        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

        <!-- Bootstrap CSS -->
        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">
        <title>Expert Approval Page</title>
    </head>
    <body>
        <table class=\"table table-bordered table-hover\">
            <thead>
                <tr>
                    <th scope=\"col\">New Expert</th>
                        ";
        // line 17
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Approved", array()) == false)) {
            // line 18
            echo "
                        <td>Not approved yet!</td>

                    ";
        } else {
            // line 22
            echo "                        <td>Already approved!</td>
                    ";
        }
        // line 24
        echo "                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope=\"row\">First Name</th>
                    <td>";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "FirstName", array()), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th scope=\"row\">Last Name</th>
                    <td>";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "LastName", array()), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th scope=\"row\">Email</th>
                    <td colspan=\"2\">";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Email", array()), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th scope=\"row\">Gender</th>
                        ";
        // line 41
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Gender", array()) == "M")) {
            // line 42
            echo "                        <td colspan=\"2\">Male</td>
                    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 43
$context, "expert", array()), "Gender", array()) == "F")) {
            // line 44
            echo "                        <td colspan=\"2\">Female</td>
                    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 45
$context, "expert", array()), "Gender", array()) == "O")) {
            // line 46
            echo "                        <td colspan=\"2\">Other</td>
                    ";
        }
        // line 48
        echo "                </tr>
                <tr>
                    <th scope=\"row\">Birth Year</th>
                    <td colspan=\"2\">";
        // line 51
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "BirthYear", array()), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th scope=\"row\">Location</th>
                    <td colspan=\"2\">";
        // line 55
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, twig_get_attribute($this->env, $this->source, $context, "expert_country", array())), "CountryName", array()), "html", null, true);
        echo "</td>
                </tr>


                <tr>
                    <th scope=\"row\">Languages</th>
                    <td colspan=\"10\">
                        <ul class=\"list-group list-group-flush\">
                            ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_languages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_language"]) {
            // line 64
            echo "                                <li class=\"list-group-item\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["expert_language"], "Language", array()), "html", null, true);
            echo "
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                        </ul>
                    </td>
                </tr>



                <tr>
                    <th scope=\"row\">Expert Career Stage</th>
                    <td colspan=\"10\">
                        <ul class=\"list-group list-group-flush\">
                            ";
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_career_stages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_career_stage"]) {
            // line 77
            echo "                                <li class=\"list-group-item\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_career_stage"], "CareerStage", array()), "CareerStageName", array()), "html", null, true);
            echo " 
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_career_stage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "                        </ul>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">Primary Affiliation (Name - City - Country)</th>
                    <td colspan=\"10\">
                        <ul class=\"list-group list-group-flush\">
                            <li class=\"list-group-item\">";
        // line 87
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["expert_primary_affiliation"] ?? null), "PrimaryAffiliationName", array()), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["expert_primary_affiliation"] ?? null), "PrimaryAffiliationCity", array()), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["expert_primary_affiliation"] ?? null), "PrimaryAffiliationCountryCode", array()), "html", null, true);
        echo " </li>
                        </ul>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">Secondary Affiliations</th>
                    <td colspan=\"10\">
                        <ul class=\"list-group list-group-flush\">
                            ";
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_secondary_affiliation", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_secondary_affiliation"]) {
            // line 97
            echo "                                <li class=\"list-group-item\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["expert_secondary_affiliation"], "SecondaryAffiliationName", array()), "html", null, true);
            echo " 
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_secondary_affiliation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 99
        echo "                        </ul>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">Expert What</th>
                    <td colspan=\"10\">
                        <ul class=\"list-group list-group-flush\">
                            ";
        // line 107
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_what", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_what"]) {
            // line 108
            echo "                                ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_what"], "CryosphereWhat", array()), "Approved", array()) == true)) {
                // line 109
                echo "                                    <li class=\"list-group-item\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_what"], "CryosphereWhat", array()), "Id", array()), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_what"], "CryosphereWhat", array()), "CryosphereWhatName", array()), "html", null, true);
                echo " 
                                    ";
            }
            // line 111
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_what'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 112
        echo "                        </ul>
                    </td>
                </tr>


                <tr>
                    <th scope=\"row\">Expert What Specific</th>
                    <td colspan=\"10\">
                        <ul class=\"list-group list-group-flush\">
                            ";
        // line 121
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_what_specefic", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_what_specefic"]) {
            // line 122
            echo "                                ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_what_specefic"], "CryosphereWhatSpecefic", array()), "Approved", array()) == true)) {
                // line 123
                echo "                                    <li class=\"list-group-item\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_what_specefic"], "CryosphereWhatSpecefic", array()), "Id", array()), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_what_specefic"], "CryosphereWhatSpecefic", array()), "CryosphereWhatSpeceficName", array()), "html", null, true);
                echo " 
                                    ";
            }
            // line 125
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_what_specefic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 126
        echo "                        </ul>
                    </td>
                </tr>


                <tr>
                    <th scope=\"row\">Expert Where</th>
                    <td colspan=\"10\">
                        <ul class=\"list-group list-group-flush\">
                            ";
        // line 135
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_where", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_where"]) {
            // line 136
            echo "                                <li class=\"list-group-item\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_where"], "CryosphereWhere", array()), "Id", array()), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_where"], "CryosphereWhere", array()), "CryosphereWhereName", array()), "html", null, true);
            echo " 
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_where'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 138
        echo "                        </ul>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">Expert When</th>
                    <td colspan=\"10\">
                        <ul class=\"list-group list-group-flush\">
                            ";
        // line 146
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_when", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_when"]) {
            // line 147
            echo "                                ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_when"], "CryosphereWhen", array()), "Approved", array()) == true)) {
                // line 148
                echo "                                    <li class=\"list-group-item\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_when"], "CryosphereWhen", array()), "Id", array()), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_when"], "CryosphereWhen", array()), "CryosphereWhenName", array()), "html", null, true);
                echo " 
                                    ";
            }
            // line 150
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_when'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 151
        echo "                        </ul>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">Expert Methods</th>
                    <td colspan=\"10\">
                        <ul class=\"list-group list-group-flush\">
                            ";
        // line 159
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_methods", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_methods"]) {
            // line 160
            echo "                                ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_methods"], "CryosphereMethods", array()), "Approved", array()) == true)) {
                // line 161
                echo "                                    <li class=\"list-group-item\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_methods"], "CryosphereMethods", array()), "Id", array()), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_methods"], "CryosphereMethods", array()), "CryosphereMethodsName", array()), "html", null, true);
                echo " 
                                    ";
            }
            // line 163
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_methods'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 164
        echo "                        </ul>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">Contact Info</th>
                    <td colspan=\"10\">
                        <ul class=\"list-group list-group-flush\">
                            ";
        // line 172
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_contacts", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_contact"]) {
            // line 173
            echo "                                <li class=\"list-group-item\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_contact"], "ContactTypes", array()), "ContactType", array()), "html", null, true);
            echo " : ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["expert_contact"], "ContactInformation", array()), "html", null, true);
            echo " 
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_contact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 175
        echo "                        </ul>
                    </td>
                </tr>


            </tbody>
        </table>
        ";
        // line 182
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Approved", array()) == false)) {
            // line 183
            echo "            <div class=\"col-md text-center\"> 

                <button type=\"button\" class=\"expert-approve btn btn-success btn-lg\" data-toggle=\"modal\" data-target=\"#expertapprovemodal\">Approve Expert</button>

                <button type=\"button\" class=\"expert-reject btn btn-danger btn-lg\" data-toggle=\"modal\" data-target=\"#expertrejectmodal\">Reject Expert</button>

            </div>
        ";
        }
        // line 191
        echo "        <script>
            ";
        // line 193
        echo "        </script>


        <div class=\"modal fade\" id=\"expertapprovemodal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header text-center\">
                        <h4 class=\"modal-title w-100 font-weight-bold\">Are you sure to approve this expert ?</h4>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                    <div class=\"modal-body\">
                        <form>
                            <div class=\"form-group row\">
                                <label for=\"expertName\" class=\"col-sm-2 col-form-label\">Name:</label>
                                <div class=\"col-sm-10\">
                                    <input type=\"text\" class=\"form-control-plaintext\" name=\"expertName\" id=\"expertName\" value=\"";
        // line 210
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "FirstName", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "LastName", array()), "html", null, true);
        echo "\" readonly>
                                </div>
                            </div>

                            <input type=\"hidden\" id=\"expertID\" name=\"custId\" value=";
        // line 214
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Id", array()), "html", null, true);
        echo ">
                            <div class=\"modal-footer \">
                                <button type=\"button\" id=\"expertapprove\" data-posturl=\"";
        // line 216
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("expert_approve"), "html", null, true);
        echo "\" class=\"btn btn-success btn-lg\" style=\"width: 100%;\"></span>Approve Expert</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.modal-content --> 
            </div>
            <!-- /.modal-dialog --> 
        </div>

        <div class=\"modal fade\" id=\"expertrejectmodal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header text-center\">
                        <h4 class=\"modal-title w-100 font-weight-bold\">Are you sure to reject the expert ?</h4>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                    <div class=\"modal-body\">
                        <form>
                            <div class=\"form-group row\">
                                <label for=\"expertName\" class=\"col-sm-4 col-form-label\">Name:</label>
                                <div class=\"col-sm-8\">
                                    <input type=\"text\" class=\"form-control-plaintext\" name=\"expertName\" id=\"expertName\" value=\"";
        // line 241
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "FirstName", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "LastName", array()), "html", null, true);
        echo "\" readonly>
                                </div>
                            </div>

                            <div class=\"form-group row\">

                                <label for=\"expertName\" class=\"col-sm-10 col-form-label\">Explanation for expert:</label>

                                <div class=\"col-lg-12\">
                                    <textarea class=\"form-control rounded-0\" type=\"text\" name=\"rejectexplanation\" id=\"rejectexplanation\" value=\"\"></textarea>
                                </div>
                            </div>

                            <input type=\"hidden\" id=\"expertID\" name=\"custId\" value=";
        // line 254
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Id", array()), "html", null, true);
        echo ">
                            <div class=\"modal-footer \">
                                <button type=\"button\" id=\"expertreject\" class=\"btn btn-danger btn-lg\" data-posturl=\"";
        // line 256
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("expert_reject"), "html", null, true);
        echo "\" style=\"width: 100%;\"></span>Reject Expert</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.modal-content --> 
            </div>
            <!-- /.modal-dialog --> 
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js\" integrity=\"sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49\" crossorigin=\"anonymous\"></script>
        <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js\" integrity=\"sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy\" crossorigin=\"anonymous\"></script>

        <script>
            \$(document).ready(function () {


                \$(\"#expertapprove\").click(function () {

                    var expertId = \"";
        // line 279
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Id", array()), "html", null, true);
        echo "\";
                    var token = getUrlParameter('t');

                    if (\$('#expertnotapprovable').length) {
                        alert('Please handle the items which are not approved first!');
                        return false;
                    }

                    var postUrl = \$(this).data('posturl');

                    if (
                            String(token).trim() == '' ||
                            String(expertId).trim() == '') {
                        alert('Something went wrong! No data has been saved. Please contact the IT Support!');
                        return false;
                    } else {
                        \$.ajax({
                            type: 'PUT',
                            headers: {
                                'Token-Authorization-X': `Bearer \${token}`,
                            },
                            url: postUrl,
                            data: 'id=' + expertId,
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
                    }
                });


                \$(\"#expertreject\").click(function () {

                    var expertId = \"";
        // line 321
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Id", array()), "html", null, true);
        echo "\";
                    var token = getUrlParameter('t');

                    var explanation = \$(this).parent().parent().find('#rejectexplanation').val();

                    var postUrl = \$(this).data('posturl');

                    if (
                            String(token).trim() == '' ||
                            String(expertId).trim() == '')
                    {
                        alert('Something went wrong! No data has been saved. Please contact the IT Support!');
                        return false;
                    } else {
                        \$.ajax({
                            type: 'DELETE',
                            headers: {
                                'Token-Authorization-X': `Bearer \${token}`,
                            },
                            url: postUrl,
                            data: 'id=' + expertId + '&explanation=' + encodeURIComponent(explanation),
                            beforeSend: function () {
                                \$('.submitBtn').attr(\"disabled\", \"disabled\");
                                \$('.modal-body').css('opacity', '.5');
                            }
                        })
                                .done(function (data) {
                                    window.location.href = \"/\";
                                })
                                .fail(function (errMsg) {
                                    alert('Apologies, an error occurred. Please try again or contact info@cryoconnect.net.');
                                    \$('.submitBtn').removeAttr(\"disabled\");
                                    \$('.modal-body').css('opacity', '');
                                });
                    }
                });

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







    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "experts/expert-approval.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  552 => 321,  507 => 279,  481 => 256,  476 => 254,  458 => 241,  430 => 216,  425 => 214,  416 => 210,  397 => 193,  394 => 191,  384 => 183,  382 => 182,  373 => 175,  362 => 173,  358 => 172,  348 => 164,  342 => 163,  334 => 161,  331 => 160,  327 => 159,  317 => 151,  311 => 150,  303 => 148,  300 => 147,  296 => 146,  286 => 138,  275 => 136,  271 => 135,  260 => 126,  254 => 125,  246 => 123,  243 => 122,  239 => 121,  228 => 112,  222 => 111,  214 => 109,  211 => 108,  207 => 107,  197 => 99,  188 => 97,  184 => 96,  168 => 87,  158 => 79,  149 => 77,  145 => 76,  133 => 66,  124 => 64,  120 => 63,  109 => 55,  102 => 51,  97 => 48,  93 => 46,  91 => 45,  88 => 44,  86 => 43,  83 => 42,  81 => 41,  74 => 37,  67 => 33,  60 => 29,  53 => 24,  49 => 22,  43 => 18,  41 => 17,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "experts/expert-approval.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/experts/expert-approval.html.twig");
    }
}
