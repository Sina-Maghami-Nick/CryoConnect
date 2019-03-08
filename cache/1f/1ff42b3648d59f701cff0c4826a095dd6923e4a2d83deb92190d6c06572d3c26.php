<?php

/* fieldwork-connect.html.twig */
class __TwigTemplate_3061aad815295c89f702c2a99e2831a9407ad1ce619458c62764063c757bedeb extends Twig_Template
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
        <title>Expedition connect</title>
        <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css\">
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
    </head>

    <body>
        <div class=\"row\">
            <form class=\"col s12\" id=\"search_form\">
                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <select id=\"cryosphere_where\" name=\"cryosphere_where[]\" required multiple>
                            ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context, "cryosphere_where", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cryosphere_where"]) {
            // line 18
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "Id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cryosphere_where"], "CryosphereWhereName", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cryosphere_where'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                        </select>
                        <label for=\"cryosphere_where\">Region of expedition<font color=\"red\">*</font></label>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <input id=\"range_date\" name=\"range_date\" type=\"text\" class=\"datepicker\" required>
                        <label for=\"start_date\">Please select the date range<font color=\"red\">*</font></label>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"input-field col s12\">
                        <p class=\"center-align\">
                            <button id=\"submitBtn\" class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\" disabled>Find
                                <i class=\"material-icons right\">search</i>
                            </button>
                        </p>
                        <div style=\"visibility : hidden\" id=\"progressBar\" >
                            <div class=\"progress\">
                                <div class=\"indeterminate\"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>


            <form class=\"col s12\" id=\"fieldwork_inquiry_form\">



            </form>



        </div>




    </body>
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/flatpickr\"></script>
    <script>

        


        //fix required checkbox
        \$('#fieldwork_inquiry_form').on('click', '.filled-in', function () {
            if (\$(document).find('.filled-in').filter(':checked').length < 1) {
                \$(document).find('.filled-in').prop('required', true);
            } else {
                \$(document).find('.filled-in').prop('required', false);
            }
            fixValidity();
        });

        document.getElementById(\"cryosphere_where\").addEventListener(\"focusout\", function () {
            if (\$('#cryosphere_where').val() != '' && \$('#range_date').val() != '') {
                \$('#submitBtn').removeAttr(\"disabled\");
            } else {
                \$('#submitBtn').attr('disabled', 'disabled');
            }

        });

        document.getElementById(\"range_date\").addEventListener(\"focusout\", function () {
            if (\$('#cryosphere_where').val() != '' && \$('#range_date').val() != '') {
                \$('#submitBtn').removeAttr(\"disabled\");
            } else {
                \$('#submitBtn').attr('disabled', 'disabled');
            }
        });

        \$(document).ready(function () {
            
            //fixe iframe focusing out of drop box
            \$(window).on('blur',function() { document.getElementById('search_form').click()} );

            //search subbmition
            \$(\"#search_form\").submit(function (event) {

                /* stop form from submitting normally */
                event.preventDefault();




                \$.ajax({
                    type: 'GET',
                    url: \"";
        // line 114
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_connect_search"), "html", null, true);
        echo "\",
                    data: \$(this).serialize(),
                    beforeSend: function () {
                        \$('#submitBtn').hide();
                        document.getElementById(\"progressBar\").style.visibility = 'visible';
                        document.getElementById('fieldwork_inquiry_form').innerHTML = '';
                    }
                })
                        .done(function (data) {
                            \$('#submitBtn').show();
                            \$('#submitBtn').attr('disabled', 'disabled');
                            document.getElementById(\"progressBar\").style.visibility = 'hidden';
                            \$('#range_date').val('');
                            console.log(data);
                            document.getElementById('fieldwork_inquiry_form').innerHTML = data;
                            fixValidity();
                        })
                        .fail(function (errMsg) {
                            \$('#submitBtn').show();
                            \$('#submitBtn').attr('disabled', 'disabled');
                            document.getElementById(\"progressBar\").style.visibility = 'hidden';
                            \$('#range_date').val('');
                            alert(\"Something has gone wrong! Please check your enteries and try again. If error persists, please contact us. Thank you\");
                        });

            });
            
            //info request submittion
            //search subbmition
            \$(\"#fieldwork_inquiry_form\").submit(function (event) {

                /* stop form from submitting normally */
                event.preventDefault();

                \$.ajax({
                    type: 'POST',
                    url: \"";
        // line 150
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("fieldwork_connect_request"), "html", null, true);
        echo "\",
                    data: \$(this).serialize(),
                    beforeSend: function () {
                        \$('#submitBtnTwo').attr('disabled', 'disabled');
                    }
                })
                        .done(function (data) {
                            \$('#submitBtnTwo').removeAttr('disabled');
                            document.getElementById('fieldwork_inquiry_form').innerHTML = data;
                            parent.scrollTo(0,500);
                        })
                        .fail(function (errMsg) {
                            \$('#submitBtn').show();
                            \$('#submitBtn').attr('disabled', 'disabled');
                            document.getElementById(\"progressBar\").style.visibility = 'hidden';
                            \$('#range_date').val('');
                            alert(\"Something has gone wrong! Please check your enteries and try again. If error persists, please contact us. Thank you\");
                        });

            });

            //to initialize materelize forms
            \$('select').formSelect();

            var todayDate = new Date();
            \$(\".datepicker\").flatpickr({
                minDate: todayDate,
                dateFormat: 'd M Y',
                mode: \"range\"
            });
        });

        function fixValidity() {
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
        }
    </script>
</html>";
    }

    public function getTemplateName()
    {
        return "fieldwork-connect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 150,  151 => 114,  55 => 20,  44 => 18,  40 => 17,  23 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "fieldwork-connect.html.twig", "/mnt/c/Users/Sina/Documents/DoNotChange/phpdevserver/CryoConnect/templates/fieldwork-connect.html.twig");
    }
}
