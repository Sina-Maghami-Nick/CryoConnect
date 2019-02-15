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
                text-align: left;
                display: inline-block;
                vertical-align: middle;
                width: 20em;
                margin: 0 1em 0 0;
            }

            .success-button {
                background: rgb(28, 184, 65);
                color: white;
                border-radius: 5px;
                margin-top: 2px;
            }

            hr.hrform {
                border-top: 3px double #8c8b8b;
                width: 700px;
            }



        </style>
    </head>
    <body>
        <div id=\"formpage\" style=\"text-align:centre\">
            <form class=\"pure-form pure-form-aligned\" id=\"expertform\" action=";
        // line 38
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("expert_signup"), "html", null, true);
        echo " method=\"post\">
                <fieldset>

                    <div class=\"pure-control-group\">
                        <label for=\"firstName\">First name<font color=\"red\">*</font></label>
                        <input name=\"first_name\" id=\"firstName\" type=\"text\" placeholder=\"First name\" required>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"lastName\">Last name<font color=\"red\">*</font></label>
                        <input name=\"last_name\" id=\"lastName\" type=\"text\" placeholder=\"Last name\" required>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"affiliation\">Affiliations (name<font color=\"red\">*</font>, country<font color=\"red\">*</font>, city, secondary affliations) </label>
                        <div class=\"pure-u\">
                            <input name=\"affiliation[primary][name]\" id=\"affiliation\" type=\"text\" placeholder=\"name of primary affiliation\" required>
                            <br>
                            <select name=\"affiliation[primary][country]\" id=\"primaryaffiliationcountry\" required>
                                <option disabled selected value> choose </option>
                                ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "countries", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 59
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
        // line 61
        echo "                            </select>
                            <br>
                            <input name=\"affiliation[primary][city]\" id=\"primaryaffiliationcity\" type=\"text\" placeholder=\"city of primary affiliation\">
                            <br>
                            <input name=\"affiliation[secondary][0]\" class=\"secondaryaffiliations\" type=\"text\" placeholder=\"other affiliation\">
                            <br>
                            <button type=\"button\" id=\"addaffiliation\" class=\"pure-button success-button\">add affiliation</button>
                        </div>
                    </div>


                    <div class=\"pure-control-group\">
                        <label for=\"careerstage\">Career stage<font color=\"red\">*</font></label>
                        <select name=\"caree_stage\" id=\"careerstage\" required>
                            <option disabled selected value> choose </option>
                            ";
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "career_stages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["career_stages"]) {
            // line 77
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
        // line 79
        echo "                        </select>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"birtyear\">When is your birth year?<font color=\"red\">*</font></label>
                        <input name=\"birth_year\" id=\"birtyear\" type=\"number\" placeholder=\"birt year\" required>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"gender\">Gender<font color=\"red\">*</font></label>
                        <select name=\"gender\" style=\"width: 13em\" required>
                            <option disabled selected value>choose</option>
                            <option value=\"F\">female</option>
                            <option value=\"M\">male</option>
                            <option value=\"O\">other</option>
                        </select>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"languages\">Languages in which you are capable of answering scientific questions<font color=\"red\">*</font></label>
                        <div class=\"pure-u\" id=\"languages\">
                            <select name=\"languages[0]\" style=\"width: 13em\" required>
                                <option disabled selected value>choose</option>
                                ";
        // line 102
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "languages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 103
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
        // line 105
        echo "                            </select>
                            <br>
                            <button type=\"button\" id=\"addlanguage\" class=\"pure-button success-button\">add language </button>
                        </div>
                    </div>  

                    <div class=\"pure-control-group\">
                        <label for=\"phonenumber\">Phone number (incl. country code)<font color=\"red\">*</font></label>
                        <input name=\"phone_number\" id=\"phonenumber\" type=\"tel\" placeholder=\"number with country code\">
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"personalwebsite\">Personal website</label>
                        <input name=\"personal_website\" id=\"personalwebsite\" type=\"url\" placeholder=\"website\">
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"personallinkedin\">LinkedIn</label>
                        <input name=\"personal_linkedin\" id=\"personallinkedin\" type=\"url\" placeholder=\"linkedIn\">
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"personalgooglescholar\">Google Scholar profile</label>
                        <input name=\"personal_google_scholar\" id=\"personalgooglescholar\" type=\"url\" placeholder=\"google scholar\">
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"email\">Email address<font color=\"red\">*</font></label>
                        <input name=\"email\" id=\"email\" type=\"email\" placeholder=\"Email address\" required>
                    </div>

                    <hr class=\"hrform\">

                    <div class=\"pure-control-group\">
                        <label for=\"cryosphere_what\">Which parts of the cryosphere are you comfortable answering questions about?<font color=\"red\">*</font> </label>
                        <div class=\"pure-u\" id=\"cryosphere_what\">
                            ";
        // line 141
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_what", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_what"]) {
            // line 142
            echo "
                                <input name=\"cryosphere_what[";
            // line 143
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "CryosphereWhatName", array()), "html", null, true);
            echo "]\" class=\"cryosphere_what\" type=\"checkbox\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "Id", array()), "html", null, true);
            echo "\" required > ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "CryosphereWhatName", array()), "html", null, true);
            echo "</input>
                                <br>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_what'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 146
        echo "                        </div>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"cryosphere_where\">In which general region(s) have you studied the cryosphere?<font color=\"red\">*</font></label>
                        <div class=\"pure-u\" id=\"cryosphere_where\">
                            ";
        // line 152
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_where", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_where"]) {
            // line 153
            echo "                                <input name=\"cryosphere_where[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cryosphere_what"] ?? null), "CryosphereWhereName", array()), "html", null, true);
            echo "]\" type=\"checkbox\" class=\"cryosphere_where\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "Id", array()), "html", null, true);
            echo "\" required >";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "CryosphereWhereName", array()), "html", null, true);
            echo "</input>
                                <br>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_where'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 156
        echo "                        </div>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"cryosphere_what_specefic\">Which processes & subdisciplines are you comfortable answering questions about?<font color=\"red\">*</font></label>
                        <div class=\"pure-u\" id=\"cryosphere_what_specefic\">
                            ";
        // line 162
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_what_specefic", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_what_specefic"]) {
            // line 163
            echo "                                <input name=\"cryosphere_what_specefic[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "CryosphereWhatSpeceficName", array()), "html", null, true);
            echo "]\" class=\"cryosphere_what_specefic\" type=\"checkbox\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "Id", array()), "html", null, true);
            echo "\" required >";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "CryosphereWhatSpeceficName", array()), "html", null, true);
            echo "</input>
                                <br>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_what_specefic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 166
        echo "                        </div>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"cryosphere_method\">Which methods are you comfortable answering questions about?<font color=\"red\">*</font></label>
                        <div class=\"pure-u\" id=\"cryosphere_method\">
                            ";
        // line 172
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_methods", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_method"]) {
            // line 173
            echo "                                <input name=\"cryosphere_method[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "CryosphereMethodsName", array()), "html", null, true);
            echo "]\" type=\"checkbox\" class=\"cryosphere_method\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "Id", array()), "html", null, true);
            echo "\" required >";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "CryosphereMethodsName", array()), "html", null, true);
            echo "</input>
                                <br>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 176
        echo "                        </div>
                    </div>

                    <div class=\"pure-control-group\">
                        <label for=\"cryosphere_when\">Which time periods are you comfortable answering questions about?<font color=\"red\">*</font></label>
                        <div class=\"pure-u\" id=\"cryosphere_when\">
                            ";
        // line 182
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_when", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_when"]) {
            // line 183
            echo "                                <input name=\"cryosphere_when[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "CryosphereWhatName", array()), "html", null, true);
            echo "]\" type=\"checkbox\" class=\"cryosphere_when\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "Id", array()), "html", null, true);
            echo "\" required >";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "CryosphereWhenName", array()), "html", null, true);
            echo "</input>
                                <br>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_when'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 186
        echo "                        </div>
                    </div>



                    <div class=\"pure-controls\">
                        <label for=\"termcondition\" class=\"pure-checkbox\">
                            <input id=\"termcondition\" type=\"checkbox\" required> I agree to the terms and conditions
                        </label>

                        <button type=\"submit\" id=\"submitBtn\" class=\"pure-button pure-button-primary\">Sign up</button>
                    </div>
                    <span class=\"pure-form-message-inline\"><font color=\"red\">*</font>required fields</span>
                </fieldset>
            </form>
        </div>


        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>

        <script>
            document.addEventListener(\"DOMContentLoaded\", function () {
                var elements = \$(\"input:checkbox\");
                for (var i = 0; i < elements.length; i++) {
                    if (elements[i].id != \"termcondition\") {
                        elements[i].oninvalid = function (e) {
                            e.target.setCustomValidity(\"\");
                            if (!e.target.validity.valid) {
                                e.target.setCustomValidity(\"Please select one or more options.\");
                            }
                        };
                        elements[i].oninput = function (e) {
                            e.target.setCustomValidity(\"\");
                        };
                    }
                }
            });

            document.getElementById(\"email\").addEventListener(\"focusout\", function () {
                var email = \$(this).val();
                \$.ajax({
                    type: 'POST',
                    url: \"";
        // line 228
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("expert_check_email"), "html", null, true);
        echo "\",
                    data: 'email=' + encodeURIComponent(email),
                    beforeSend: function () {
                    }
                })
                        .done(function (data) {
                            \$('#email')[0].setCustomValidity(\"This email address is already registered!\");
                            \$('#submitBtn').focus()
                        })
                        .fail(function (errMsg) {
                            \$('#email')[0].setCustomValidity(\"\");
                        });
            });

            \$('#email').on('click', function () {
                this.setCustomValidity(\"\");
            });


            \$(document).ready(function () {

                parent._alert = new parent.Function(\"alert(arguments[0]);\");

                \$(\"#addlanguage\").click(function () {

                    var selectCount = \$(this).parent().find(\"select\").length;
                    var selectObj = \$(this).parent().find(\"select\").first().clone();
                    selectObj.attr('name', 'languages[' + selectCount + ']');
                    selectObj.selectedIndex = 0;
                    selectObj.prop('required', false);
                    selectObj.insertBefore(\$(this));
                    \$('<br />').insertBefore(\$(this));
                });

                \$(\"#addaffiliation\").click(function () {

                    var selectCount = \$(this).parent().find(\".secondaryaffiliations\").length;
                    var selectObj = \$(this).parent().find(\".secondaryaffiliations\").first().clone();
                    selectObj.attr('name', 'affiliation[secondary][' + selectCount + ']');
                    selectObj.val(null);
                    selectObj.insertBefore(\$(this));
                    \$('<br />').insertBefore(\$(this));
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
                                document.body.innerHTML = data;
                            })
                            .fail(function (errMsg) {
                                \$('#submitBtn').removeAttr(\"disabled\");
                                parent._alert(\"Something has gone wrong! Please check your enteries and try again. If error persists, please contact us. Thank you\");
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
        return array (  378 => 228,  334 => 186,  320 => 183,  316 => 182,  308 => 176,  294 => 173,  290 => 172,  282 => 166,  268 => 163,  264 => 162,  256 => 156,  242 => 153,  238 => 152,  230 => 146,  217 => 143,  214 => 142,  210 => 141,  172 => 105,  161 => 103,  157 => 102,  132 => 79,  121 => 77,  117 => 76,  100 => 61,  89 => 59,  85 => 58,  62 => 38,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "experts-signup.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/experts-signup.html.twig");
    }
}
