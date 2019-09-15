<?php

/* experts/expert-dashboard.html.twig */
class __TwigTemplate_c8b782530b5bda2280836730fa5e8f8438790c768bfa010a1a0170b4ff542598 extends Twig_Template
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
        <title>Expert Dashboard</title>
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

                        <div class=\"row\">
                            <div class=\"center-align col s12\"><span class=\"flow-text\">Expert's Dashboard</span></div>
                        </div>
                        <br>
                        <div class=\"row\">
                            <p>First Name: <div class=\"chip green white-text\">";
        // line 21
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "FirstName", array());
        echo "</div></p>
                        </div><div class=\"row\">
                            <p>Last Name: <div class=\"chip green white-text\">";
        // line 23
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "LastName", array());
        echo "</div></p>
                        </div><div class=\"row\">
                            <p>Gender: <div class=\"chip green white-text\">";
        // line 25
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Gender", array()) == "M")) {
            echo "Male";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Gender", array()) == "F")) {
            echo "Female";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "Gender", array()) == "O")) {
            echo "Other";
        }
        echo "</div></p>
                        </div><div class=\"row\">
                            <p>Birth Year: <div class=\"chip green white-text\">";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "BirthYear", array()), "html", null, true);
        echo "</div></p>
                        </div><div class=\"row\"> 
                            <p>Location: <div class=\"chip green white-text\">";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, twig_get_attribute($this->env, $this->source, $context, "expert_country", array())), "CountryName", array()), "html", null, true);
        echo "</div></p>
                        </div><div class=\"row\">
                            <p>Languages:";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_languages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_language"]) {
            echo "<div class=\"chip green white-text\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["expert_language"], "Language", array()), "html", null, true);
            echo "</div> ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</p>
                        </div><div class=\"row\">
                            <p>Career Stage: <div class=\"chip green white-text\">";
        // line 33
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_first($this->env, twig_get_attribute($this->env, $this->source, $context, "expert_career_stages", array())), "CareerStage", array()), "CareerStageName", array());
        echo "</div></p>
                        </div><div class=\"row\">
                            <p>Primary Affiliation (Name - City - Country): <div class=\"chip green white-text\">";
        // line 35
        echo twig_get_attribute($this->env, $this->source, ($context["expert_primary_affiliation"] ?? null), "PrimaryAffiliationName", array());
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["expert_primary_affiliation"] ?? null), "PrimaryAffiliationCity", array()), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["expert_primary_affiliation"] ?? null), "PrimaryAffiliationCountryCode", array()), "html", null, true);
        echo "</div></p>
                        </div><div class=\"row\">
                            <p>Secondary Affiliations: ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_secondary_affiliation", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_secondary_affiliation"]) {
            echo "<div class=\"chip green white-text\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["expert_secondary_affiliation"], "SecondaryAffiliationName", array()), "html", null, true);
            echo "</div> ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_secondary_affiliation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</p>
                        </div><div class=\"row\">
                            <p>Expertise: ";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_what", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_what"]) {
            echo "<div class=\"chip green white-text\">";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_what"], "CryosphereWhat", array()), "Approved", array()) == true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_what"], "CryosphereWhat", array()), "CryosphereWhatName", array()), "html", null, true);
                echo " </div> ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_what'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</p>
                        </div><div class=\"row\">  
                            <p>Specefic Expertise: ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_what_specefic", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_what_specefic"]) {
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_what_specefic"], "CryosphereWhatSpecefic", array()), "Approved", array()) == true)) {
                echo "<div class=\"chip green white-text\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_what_specefic"], "CryosphereWhatSpecefic", array()), "CryosphereWhatSpeceficName", array()), "html", null, true);
                echo " </div>  ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_what_specefic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</p>
                        </div><div class=\"row\">
                            <p>Expertise Location: ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_where", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_where"]) {
            echo "<div class=\"chip green white-text\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_where"], "CryosphereWhere", array()), "CryosphereWhereName", array()), "html", null, true);
            echo " </div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_where'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</p>
                        </div><div class=\"row\">
                            <p>Expertise Time: ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_when", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_when"]) {
            echo "<div class=\"chip green white-text\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_when"], "CryosphereWhen", array()), "CryosphereWhenName", array()), "html", null, true);
            echo "</div> ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_when'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</p>
                        </div><div class=\"row\">
                            <p>Expertise Methods: ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_methods", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_methods"]) {
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_methods"], "CryosphereMethods", array()), "Approved", array()) == true)) {
                echo "<div class=\"chip green white-text\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_methods"], "CryosphereMethods", array()), "CryosphereMethodsName", array()), "html", null, true);
                echo " </div> ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_methods'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</p>
                        </div><div class=\"row\">
                            <p>Contact info: ";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_contacts", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_contact"]) {
            echo "<div class=\"chip green darken-2 white-text\"><div class=\"chip green white-text\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_contact"], "ContactTypes", array()), "ContactType", array()), "html", null, true);
            echo "</div> : <div class=\"chip green white-text\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["expert_contact"], "ContactInformation", array()), "html", null, true);
            echo " </div></div> ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_contact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</p>              
                        </div>

                    </div>
                    <div class=\"card-action\">
                        <div class=\"row\">
                            <p class=\"center-align\">
                                <button class=\"btn modal-trigger waves-effect waves-light orange\" name=\"edit-expert\" data-target=\"modal-edit-expert\">Edit your info
                                    <i class=\"material-icons right\">edit</i>
                                </button>
                                <button class=\"btn modal-trigger waves-effect waves-light red\" name=\"delete-expert\" data-target=\"modal-remove-expert\">Delete your record
                                    <i class=\"material-icons right\">delete_forever</i>
                                </button>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal remove -->
        <div id=\"modal-remove-expert\" class=\"modal\">
            <div class=\"modal-content\">
                <h4>Are you sure ?</h4><br>
                <p>By clicking on the 'delete' your profile as an expert will be deleted from CryoConnect.</p>
            </div>
            <div class=\"modal-footer\">
                <button id=\"delete-expert-forever\" class=\"btn waves-effect waves-light red\">Delete my profile</button>
            </div>
        </div>

        <!-- Modal edit -->
        <div id=\"modal-edit-expert\" class=\"modal\">
            <div class=\"modal-content\">

                <div class=\"row\">
                    <form class=\"col s12\" id=\"expert_edit_form\">

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"firstName\" name=\"first_name\" type=\"text\" class=\"validate\" value=\"";
        // line 92
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "FirstName", array());
        echo "\" required>
                                <label for=\"firstName\">First name<font color=\"red\">*</font></label>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"lastName\" name=\"last_name\" type=\"text\" class=\"validate\" value=\"";
        // line 99
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context, "expert", array()), "LastName", array());
        echo "\" required>
                                <label for=\"lastName\">Last name<font color=\"red\">*</font></label>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <input id=\"affiliation\" name=\"affiliation[primary][name]\" type=\"text\" class=\"validate\" value=\"";
        // line 106
        echo twig_get_attribute($this->env, $this->source, ($context["expert_primary_affiliation"] ?? null), "PrimaryAffiliationName", array());
        echo "\" required>
                                <label for=\"affiliation\">Affiliation name<font color=\"red\">*</font></label>
                            </div>
                            <div class=\"input-field col s12\">
                                <select id=\"affiliation_country\" name=\"affiliation[primary][country]\" required>
                                    ";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "countries", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 112
            echo "                                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["country"], "CountryCode", array()) == twig_get_attribute($this->env, $this->source, ($context["expert_primary_affiliation"] ?? null), "PrimaryAffiliationCountryCode", array()))) {
                // line 113
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["country"], "CountryCode", array()), "html", null, true);
                echo "\" selected>";
                echo twig_get_attribute($this->env, $this->source, $context["country"], "CountryName", array());
                echo "</option>
                                        ";
            } else {
                // line 115
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["country"], "CountryCode", array()), "html", null, true);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["country"], "CountryName", array());
                echo "</option>
                                        ";
            }
            // line 117
            echo "                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 118
        echo "                                </select>
                                <label for=\"affiliation_country\">Affiliation country<font color=\"red\">*</font></label>
                            </div>
                            <div class=\"input-field col s12\">
                                <input id=\"affiliation_city\" name=\"affiliation[primary][city]\" type=\"text\" class=\"validate\" value=\"";
        // line 122
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["expert_primary_affiliation"] ?? null), "PrimaryAffiliationCity", array()), "html", null, true);
        echo "\" required>
                                <label for=\"affiliation_city\">Affiliation city<font color=\"red\">*</font></label>
                            </div>
                            ";
        // line 125
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_secondary_affiliation", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["expert_secondary_affiliation"]) {
            // line 126
            echo "                                <div class=\"secondaryaffiliationdiv\">
                                    <div class=\"input-field col s10\">
                                        <input class=\"secondaryaffiliations\" name=\"affiliation[secondary][";
            // line 128
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", array()), "html", null, true);
            echo "]\" type=\"text\" class=\"validate\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["expert_secondary_affiliation"], "SecondaryAffiliationName", array()), "html", null, true);
            echo "\" required>
                                        <label for=\"secondaryaffiliations\">Other affiliation<font color=\"red\">*</font></label>
                                    </div>
                                </div>
                            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_secondary_affiliation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 133
        echo "                            <div class=\"input-field col s2\">
                                <a id=\"addaffiliation\" class=\"waves-effect waves-light btn\"><i class=\"material-icons left\">add</i>Add</a>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">
                                <select name=\"caree_stage\" id=\"careerstage\" required>
                                    ";
        // line 141
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "career_stages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["career_stages"]) {
            // line 142
            echo "                                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["career_stages"], "CareerStageName", array()) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_first($this->env, twig_get_attribute($this->env, $this->source, $context, "expert_career_stages", array())), "CareerStage", array()), "CareerStageName", array()))) {
                // line 143
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["career_stages"], "Id", array()), "html", null, true);
                echo "\" selected>";
                echo twig_get_attribute($this->env, $this->source, $context["career_stages"], "CareerStageName", array());
                echo "</option>
                                        ";
            } else {
                // line 145
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["career_stages"], "Id", array()), "html", null, true);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["career_stages"], "CareerStageName", array());
                echo "</option>
                                        ";
            }
            // line 147
            echo "                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['career_stages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 148
        echo "                                </select>
                                <label for=\"careerstage\">Career stage<font color=\"red\">*</font></label>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">    
                                <select name=\"languages[]\" required multiple>
                                    ";
        // line 156
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "languages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 157
            echo "                                        ";
            $context["languageMatched"] = false;
            // line 158
            echo "                                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_languages", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["expert_language"]) {
                // line 159
                echo "                                            ";
                if ((twig_get_attribute($this->env, $this->source, $context["language"], "LanguageCode", array()) == twig_get_attribute($this->env, $this->source, $context["expert_language"], "LanguageCode", array()))) {
                    // line 160
                    echo "                                                <option value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "LanguageCode", array()), "html", null, true);
                    echo "\" selected>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "Language", array()), "html", null, true);
                    echo "</option>
                                                ";
                    // line 161
                    $context["languageMatched"] = true;
                    // line 162
                    echo "                                            ";
                }
                // line 163
                echo "                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 164
            echo "                                        ";
            if ((($context["languageMatched"] ?? null) == false)) {
                // line 165
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "LanguageCode", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "Language", array()), "html", null, true);
                echo "</option>
                                        ";
            }
            // line 167
            echo "                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 168
        echo "                                </select>
                                <label for=\"languages\">Languages in which you are capable of answering scientific questions<font color=\"red\">*</font></label>
                            </div>
                        </div>

                        ";
        // line 173
        $context["expertPhone"] = "";
        // line 174
        echo "                        ";
        $context["expertWebsite"] = "";
        // line 175
        echo "                        ";
        $context["expertLinkedIn"] = "";
        // line 176
        echo "                        ";
        $context["expertGoogleScholar"] = "";
        // line 177
        echo "
                        ";
        // line 178
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_contacts", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["expert_contact"]) {
            // line 179
            echo "                            ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_contact"], "ContactTypes", array()), "ContactType", array()) == "phone")) {
                // line 180
                echo "                                ";
                $context["expertPhone"] = twig_get_attribute($this->env, $this->source, $context["expert_contact"], "ContactInformation", array());
                // line 181
                echo "                            ";
            } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_contact"], "ContactTypes", array()), "ContactType", array()) == "website")) {
                // line 182
                echo "                                ";
                $context["expertWebsite"] = twig_get_attribute($this->env, $this->source, $context["expert_contact"], "ContactInformation", array());
                // line 183
                echo "                            ";
            } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_contact"], "ContactTypes", array()), "ContactType", array()) == "linkedIn")) {
                // line 184
                echo "                                ";
                $context["expertLinkedIn"] = twig_get_attribute($this->env, $this->source, $context["expert_contact"], "ContactInformation", array());
                // line 185
                echo "                            ";
            } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["expert_contact"], "ContactTypes", array()), "ContactType", array()) == "googleScholar")) {
                // line 186
                echo "                                ";
                $context["expertGoogleScholar"] = twig_get_attribute($this->env, $this->source, $context["expert_contact"], "ContactInformation", array());
                // line 187
                echo "                            ";
            }
            // line 188
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_contact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 189
        echo "
                        <div class=\"row\">
                            <div class=\"input-field col s12\"> 
                                <input name=\"phone_number\" id=\"phonenumber\" type=\"tel\" placeholder=\"number with country code\" value=\"";
        // line 192
        echo twig_escape_filter($this->env, ($context["expertPhone"] ?? null), "html", null, true);
        echo "\">
                                <label for=\"phonenumber\">Phone number (incl. country code)<font color=\"red\">*</font></label>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\">           
                                <input name=\"personal_website\" id=\"personalwebsite\" type=\"url\" placeholder=\"website\" value=\"";
        // line 199
        echo twig_escape_filter($this->env, ($context["expertWebsite"] ?? null), "html", null, true);
        echo "\">
                                <label for=\"personalwebsite\">Personal website</label>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"input-field col s12\"> 
                                <input name=\"personal_linkedin\" id=\"personallinkedin\" type=\"url\" placeholder=\"linkedIn\" value=\"";
        // line 205
        echo twig_escape_filter($this->env, ($context["expertLinkedIn"] ?? null), "html", null, true);
        echo "\">
                                <label for=\"personallinkedin\">LinkedIn</label>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"input-field col s12\"> 
                                <input name=\"personal_google_scholar\" id=\"personalgooglescholar\" type=\"url\" value=\"";
        // line 211
        echo twig_escape_filter($this->env, ($context["expertGoogleScholar"] ?? null), "html", null, true);
        echo "\" placeholder=\"google scholar\">
                                <label for=\"personalgooglescholar\">Google Scholar profile</label>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\" >    
                                <span id=\"cryosphere_what\"/>
                                <label for=\"cryosphere_what\">Which parts of the cryosphere are you comfortable answering questions about?<font color=\"red\">*</font> </label>
                                <br><br>
                                ";
        // line 221
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_what", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_what"]) {
            // line 222
            echo "                                    <label>
                                        ";
            // line 223
            $context["itemMatched"] = false;
            // line 224
            echo "                                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_what", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["expert_what"]) {
                // line 225
                echo "                                            ";
                if ((twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "Id", array()) == twig_get_attribute($this->env, $this->source, $context["expert_what"], "CryosphereWhatId", array()))) {
                    // line 226
                    echo "                                                <input name=\"cryosphere_what[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "CryosphereWhatName", array()), "html", null, true);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "Id", array()), "html", null, true);
                    echo "\" type=\"checkbox\" class=\"cryosphere_what\" checked=\"checked\" required />
                                                ";
                    // line 227
                    $context["itemMatched"] = true;
                    // line 228
                    echo "                                            ";
                }
                // line 229
                echo "                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_what'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 230
            echo "                                        ";
            if ((($context["itemMatched"] ?? null) == false)) {
                // line 231
                echo "                                            <input name=\"cryosphere_what[";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "CryosphereWhatName", array()), "html", null, true);
                echo "]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "Id", array()), "html", null, true);
                echo "\" type=\"checkbox\" class=\"cryosphere_what\" required />
                                        ";
            }
            // line 233
            echo "                                        <span>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what"], "CryosphereWhatName", array()), "html", null, true);
            echo "</span>
                                    </label>
                                    </br>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_what'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 237
        echo "                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\" >    
                                <span id=\"cryosphere_where\"/>
                                <label for=\"cryosphere_where\">In which general region(s) have you studied the cryosphere?<font color=\"red\">*</font> </label>
                                <br><br>
                                ";
        // line 245
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_where", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_where"]) {
            // line 246
            echo "
                                    <label>
                                        ";
            // line 248
            $context["itemMatched"] = false;
            // line 249
            echo "                                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_where", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["expert_where"]) {
                // line 250
                echo "                                            ";
                if ((twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "Id", array()) == twig_get_attribute($this->env, $this->source, $context["expert_where"], "CryosphereWhereId", array()))) {
                    // line 251
                    echo "                                                <input name=\"cryosphere_where[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "CryosphereWhereName", array()), "html", null, true);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "Id", array()), "html", null, true);
                    echo "\" type=\"checkbox\" class=\"cryosphere_where\" checked=\"checked\" required />
                                                ";
                    // line 252
                    $context["itemMatched"] = true;
                    // line 253
                    echo "                                            ";
                }
                // line 254
                echo "                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_where'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 255
            echo "                                        ";
            if ((($context["itemMatched"] ?? null) == false)) {
                // line 256
                echo "                                            <input name=\"cryosphere_where[";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "CryosphereWhereName", array()), "html", null, true);
                echo "]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "Id", array()), "html", null, true);
                echo "\" type=\"checkbox\" class=\"cryosphere_where\" required />
                                        ";
            }
            // line 258
            echo "                                        <span>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "CryosphereWhereName", array()), "html", null, true);
            echo "</span>
                                    </label>
                                    </br>   
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_where'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 262
        echo "                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\" >    
                                <span id=\"cryosphere_what_specefic\"/>
                                <label for=\"cryosphere_what_specefic\">Which processes & subdisciplines are you comfortable answering questions about?<font color=\"red\">*</font> </label>
                                <br><br>
                                ";
        // line 270
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_what_specefic", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_what_specefic"]) {
            // line 271
            echo "
                                    <label>
                                        ";
            // line 273
            $context["itemMatched"] = false;
            // line 274
            echo "                                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_what_specefic", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["expert_what_specefic"]) {
                // line 275
                echo "                                            ";
                if ((twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "Id", array()) == twig_get_attribute($this->env, $this->source, $context["expert_what_specefic"], "CryosphereWhatSpeceficId", array()))) {
                    // line 276
                    echo "                                                <input name=\"cryosphere_what_specefic[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "CryosphereWhatSpeceficName", array()), "html", null, true);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "Id", array()), "html", null, true);
                    echo "\" type=\"checkbox\" class=\"cryosphere_what_specefic\" checked=\"checked\" required />
                                                ";
                    // line 277
                    $context["itemMatched"] = true;
                    // line 278
                    echo "                                            ";
                }
                // line 279
                echo "                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_what_specefic'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 280
            echo "                                        ";
            if ((($context["itemMatched"] ?? null) == false)) {
                // line 281
                echo "                                            <input name=\"cryosphere_what_specefic[";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "CryosphereWhatSpeceficName", array()), "html", null, true);
                echo "]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "Id", array()), "html", null, true);
                echo "\" type=\"checkbox\" class=\"cryosphere_what_specefic\" required />
                                        ";
            }
            // line 283
            echo "                                        <span>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_what_specefic"], "CryosphereWhatSpeceficName", array()), "html", null, true);
            echo "</span>
                                    </label>
                                    </br>   
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_what_specefic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 287
        echo "                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\" >    
                                <span id=\"cryosphere_method\"/>
                                <label for=\"cryosphere_method\">Which methods are you comfortable answering questions about?<font color=\"red\">*</font> </label>
                                <br><br>
                                ";
        // line 295
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_methods", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_method"]) {
            // line 296
            echo "                                    <label>
                                        ";
            // line 297
            $context["itemMatched"] = false;
            // line 298
            echo "                                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_methods", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["expert_method"]) {
                // line 299
                echo "                                            ";
                if ((twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "Id", array()) == twig_get_attribute($this->env, $this->source, $context["expert_method"], "MethodId", array()))) {
                    // line 300
                    echo "                                                <input name=\"cryosphere_method[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "CryosphereMethodsName", array()), "html", null, true);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "Id", array()), "html", null, true);
                    echo "\" type=\"checkbox\" class=\"cryosphere_method\" checked=\"checked\" required />
                                                ";
                    // line 301
                    $context["itemMatched"] = true;
                    // line 302
                    echo "                                            ";
                }
                // line 303
                echo "                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_method'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 304
            echo "                                        ";
            if ((($context["itemMatched"] ?? null) == false)) {
                // line 305
                echo "                                            <input name=\"cryosphere_method[";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "CryosphereMethodsName", array()), "html", null, true);
                echo "]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "Id", array()), "html", null, true);
                echo "\" type=\"checkbox\" class=\"cryosphere_method\" required />
                                        ";
            }
            // line 306
            echo "           
                                        <span>";
            // line 307
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_method"], "CryosphereMethodsName", array()), "html", null, true);
            echo "</span>
                                    </label>
                                    </br>   
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 311
        echo "                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"input-field col s12\" >    
                                <span id=\"cryosphere_when\"/>
                                <label for=\"cryosphere_when\">Which time periods are you comfortable answering questions about?<font color=\"red\">*</font> </label>
                                <br><br>
                                ";
        // line 319
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_when", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_when"]) {
            // line 320
            echo "                                    <label>
                                        ";
            // line 321
            $context["itemMatched"] = false;
            // line 322
            echo "                                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "expert_when", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["expert_when"]) {
                // line 323
                echo "                                            ";
                if ((twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "Id", array()) == twig_get_attribute($this->env, $this->source, $context["expert_when"], "CryosphereWhenId", array()))) {
                    // line 324
                    echo "                                                <input name=\"cryosphere_when[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "CryosphereWhenName", array()), "html", null, true);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "Id", array()), "html", null, true);
                    echo "\" type=\"checkbox\" class=\"cryosphere_when\" checked=\"checked\" required />
                                                ";
                    // line 325
                    $context["itemMatched"] = true;
                    // line 326
                    echo "                                            ";
                }
                // line 327
                echo "                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['expert_when'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 328
            echo "                                        ";
            if ((($context["itemMatched"] ?? null) == false)) {
                // line 329
                echo "                                            <input name=\"cryosphere_when[";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "CryosphereWhenName", array()), "html", null, true);
                echo "]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "Id", array()), "html", null, true);
                echo "\" type=\"checkbox\" class=\"cryosphere_when\" required />
                                        ";
            }
            // line 331
            echo "                                        <span>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_when"], "CryosphereWhenName", array()), "html", null, true);
            echo "</span>
                                    </label>
                                    </br>   
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_when'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 335
        echo "                            </div>
                        </div>
                </div>

                <p class=\"center-align\">
                    <button id=\"edit-expert-btn\" class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Update your info
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
    \$(document).ready(function () {


        \$('.modal').modal();

        //add affiliation
        \$(\"#addaffiliation\").click(function () {

            var selectCount = \$(this).parent().parent().find(\".secondaryaffiliationdiv\").length;
            var selectObj = \$(this).parent().parent().find(\".secondaryaffiliationdiv\").first().clone();
            selectObj.children().first().find(\".secondaryaffiliations\").attr('name', 'affiliation[secondary][' + selectCount + ']');
            selectObj.children().first().find(\".secondaryaffiliations\").val(null);
            selectObj.insertBefore(\$(this).parent());

        });

        //delete expert
        \$(\"#delete-expert-forever\").click(function () {

            /* stop form from submitting normally */
            event.preventDefault();
            var expertId = \"";
        // line 397
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "expertId", array()), "html", null, true);
        echo "\";
            var expertEmail = \"";
        // line 398
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "expert_email", array()), "html", null, true);
        echo "\";
            var token = getUrlParameter('t');
            var postUrl = \"";
        // line 400
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("expert_delete"), "html", null, true);
        echo "\";
            if (
                    String(token).trim() == '' ||
                    String(expertId).trim() == '' ||
                    String(expertEmail).trim() == '')
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
                    data: 'e=' + expertEmail + '&id=' + expertId,
                    beforeSend: function () {
                        \$('#delete-expert-forever').attr(\"disabled\", \"disabled\");
                        \$('.modal-remove-expert').css('opacity', '.5');
                    }
                })
                        .done(function (data) {
                            M.toast({
                                html: 'Your expert has been successfully deleted!',
                                displayLength: 5000,
                                completeCallback: function () {
                                    window.location.href = \"/\"
                                }
                            });
                        })
                        .fail(function (errMsg) {
                            alert('Apologies, an error occurred. Please try again or contact info@cryoconnect.net.');
                            \$('#delete-expert-forever').removeAttr(\"disabled\");
                            \$('.modal-remove-expert').css('opacity', '');
                        });
            }
        });
        //edit fieldwork subbmit
        \$(\"#expert_edit_form\").submit(function (event) {

            /* stop form from submitting normally */
            event.preventDefault();
            var expertId = \"";
        // line 442
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "expertId", array()), "html", null, true);
        echo "\";
            var expertEmail = \"";
        // line 443
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "expert_email", array()), "html", null, true);
        echo "\";
            var token = getUrlParameter('t');
            var postUrl = \"";
        // line 445
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("expert_edit"), "html", null, true);
        echo "\";
            var formObject = \$(this);
            if (
                    String(token).trim() == '' ||
                    String(expertId).trim() == '' ||
                    String(expertEmail).trim() == '')
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
                    data: formObject.serialize() + '&e=' + expertEmail + '&id=' + expertId,
                    beforeSend: function () {
                        \$('#edit-expert-btn').attr(\"disabled\", \"disabled\");
                        \$('.modal-edit-expert').css('opacity', '.5');
                    }
                })
                        .done(function (data) {
                            location.reload();
                        })
                        .fail(function (errMsg) {
                            alert('Apologies, an error occurred. Please try again or contact info@cryoconnect.net.');
                            \$('#edit-expert-btn').removeAttr(\"disabled\");
                            \$('.modal-edit-expert').css('opacity', '');
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
        // line 487
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context, "token", array()), "html", null, true);
        echo "`,
                },
                url: \"";
        // line 489
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_bid_request_submit"), "html", null, true);
        echo "\",
                data: formObject.serialize() + \"&e=";
        // line 490
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

        if (\$(document).find('.cryosphere_what').filter(':checked').length < 1) {
            \$(document).find('.cryosphere_what').prop('required', true);
        } else {
            \$(document).find('.cryosphere_what').prop('required', false);
        }
        \$(document).find('.cryosphere_what').change(function () {
            if (\$(document).find('.cryosphere_what').filter(':checked').length < 1) {
                \$(document).find('.cryosphere_what').prop('required', true);
            } else {
                \$(document).find('.cryosphere_what').prop('required', false);
            }
        });

        if (\$(document).find('.cryosphere_what_specefic').filter(':checked').length < 1) {
            \$(document).find('.cryosphere_what_specefic').prop('required', true);
        } else {
            \$(document).find('.cryosphere_what_specefic').prop('required', false);
        }
        \$(document).find('.cryosphere_what_specefic').change(function () {
            if (\$(document).find('.cryosphere_what_specefic').filter(':checked').length < 1) {
                \$(document).find('.cryosphere_what_specefic').prop('required', true);
            } else {
                \$(document).find('.cryosphere_what_specefic').prop('required', false);
            }
        });

        if (\$(document).find('.cryosphere_where').filter(':checked').length < 1) {
            \$(document).find('.cryosphere_where').prop('required', true);
        } else {
            \$(document).find('.cryosphere_where').prop('required', false);
        }
        \$(document).find('.cryosphere_where').change(function () {
            if (\$(document).find('.cryosphere_where').filter(':checked').length < 1) {
                \$(document).find('.cryosphere_where').prop('required', true);
            } else {
                \$(document).find('.cryosphere_where').prop('required', false);
            }
        });

        if (\$(document).find('.cryosphere_when').filter(':checked').length < 1) {
            \$(document).find('.cryosphere_when').prop('required', true);
        } else {
            \$(document).find('.cryosphere_when').prop('required', false);
        }
        \$(document).find('.cryosphere_when').change(function () {
            if (\$(document).find('.cryosphere_when').filter(':checked').length < 1) {
                \$(document).find('.cryosphere_when').prop('required', true);
            } else {
                \$(document).find('.cryosphere_when').prop('required', false);
            }
        });

        if (\$(document).find('.cryosphere_method').filter(':checked').length < 1) {
            \$(document).find('.cryosphere_method').prop('required', true);
        } else {
            \$(document).find('.cryosphere_method').prop('required', false);
        }
        \$(document).find('.cryosphere_method').change(function () {
            if (\$(document).find('.cryosphere_method').filter(':checked').length < 1) {
                \$(document).find('.cryosphere_method').prop('required', true);
            } else {
                \$(document).find('.cryosphere_method').prop('required', false);
            }
        });
    });

