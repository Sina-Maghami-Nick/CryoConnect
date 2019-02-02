<?php

/* experts-signup.html.twig */
class __TwigTemplate_104cff0095c3c3c7aa26fe9c91876368807224faa66bb852f5d645ca1aaa5b53 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>Experts Sign-up</title>
        <link rel=\"stylesheet\" href=\"https://unpkg.com/purecss@1.0.0/build/pure-min.css\" integrity=\"sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w\" crossorigin=\"anonymous\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <link rel=\"stylesheet\" href=\"https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css\">



        <style>
            .pure-form-aligned .pure-control-group label {
                text-align: right;
                display: inline-block;
                vertical-align: middle;
                width: 20em;
                margin: 0 1em 0 0;
            }

            .success-button {
                background: rgb(28, 184, 65);
                color: white;
                border-radius: 0px;
            }



        </style>
    </head>
    <body>
        <div id=\"formpage\" style=\"text-align:centre\">
            <form class=\"pure-form pure-form-aligned\" id=\"expertform\" action=";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("expert_signup"), "html", null, true);
        echo " method=\"post\">
                <fieldset>
                    <div class=\"pure-control-group\">
                        <label for=\"cryosphere_what\">Which parts of the cryosphere are you comfortable answering questions about?* </label>
                        <div class=\"pure-u\" id=\"cryosphere_what\">
                            ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_what", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_what"]) {
            // line 38
            echo "
                                <input name=\"cryosphere_what[";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "CryosphereWhatName", array()), "html", null, true);
            echo "]\" class=\"cryosphere_what\" type=\"checkbox\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "Id", array()), "html", null, true);
            echo "\" required>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "CryosphereWhatName", array()), "html", null, true);
            echo "</input>
                                <br>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_what'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "                        </div>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"cryosphere_where\">In which general region(s) have you studied the cryosphere?<font color=\"red\">*</font></label>
                        <div class=\"pure-u\" id=\"cryosphere_where\">
                            ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_where", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_where"]) {
            // line 49
            echo "                                <input name=\"cryosphere_where[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cryosphere_what"] ?? null), "CryosphereWhereName", array()), "html", null, true);
            echo "]\" type=\"checkbox\" class=\"cryosphere_where\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "Id", array()), "html", null, true);
            echo "\" required>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "CryosphereWhereName", array()), "html", null, true);
            echo "</input>
                                <br>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_where'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "                        </div>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"cryosphere_what_specefic\">Which processes & subdisciplines are you comfortable answering questions about?<font color=\"red\">*</font></label>
                        <div class=\"pure-u\" id=\"cryosphere_what_specefic\">
                            ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_what_specefic", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_what_specefic"]) {
            // line 59
            echo "                                <input name=\"cryosphere_what_specefic[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "CryosphereWhatSpeceficName", array()), "html", null, true);
            echo "]\" class=\"cryosphere_what_specefic\" type=\"checkbox\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "Id", array()), "html", null, true);
            echo "\" required>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "CryosphereWhatSpeceficName", array()), "html", null, true);
            echo "</input>
                                <br>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_what_specefic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "                        </div>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"cryosphere_method\">Which methods are you comfortable answering questions about?</label>
                        <div class=\"pure-u\" id=\"cryosphere_method\">
                            ";
        // line 68
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_methods", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_method"]) {
            // line 69
            echo "                                <input name=\"cryosphere_method[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "CryosphereMethodsName", array()), "html", null, true);
            echo "]\" type=\"checkbox\" class=\"cryosphere_method\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "Id", array()), "html", null, true);
            echo "\" required>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "CryosphereMethodsName", array()), "html", null, true);
            echo "</input>
                                <br>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "                        </div>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"cryosphere_when\">Which time periods are you comfortable answering questions about?<font color=\"red\">*</font></label>
                        <div class=\"pure-u\" id=\"cryosphere_when\">
                            ";
        // line 78
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_when", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_when"]) {
            // line 79
            echo "                                <input name=\"cryosphere_when[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "CryosphereWhatName", array()), "html", null, true);
            echo "]\" type=\"checkbox\" class=\"cryosphere_when\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "Id", array()), "html", null, true);
            echo "\" required>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "CryosphereWhenName", array()), "html", null, true);
            echo "</input>
                                <br>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_when'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "                        </div>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"languages\">Languages in which you are capable of answering scientific questions<font color=\"red\">*</font></label>
                        <div class=\"pure-u\" id=\"languages\">
                            <select name=\"languages[1]\" style=\"width: 13em\" required>
                                <option disabled selected value>Choose 1st language </option>
                                ";
        // line 90
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "languages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 91
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "LanguageCode", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "Language", array()), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "                            </select>
                            <br>
                            <select name=\"languages[2]\" style=\"width: 13em\">
                                <option disabled selected value>Choose 2nd language </option>
                                ";
        // line 97
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "languages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 98
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "LanguageCode", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "Language", array()), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 100
        echo "                            </select>
                            <br>
                            <select name=\"languages[3]\" style=\"width: 13em\">
                                <option disabled selected value>Choose 3rd language </option>
                                ";
        // line 104
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "languages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 105
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "LanguageCode", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "Language", array()), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 107
        echo "                            </select>
                        </div>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"birtyear\">When is your birth year?<font color=\"red\">*</font></label>
                        <input name=\"birth_year\" id=\"birtyear\" type=\"number\" placeholder=\"birt year\" required>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"careerstage\">Career stage<font color=\"red\">*</font></label>
                        <select name=\"caree_stage\" id=\"careerstage\" required>
                            <option disabled selected value> Choose </option>
                            ";
        // line 120
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "career_stages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["career_stages"]) {
            // line 121
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["career_stages"], "Id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["career_stages"], "CareerStageName", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['career_stages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 123
        echo "                        </select>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"affiliation\">Affiliations (name<font color=\"red\">*</font>, country<font color=\"red\">*</font>, city, secondry affliations) </label>
                        <div class=\"pure-u\">
                            <input name=\"affiliation[primary][name]\" id=\"affiliation\" type=\"text\" placeholder=\"name of primary affiliation\" required>
                            <br>
                            <select name=\"affiliation[primary][country]\" id=\"primaryaffiliationcountry\" required>
                                <option disabled selected value> Choose </option>
                                ";
        // line 133
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "countries", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 134
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["country"], "CountryCode", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["country"], "CountryName", array()), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 136
        echo "                            </select>
                            <br>
                            <input name=\"affiliation[primary][city]\" id=\"primaryaffiliationcity\" type=\"text\" placeholder=\"city of primary affiliation\">
                            <br>
                            <input name=\"affiliation[secondry][name]\" id=\"secondryaffiliations\" type=\"text\" placeholder=\"other affiliation (seperated by comma)\">
                        </div>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"phonenumber\">Phone number (incl. country code)<font color=\"red\">*</font></label>
                        <input name=\"phone_number\" id=\"phonenumber\" type=\"tel\" placeholder=\"number with country code\">
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"personalwebsite\">Personal Website</label>
                        <input name=\"personal_website\" id=\"personalwebsite\" type=\"url\" placeholder=\"website\">
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"personallinkedin\">Linkedin</label>
                        <input name=\"personal_linkedin\" id=\"personallinkedin\" type=\"url\" placeholder=\"linkedin\">
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"personalgooglescholar\">Google Scholar profile</label>
                        <input name=\"personal_google_scholar\" id=\"personalgooglescholar\" type=\"url\" placeholder=\"google scholar\">
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"email\">Email Address</label>
                        <input name=\"email\" id=\"email\" type=\"email\" placeholder=\"Email Address\" required>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"firstName\">First Name<font color=\"red\">*</font></label>
                        <input name=\"first_name\" id=\"firstName\" type=\"text\" placeholder=\"First Name\" required>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"lastName\">Last Name<font color=\"red\">*</font></label>
                        <input name=\"last_name\" id=\"lastName\" type=\"text\" placeholder=\"Last Name\" required>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"gender\">Gender<font color=\"red\">*</font></label>
                        <select name=\"gender\" style=\"width: 13em\" required>
                            <option disabled selected value>Choose</option>
                            <option value=\"F\">female</option>
                            <option value=\"M\">male</option>
                            <option value=\"O\">other</option>
                        </select>
                    </div>

                    <div class=\"pure-controls\">
                        <label for=\"cb\" class=\"pure-checkbox\">
                            <input id=\"cb\" type=\"checkbox\" required> I agree to the terms and conditions
                        </label>

                        <button type=\"submit\" id=\"submitBtn\" class=\"pure-button pure-button-primary\">Sign up</button>
                    </div>
                    <span class=\"pure-form-message-inline\"><font color=\"red\">*</font>required fields</span>
                </fieldset>
            </form>
        </div>


        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/modal.js\"></script>
        <script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.js\"></script> 
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.css\"> 
        <style>
            .modal-open {
                overflow: hidden;
            }

            body.modal-open,
            .modal-open .navbar-fixed-top,
            .modal-open .navbar-fixed-bottom {
                margin-right: 15px;
            }

            .modal {
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 1040;
                display: none;
                overflow: auto;
                overflow-y: scroll;
            }

            .modal.fade .modal-dialog {
                -webkit-transform: translate(0, -25%);
                -ms-transform: translate(0, -25%);
                transform: translate(0, -25%);
                -webkit-transition: -webkit-transform 0.3s ease-out;
                -moz-transition: -moz-transform 0.3s ease-out;
                -o-transition: -o-transform 0.3s ease-out;
                transition: transform 0.3s ease-out;
            }

            .modal.in .modal-dialog {
                -webkit-transform: translate(0, 0);
                -ms-transform: translate(0, 0);
                transform: translate(0, 0);
            }

            .modal-dialog {
                z-index: 1050;
                width: auto;
                padding: 10px;
                margin-right: auto;
                margin-left: auto;
            }

            .modal-content {
                position: relative;
                background-color: #ffffff;
                border: 1px solid #999999;
                border: 1px solid rgba(0, 0, 0, 0.2);
                border-radius: 6px;
                outline: none;
                -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
                box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
                background-clip: padding-box;
            }

            .modal-backdrop {
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 1030;
                background-color: #000000;
            }

            .modal-backdrop.fade {
                opacity: 0;
                filter: alpha(opacity=0);
            }

            .modal-backdrop.in {
                opacity: 0.5;
                filter: alpha(opacity=50);
            }

            .modal-header {
                min-height: 16.428571429px;
                padding: 15px;
                border-bottom: 1px solid #e5e5e5;
            }

            .modal-header .close {
                margin-top: -2px;
            }

            .modal-title {
                margin: 0;
                line-height: 1.428571429;
            }

            .modal-body {
                position: relative;
                padding: 20px;
            }

            .modal-footer {
                padding: 19px 20px 20px;
                margin-top: 15px;
                text-align: right;
                border-top: 1px solid #e5e5e5;
            }

            .modal-footer:before,
            .modal-footer:after {
                display: table;
                content: \" \";
            }

            .modal-footer:after {
                clear: both;
            }

            .modal-footer:before,
            .modal-footer:after {
                display: table;
                content: \" \";
            }

            .modal-footer:after {
                clear: both;
            }

            .modal-footer .btn + .btn {
                margin-bottom: 0;
                margin-left: 5px;
            }

            .modal-footer .btn-group .btn + .btn {
                margin-left: -1px;
            }

            .modal-footer .btn-block + .btn-block {
                margin-left: 0;
            }

            @media screen and (min-width: 768px) {
                .modal-dialog {
                    right: auto;
                    left: 50%;
                    width: 600px;
                    padding-top: 30px;
                    padding-bottom: 30px;
                }
                .modal-content {
                    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                }
            }


        </style>
        <script>
            \$(document).ready(function () {
                \$('#email').change(function () {
                    var email = \$(this).val();
                    \$.ajax({
                        type: 'POST',
                        url: \"";
        // line 367
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("expert_check_email"), "html", null, true);
        echo "\",
                        data: 'email=' + encodeURIComponent(email),
                        beforeSend: function () {
                            \$('#submitBtn').attr(\"disabled\", \"disabled\");
                        }
                    })
                            .done(function (data) {
                                \$('#submitBtn').attr(\"disabled\", \"disabled\");
                                alert(\"This email address is already registered!\");
                                \$('#submitBtn').focus()
                            })
                            .fail(function (errMsg) {
                                \$('#submitBtn').removeAttr(\"disabled\");
                            });
                });

                \$(\"#expertform\").submit(function (event) {

                    /* stop form from submitting normally */
                    event.preventDefault();

                    \$.ajax({
                        type: 'POST',
                        url: \$(this).attr('action'),
                        data: \$(this).serialize(),
                        beforeSend: function () {
                            \$('#submitBtn').attr(\"disabled\", \"disabled\");
                        }
                    })
                            .done(function (data) {
                                BootstrapDialog.show({
                                    title: \"You have been registered!\",
                                    message: function (dialogRef) {
                                        \$mydata = \$(\$.parseHTML(data));
                                        return \$mydata;
                                    },
                                    onshow: function (dialog) {



                                    },
                                    onshown: function (dialog)
                                    {
                                        // event after shown

                                    },
                                    onhide: function (dailog)
                                    {
                                        window.location.href = \"/\";
                                    }
                                });
                            })
                            .fail(function (errMsg) {
                                \$('#submitBtn').removeAttr(\"disabled\");
                                alert(\"Something has gone wrong! Please check your enteries and try again. If error presists, please contact us. Thank you\");
                            });

                });



                \$(document).find('.cryosphere_what').change(function () {
                    if (\$(document).find('.cryosphere_what').filter(':checked').length < 1) {
                        \$(document).find('.cryosphere_what').prop('required', true);
                    } else {
                        \$(document).find('.cryosphere_what').prop('required', false);
                    }
                });

                \$(document).find('.cryosphere_what_specefic').change(function () {
                    if (\$(document).find('.cryosphere_what_specefic').filter(':checked').length < 1) {
                        \$(document).find('.cryosphere_what_specefic').prop('required', true);
                    } else {
                        \$(document).find('.cryosphere_what_specefic').prop('required', false);
                    }
                });

                \$(document).find('.cryosphere_where').change(function () {
                    if (\$(document).find('.cryosphere_where').filter(':checked').length < 1) {
                        \$(document).find('.cryosphere_where').prop('required', true);
                    } else {
                        \$(document).find('.cryosphere_where').prop('required', false);
                    }
                });

                \$(document).find('.cryosphere_when').change(function () {
                    if (\$(document).find('.cryosphere_when').filter(':checked').length < 1) {
                        \$(document).find('.cryosphere_when').prop('required', true);
                    } else {
                        \$(document).find('.cryosphere_when').prop('required', false);
                    }
                });

                \$(document).find('.cryosphere_method').change(function () {
                    if (\$(document).find('.cryosphere_method').filter(':checked').length < 1) {
                        \$(document).find('.cryosphere_method').prop('required', true);
                    } else {
                        \$(document).find('.cryosphere_method').prop('required', false);
                    }
                });



            });


        </script>
    </div>
</body>

</html>
";
    }

    public function getTemplateName()
    {
        return "experts-signup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  545 => 367,  312 => 136,  301 => 134,  297 => 133,  285 => 123,  274 => 121,  270 => 120,  255 => 107,  244 => 105,  240 => 104,  234 => 100,  223 => 98,  219 => 97,  213 => 93,  202 => 91,  198 => 90,  188 => 82,  174 => 79,  170 => 78,  162 => 72,  148 => 69,  144 => 68,  136 => 62,  122 => 59,  118 => 58,  110 => 52,  96 => 49,  92 => 48,  84 => 42,  71 => 39,  68 => 38,  64 => 37,  56 => 32,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "experts-signup.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/experts-signup.html.twig");
    }
}
