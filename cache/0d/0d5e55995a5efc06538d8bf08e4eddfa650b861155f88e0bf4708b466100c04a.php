<?php

/* experts/experts-signup.html.twig */
class __TwigTemplate_f1c01f715a1cbae2b59adae19926f4ba88dbe889e6eb0dd7f9676130150c540d extends Twig_Template
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
        $context["macros"] = $this->loadTemplate("./macros/view-macros.html.twig", "experts/experts-signup.html.twig", 1);
        // line 2
        echo "<html>

    <head>
        <title>Experts registration</title>
        <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css\">
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
    </head>

    <body>
        <div class=\"row\">
            <form class=\"col s12\" id=\"expertform\" action=";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("expert_signup"), "html", null, true);
        echo " method=\"post\">

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"firstName\" name=\"first_name\" type=\"text\" class=\"validate\" required>
                        <label for=\"firstName\">First name<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"lastName\" name=\"last_name\" type=\"text\" class=\"validate\" required>
                        <label for=\"lastName\">Last name<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"affiliation\" name=\"affiliation[primary][name]\" type=\"text\" class=\"validate\" required>
                        <label for=\"affiliation\">Affiliation name<font color=\"red\">*</font></label>
                    </div>
                    <div class=\"input-field col s12\">
                        <select id=\"affiliation_country\" name=\"affiliation[primary][country]\" required>
                            <option value=\"\" disabled selected>choose</option>
                            ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "countries", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 39
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["country"], "CountryCode", array()), "html", null, true);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["country"], "CountryName", array());
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "                        </select>
                        <label for=\"affiliation_country\">Affiliation country<font color=\"red\">*</font></label>
                    </div>
                    <div class=\"input-field col s12\">
                        <input id=\"affiliation_city\" name=\"affiliation[primary][city]\" type=\"text\" class=\"validate\" required>
                        <label for=\"affiliation_city\">Affiliation city<font color=\"red\">*</font></label>
                    </div>
                    <div class=\"secondaryaffiliationdiv\">
                        <div class=\"input-field col s8\">
                            <input class=\"secondaryaffiliations\" name=\"affiliation[secondary][0]\" type=\"text\" class=\"validate\">
                            <label for=\"secondaryaffiliations\">Other affiliation</font></label>
                        </div>
                    </div>
                    <div class=\"input-field col s4\">
                        <a id=\"addaffiliation\" class=\"waves-effect waves-light btn\"><i class=\"material-icons left\">add</i>Add</a>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <select name=\"caree_stage\" id=\"careerstage\" required>
                            <option value=\"\" disabled selected>choose</option>
                            ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "career_stages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["career_stages"]) {
            // line 64
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["career_stages"], "Id", array()), "html", null, true);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["career_stages"], "CareerStageName", array());
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['career_stages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                        </select>
                        <label for=\"careerstage\">Career stage<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">             
                        <input name=\"birth_year\" id=\"birtyear\" type=\"number\" placeholder=\"birth year\" required>
                        <label for=\"birtyear\">When is your birth year?<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">    
                        <select name=\"gender\" required>
                            <option value=\"\" disabled selected>choose</option>
                            <option value=\"F\">female</option>
                            <option value=\"M\">male</option>
                            <option value=\"O\">other</option>
                        </select>
                        <label for=\"gender\">Gender<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">    
                        <select name=\"languages[]\" required multiple>
                            ";
        // line 93
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "languages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 94
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "LanguageCode", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "Language", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo "                        </select>
                        <label for=\"languages\">Languages in which you are capable of answering scientific questions<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\"> 
                        <input name=\"phone_number\" id=\"phonenumber\" type=\"tel\" placeholder=\"number with country code\">
                        <label for=\"phonenumber\">Phone number (incl. country code)<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">           
                        <input name=\"personal_website\" id=\"personalwebsite\" type=\"url\" placeholder=\"website\">
                        <label for=\"personalwebsite\">Personal website</label>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"input-field col s12\"> 
                        <input name=\"personal_linkedin\" id=\"personallinkedin\" type=\"url\" placeholder=\"linkedIn\">
                        <label for=\"personallinkedin\">LinkedIn</label>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"input-field col s12\"> 
                        <input name=\"personal_google_scholar\" id=\"personalgooglescholar\" type=\"url\" placeholder=\"google scholar\">
                        <label for=\"personalgooglescholar\">Google Scholar profile</label>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"input-field col s12\"> 
                        <input name=\"email\" id=\"email\" type=\"email\" placeholder=\"Email address\" required>
                        <label for=\"email\">Email address<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\" >    
                        <span id=\"cryosphere_what\"/>
                        <label for=\"cryosphere_what\">Which parts of the cryosphere are you comfortable answering questions about?<font color=\"red\">*</font> </label>
                        <br><br>
                        ";
        // line 138
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_what", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_what"]) {
            // line 139
            echo "                            <label>
                                <input name=\"cryosphere_what[";
            // line 140
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "CryosphereWhatName", array()), "html", null, true);
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "Id", array()), "html", null, true);
            echo "\" type=\"checkbox\" class=\"cryosphere_what\" required />
                                <span>";
            // line 141
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "CryosphereWhatName", array()), "html", null, true);
            echo "</span>
                            </label>
                            </br> 
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_what'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 145
        echo "                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\" >    
                        <span id=\"cryosphere_where\"/>
                        <label for=\"cryosphere_where\">In which general region(s) have you studied the cryosphere?<font color=\"red\">*</font> </label>
                        <br><br>
                        ";
        // line 153
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_where", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_where"]) {
            // line 154
            echo "
                            <label>
                                <input name=\"cryosphere_where[";
            // line 156
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "CryosphereWhereName", array()), "html", null, true);
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "Id", array()), "html", null, true);
            echo "\" type=\"checkbox\" class=\"cryosphere_where\" required />
                                <span>";
            // line 157
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "CryosphereWhereName", array()), "html", null, true);
            echo "</span>
                            </label>
                            </br>   
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_where'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        echo "                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\" >    
                        <span id=\"cryosphere_what_specefic\"/>
                        <label for=\"cryosphere_what_specefic\">Which processes & subdisciplines are you comfortable answering questions about?<font color=\"red\">*</font> </label>
                        <br><br>
                        ";
        // line 169
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_what_specefic", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_what_specefic"]) {
            // line 170
            echo "
                            <label>
                                <input name=\"cryosphere_what_specefic[";
            // line 172
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "CryosphereWhatSpeceficName", array()), "html", null, true);
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "Id", array()), "html", null, true);
            echo "\" type=\"checkbox\" class=\"cryosphere_what_specefic\" required />
                                <span>";
            // line 173
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "CryosphereWhatSpeceficName", array()), "html", null, true);
            echo "</span>
                            </label>
                            </br>   
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_what_specefic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 177
        echo "                    </div>
                </div>



                <div class=\"row\">
                    <div class=\"input-field col s12\" >    
                        <span id=\"cryosphere_method\"/>
                        <label for=\"cryosphere_method\">Which methods are you comfortable answering questions about?<font color=\"red\">*</font> </label>
                        <br><br>
                        ";
        // line 187
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_methods", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_method"]) {
            // line 188
            echo "                            <label>
                                <input name=\"cryosphere_method[";
            // line 189
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "CryosphereMethodsName", array()), "html", null, true);
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "Id", array()), "html", null, true);
            echo "\" type=\"checkbox\" class=\"cryosphere_method\" required />
                                <span>";
            // line 190
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "CryosphereMethodsName", array()), "html", null, true);
            echo "</span>
                            </label>
                            </br>   
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 194
        echo "                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\" >    
                        <span id=\"cryosphere_when\"/>
                        <label for=\"cryosphere_when\">Which time periods are you comfortable answering questions about?<font color=\"red\">*</font> </label>
                        <br><br>
                        ";
        // line 202
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_when", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_when"]) {
            // line 203
            echo "                            <label>
                                <input name=\"cryosphere_when[";
            // line 204
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "CryosphereWhenName", array()), "html", null, true);
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "Id", array()), "html", null, true);
            echo "\" type=\"checkbox\" class=\"cryosphere_when\" required />
                                <span>";
            // line 205
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "CryosphereWhenName", array()), "html", null, true);
            echo "</span>
                            </label>
                            </br>   
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_when'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 209
        echo "                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <label>
                            <input id=\"termcondition\" type=\"checkbox\" class=\"filled-in\" required/>
                            <span>I agree to the terms and conditions<font color=\"red\">*</font></span>
                        </label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <p class=\"center-align\">
                            <button id=\"submitBtn\" class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Sign up
                                <i class=\"material-icons right\">send</i>
                            </button>
                        </p>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <span class=\"pure-form-message-inline\"><font color=\"red\">*</font>required fields</span>
                    </div>
                </div>


            </form>
        </div>



        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js\"></script>
        <script src=\"https://cdn.jsdelivr.net/npm/flatpickr\"></script>
        ";
        // line 245
        echo $context["macros"]->macro_recaptchaLoad();
        echo "
        <script>
            document.addEventListener(\"DOMContentLoaded\", function () {

                //to initialize materelize forms
                \$('select').formSelect();


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
        // line 273
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
                
                ";
        // line 294
        echo $context["macros"]->macro_recaptchaExecute();
        echo "


                \$(\"#addaffiliation\").click(function () {

                    var selectCount = \$(this).parent().parent().find(\".secondaryaffiliationdiv\").length;
                    var selectObj = \$(this).parent().parent().find(\".secondaryaffiliationdiv\").first().clone();
                    selectObj.children().first().find(\".secondaryaffiliations\").attr('name', 'affiliation[secondary][' + selectCount + ']');
                    selectObj.children().first().find(\".secondaryaffiliations\").val(null);
                    selectObj.insertBefore(\$(this).parent());

                });



                \$(\"#expertform\").submit(function (event) {

                    /* stop form from submitting normally */
                    event.preventDefault();
                    var recaptchaToken = \$(document).data('repactcha-token');

                    \$.ajax({
                        type: 'POST',
                        url: \$(this).attr('action'),
                        data: \$(this).serialize() + \"&rt=\" + recaptchaToken,
                        beforeSend: function () {
                            \$('#submitBtn').attr(\"disabled\", \"disabled\");
                        }
                    })
                            .done(function (data) {
                                document.body.innerHTML = data;
                            })
                            .fail(function (errMsg) {
                                \$('#submitBtn').removeAttr(\"disabled\");
                                alert(\"Something has gone wrong! Please check your entries and try again. If error persists, please contact us. Thank you\");
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
        return "experts/experts-signup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  460 => 294,  436 => 273,  405 => 245,  367 => 209,  357 => 205,  351 => 204,  348 => 203,  344 => 202,  334 => 194,  324 => 190,  318 => 189,  315 => 188,  311 => 187,  299 => 177,  289 => 173,  283 => 172,  279 => 170,  275 => 169,  265 => 161,  255 => 157,  249 => 156,  245 => 154,  241 => 153,  231 => 145,  221 => 141,  215 => 140,  212 => 139,  208 => 138,  164 => 96,  153 => 94,  149 => 93,  120 => 66,  109 => 64,  105 => 63,  81 => 41,  70 => 39,  66 => 38,  39 => 14,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "experts/experts-signup.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/experts/experts-signup.html.twig");
    }
}
