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
    </head>
    <body>

        
        <form class=\"pure-form pure-form-aligned\" action=";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("expert_signup"), "html", null, true);
        echo " method=\"post\">

                <div class=\"pure-control-group\">
                    <label for=\"email\">Email Address</label>
                    <input name=\"email\" id=\"email\" type=\"email\" placeholder=\"Email Address\" required>
                    <span class=\"pure-form-message-inline\">This is a required field.</span>
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"firstName\">First Name</label>
                    <input name=\"firstname\" id=\"firstName\" type=\"text\" placeholder=\"First Name\" required>
                    <span class=\"pure-form-message-inline\">This is a required field.</span>
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"familyName\">Last Name</label>
                    <input name=\"familyname\" id=\"familyName\" type=\"text\" placeholder=\"Family Name\" required>
                    <span class=\"pure-form-message-inline\">This is a required field.</span>
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"cryospherewhat\">Which parts of the cryosphere are you comfortable answering questions about? </label>
                    ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_what", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_what"]) {
            // line 34
            echo "                        <input name=\"cryosphere_what[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "CryosphereWhatName", array()), "html", null, true);
            echo "]\" id=\"cryospherewhat\" type=\"checkbox\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "Id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "CryosphereWhatName", array()), "html", null, true);
            echo "</input>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_what'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "                    <input name=\"cryosphere_what[other]\" id=\"cryospherewhat\" type=\"text\" placeholder=\"other\">
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"cryosphere_where\">In which general region(s) have you studied the cryosphere?</label>
                    ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_where", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_where"]) {
            // line 42
            echo "                        <input name=\"cryosphere_where[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cryosphere_what"] ?? null), "CryosphereWhereName", array()), "html", null, true);
            echo "]\" id=\"cryospherewhere\" type=\"checkbox\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "Id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "CryosphereWhereName", array()), "html", null, true);
            echo "</input>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_where'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "                    <span class=\"pure-form-message-inline\">This is a required field.</span>
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"cryospherewhatspecefic\">Which processes & subdisciplines are you comfortable answering questions about?</label>
                    ";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_what_specefic", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_what_specefic"]) {
            // line 50
            echo "                        <input name=\"cryosphere_what_specefic[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "CryosphereWhatSpeceficName", array()), "html", null, true);
            echo "] id=\"cryospherewhatspecefic\" type=\"checkbox\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "Id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "CryosphereWhatSpeceficName", array()), "html", null, true);
            echo "</input>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_what_specefic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "                    <input name=\"cryosphere_what_specefic[other]\" id=\"cryospherewhatspecefic\" type=\"text\" placeholder=\"other\">
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"cryospheremethod\">Which methods are you comfortable answering questions about? </label>
                    ";
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_methods", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_method"]) {
            // line 58
            echo "                        <input name=\"cryosphere_method[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "CryosphereMethodsName", array()), "html", null, true);
            echo "] id=\"cryospheremethod\" type=\"checkbox\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "Id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "CryosphereMethodsName", array()), "html", null, true);
            echo "</input>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "                    <input name=\"cryosphere_method[other]\" id=\"cryospheremethod\" type=\"text\" placeholder=\"other\">
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"cryospherewhen\">Which time periods are you comfortable answering questions about?</label>
                    ";
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_when", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_when"]) {
            // line 66
            echo "                        <input name=\"cryosphere_when[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "CryosphereWhatName", array()), "html", null, true);
            echo "]\" id=\"cryospherewhen\" type=\"checkbox\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "Id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "CryosphereWhenName", array()), "html", null, true);
            echo "</input>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_when'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "                    <input name=\"cryosphere_when[";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cryosphere_when"] ?? null), "CryosphereWhatName", array()), "html", null, true);
        echo "]\" id=\"cryospherewhen\" type=\"text\" placeholder=\"other\">
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"fieldwork\">If your research involves fieldwork, roughly where and when will this take place?</label>
                    <input name=\"fieldwork[location]\" id=\"fieldwork\" type=\"text\" placeholder=\"where ?\">
                    <input name=\"fieldwork[date]\" id=\"fieldwork\" type=\"date\" placeholder=\"When ?\">
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"languages\">Languages in which you are capable of answering scientific questions *</label>
                    <input name=\"languages[1]\" id=\"languages\" type=\"text\" placeholder=\"language 1\" list=\"languagessuggestions\">
                    <input name=\"languages[2]\" id=\"languages\" type=\"text\" placeholder=\"language 2\" list=\"languagessuggestions\">
                    <input name=\"languages[3]\" id=\"languages\" type=\"text\" placeholder=\"language 3\" list=\"languagessuggestions\">
                    <datalist id=\"languagessuggestions\">
                        ";
        // line 83
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "languages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 84
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "LanguageCode", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "Language", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "                    </datalist>
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"birtyear\">When is your birth-year</label>
                    <input name=\"birth_year\" id=\"birtyear\" type=\"number\" placeholder=\"birtyear\">
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"careerstage\">Career stage</label>
                    <select name=\"caree_stage\" id=\"careerstage\">
                        <option disabled selected value> Choose </option>
                        ";
        // line 98
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "career_stages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["career_stages"]) {
            // line 99
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["career_stages"], "Id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["career_stages"], "CareerStageName", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['career_stages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        echo "                    </select>
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"affiliation\">Affiliations</label>
                    <input name=\"affiliation[primary][name]\" id=\"affiliation\" type=\"text\" placeholder=\"primary affiliation\">
                    <input name=\"affiliation[primary][country]\" id=\"primaryaffiliationcountry\" type=\"text\" placeholder=\"Country of primary affiliation\" list=\"affliationcountries\">
                    <input name=\"affiliation[primary][city]\" id=\"primaryaffiliationcity\" type=\"text\" placeholder=\"City of primary affiliation\">
                    <input name=\"affiliation[scondry][name]\" id=\"secondryaffiliations\" type=\"text\" placeholder=\"secondary affiliations\">
                    <datalist id=\"affliationcountries\">
                        ";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "countries", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 112
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["country"], "CountryName", array()), "html", null, true);
            echo "\"></option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
        echo "                    </datalist>
                </div>

                <div class=\"pure-control-group\">
                    <label for=\"phonenumber\">Phone number (incl. country code)</label>
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

                <div class=\"pure-controls\">
                    <label for=\"cb\" class=\"pure-checkbox\">
                        <input id=\"cb\" type=\"checkbox\" required> I agree to the terms and conditions
                    </label>

                    <button type=\"submit\" class=\"pure-button pure-button-primary\">Submit</button>
                </div>
            </fieldset>
        </form>
        <script>console.log(";
        // line 146
        echo json_encode($context);
        echo ");</script>

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
        return array (  295 => 146,  261 => 114,  252 => 112,  248 => 111,  236 => 101,  225 => 99,  221 => 98,  207 => 86,  196 => 84,  192 => 83,  173 => 68,  160 => 66,  156 => 65,  149 => 60,  136 => 58,  132 => 57,  125 => 52,  112 => 50,  108 => 49,  101 => 44,  88 => 42,  84 => 41,  77 => 36,  64 => 34,  60 => 33,  35 => 11,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "experts-signup.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/experts-signup.html.twig");
    }
}
