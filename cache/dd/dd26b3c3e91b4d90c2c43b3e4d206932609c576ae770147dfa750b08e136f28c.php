<?php

/* information-seekers/fieldwork-connect-approval.html.twig */
class __TwigTemplate_ab9d442cbaa9275cfd6a9f7a07235fe97b80f9b620c6ad8f6282f0fbbe021fb2 extends Twig_Template
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
        <title>Expedition Approval Page</title>
    </head>
    <body>
        <table class=\"table table-bordered table-hover\">
            <thead>
                <tr>
                    <th scope=\"col\">New Expedition Information Seeker Request</th>
                        ";
        // line 17
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "Approved", array()) == false)) {
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
                    <th scope=\"row\">Information seeker name</th>
                    <td>";
        // line 29
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerName", array());
        echo "</td>
                </tr>

                <tr>
                    <th scope=\"row\">Information seeker email</th>
                    <td colspan=\"2\">";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerEmail", array()), "html", null, true);
        echo "</td>
                </tr>

                <tr>
                    <th scope=\"row\">Information seeker website</th>
                    <td colspan=\"2\"><a href=\"";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerWebsite", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerWebsite", array()), "html", null, true);
        echo "</a></td>
                </tr>

                <tr>
                    <th scope=\"row\">Information seeker affiliation</th>
                    <td colspan=\"2\">";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerAffiliation", array()), "html", null, true);
        echo "</td>
                </tr>


                <tr>
                    <th scope=\"row\">Information seeker affiliation website</th>
                    <td colspan=\"2\"><a href=\"";
        // line 50
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerAffiliationWebsite", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerAffiliationWebsite", array()), "html", null, true);
        echo "</td>
                </tr>

                <tr>
                    <th scope=\"row\">Request reason(s)</th>
                    <td colspan=\"2\">";
        // line 55
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerReasons", array());
        echo "</td>
                </tr>
                
                <tr>
                    <th scope=\"row\">Number of spots requested</th>
                    <td colspan=\"2\">";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerRequestedSpots", array()), "html", null, true);
        echo "</td>
                </tr>

                <tr>
                    <th scope=\"row\">Requested expedition(s)</th>
                    <td colspan=\"10\">
                        <ul class=\"list-group list-group-flush\">
                            ";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "fieldworks", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["fieldwork"]) {
            // line 68
            echo "                                <li class=\"list-group-item\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "Fieldwork", array()), "Id", array()), "html", null, true);
            echo " - ";
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "Fieldwork", array()), "FieldworkName", array());
            echo " - leader : ";
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "Fieldwork", array()), "FieldworkLeaderName", array());
            echo " - start date : ";
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["fieldwork"], "Fieldwork", array()), "FieldworkStartDate", array()), 0, 10), "html", null, true);
            echo "</li>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fieldwork'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "                        </ul>
                    </td>
                </tr>

            </tbody>
        </table>
        ";
        // line 76
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "Approved", array()) == false)) {
            // line 77
            echo "            <div class=\"col-md text-center\"> 

                <button type=\"button\" class=\"fieldwork_information_seeker-approve btn btn-success btn-lg\" data-toggle=\"modal\" data-target=\"#fieldwork_information_seeker_approve_modal\">Approve Request</button>

                <button type=\"button\" class=\"fieldwork_information_seeker-reject btn btn-danger btn-lg\" data-toggle=\"modal\" data-target=\"#fieldwork_information_seeker_reject_modal\">Reject Request</button>

            </div>
        ";
        }
        // line 85
        echo "        <script>
            ";
        // line 87
        echo "        </script>


        <div class=\"modal fade\" id=\"fieldwork_information_seeker_approve_modal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header text-center\">
                        <h4 class=\"modal-title w-100 font-weight-bold\">Are you sure to approve this request ?</h4>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                    <div class=\"modal-body\">
                        <form>
                            <div class=\"form-group row\">
                                <label for=\"fieldwork_information_seeker_name\" class=\"col-sm-2 col-form-label\">Name:</label>
                                <div class=\"col-sm-10\">
                                    <input type=\"text\" class=\"form-control-plaintext\" name=\"fieldwork_information_seeker_name\" id=\"fieldwork_information_seeker_name\" value=\"";
        // line 104
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerName", array()), "html", null, true);
        echo "\" readonly>
                                </div>
                            </div>

                            <input type=\"hidden\" id=\"fieldwork_information_seeker_id\" name=\"custId\" value=";
        // line 108
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "Id", array()), "html", null, true);
        echo ">
                            <div class=\"modal-footer \">
                                <button type=\"button\" id=\"fieldwork_information_seeker_approve\" data-posturl=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_information_seeker_approve"), "html", null, true);
        echo "\" class=\"btn btn-success btn-lg\" style=\"width: 100%;\"></span>Approve Request</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.modal-content --> 
            </div>
            <!-- /.modal-dialog --> 
        </div>

        <div class=\"modal fade\" id=\"fieldwork_information_seeker_reject_modal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header text-center\">
                        <h4 class=\"modal-title w-100 font-weight-bold\">Are you sure to reject the request ?</h4>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                    <div class=\"modal-body\">
                        <form>
                            <div class=\"form-group row\">
                                <label for=\"fieldwork_information_seeker_name\" class=\"col-sm-4 col-form-label\">Name:</label>
                                <div class=\"col-sm-8\">
                                    <input type=\"text\" class=\"form-control-plaintext\" name=\"fieldwork_information_seeker_name\" id=\"fieldwork_information_seeker_name\" value=\"";
        // line 135
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "InformationSeekerName", array()), "html", null, true);
        echo "\" readonly>
                                </div>
                            </div>

                            <div class=\"form-group row\">

                                <label for=\"rejectexplanation\" class=\"col-sm-10 col-form-label\">Explanation for rejection:</label>

                                <div class=\"col-lg-12\">
                                    <textarea class=\"form-control rounded-0\" type=\"text\" name=\"rejectexplanation\" id=\"rejectexplanation\" value=\"\"></textarea>
                                </div>
                            </div>

                            <input type=\"hidden\" id=\"fieldwork_information_seeker_id\" name=\"custId\" value=";
        // line 148
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "Id", array()), "html", null, true);
        echo ">
                            <div class=\"modal-footer \">
                                <button type=\"button\" id=\"fieldwork_information_seeker_reject\" class=\"btn btn-danger btn-lg\" data-posturl=\"";
        // line 150
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_information_seeker_reject"), "html", null, true);
        echo "\" style=\"width: 100%;\"></span>Reject Expedition</button>
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


                \$(\"#fieldwork_information_seeker_approve\").click(function () {

                    var fieldworkInformationSeekerId = \"";
        // line 173
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "Id", array()), "html", null, true);
        echo "\";
                    var token = getUrlParameter('t');

                    var postUrl = \$(this).data('posturl');

                    if (
                            String(token).trim() == '' ||
                            String(fieldworkInformationSeekerId).trim() == '') {
                        alert('Something went wrong! No data has been saved. Please contact the IT Support!');
                        return false;
                    } else {
                        \$.ajax({
                            type: 'PUT',
                            headers: {
                                'Token-Authorization-X': `Bearer \${token}`,
                            },
                            url: postUrl,
                            data: 'id=' + fieldworkInformationSeekerId,
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


                \$(\"#fieldwork_information_seeker_reject\").click(function () {

                    var fieldworkInformationSeekerId = \"";
        // line 210
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "fieldwork_information_seeker", array()), "Id", array()), "html", null, true);
        echo "\";
                    var token = getUrlParameter('t');

                    var explanation = \$(this).parent().parent().find('#rejectexplanation').val();

                    var postUrl = \$(this).data('posturl');

                    if (
                            String(token).trim() == '' ||
                            String(fieldworkInformationSeekerId).trim() == '')
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
                            data: 'id=' + fieldworkInformationSeekerId + '&explanation=' + encodeURIComponent(explanation),
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
        return "information-seekers/fieldwork-connect-approval.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  311 => 210,  271 => 173,  245 => 150,  240 => 148,  224 => 135,  196 => 110,  191 => 108,  184 => 104,  165 => 87,  162 => 85,  152 => 77,  150 => 76,  142 => 70,  127 => 68,  123 => 67,  113 => 60,  105 => 55,  95 => 50,  86 => 44,  76 => 39,  68 => 34,  60 => 29,  53 => 24,  49 => 22,  43 => 18,  41 => 17,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "information-seekers/fieldwork-connect-approval.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/information-seekers/fieldwork-connect-approval.html.twig");
    }
}