</script>
";
    }

    public function getTemplateName()
    {
        return "experts/expert-dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1075 => 490,  1071 => 489,  1066 => 487,  1021 => 445,  1016 => 443,  1012 => 442,  967 => 400,  962 => 398,  958 => 397,  894 => 335,  883 => 331,  875 => 329,  872 => 328,  866 => 327,  863 => 326,  861 => 325,  854 => 324,  851 => 323,  846 => 322,  844 => 321,  841 => 320,  837 => 319,  827 => 311,  817 => 307,  814 => 306,  806 => 305,  803 => 304,  797 => 303,  794 => 302,  792 => 301,  785 => 300,  782 => 299,  777 => 298,  775 => 297,  772 => 296,  768 => 295,  758 => 287,  747 => 283,  739 => 281,  736 => 280,  730 => 279,  727 => 278,  725 => 277,  718 => 276,  715 => 275,  710 => 274,  708 => 273,  704 => 271,  700 => 270,  690 => 262,  679 => 258,  671 => 256,  668 => 255,  662 => 254,  659 => 253,  657 => 252,  650 => 251,  647 => 250,  642 => 249,  640 => 248,  636 => 246,  632 => 245,  622 => 237,  611 => 233,  603 => 231,  600 => 230,  594 => 229,  591 => 228,  589 => 227,  582 => 226,  579 => 225,  574 => 224,  572 => 223,  569 => 222,  565 => 221,  552 => 211,  543 => 205,  534 => 199,  524 => 192,  519 => 189,  513 => 188,  510 => 187,  507 => 186,  504 => 185,  501 => 184,  498 => 183,  495 => 182,  492 => 181,  489 => 180,  486 => 179,  482 => 178,  479 => 177,  476 => 176,  473 => 175,  470 => 174,  468 => 173,  461 => 168,  455 => 167,  447 => 165,  444 => 164,  438 => 163,  435 => 162,  433 => 161,  426 => 160,  423 => 159,  418 => 158,  415 => 157,  411 => 156,  401 => 148,  395 => 147,  387 => 145,  379 => 143,  376 => 142,  372 => 141,  362 => 133,  341 => 128,  337 => 126,  320 => 125,  314 => 122,  308 => 118,  302 => 117,  294 => 115,  286 => 113,  283 => 112,  279 => 111,  271 => 106,  261 => 99,  251 => 92,  194 => 49,  178 => 47,  164 => 45,  150 => 43,  134 => 41,  118 => 39,  104 => 37,  95 => 35,  90 => 33,  76 => 31,  71 => 29,  66 => 27,  55 => 25,  50 => 23,  45 => 21,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "experts/expert-dashboard.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/experts/expert-dashboard.html.twig");
    }
}
