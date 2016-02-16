<?php

/* ::layout.html.twig */
class __TwigTemplate_9f7294355603c634b40fe7365ba15fb22d32c611283f73d0a1c9343064f5bacb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        echo "
<!DOCTYPE html>
<html>
\t<head>
\t\t<meta charset=\"utf-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t
\t\t<title>";
        // line 10
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t
\t\t";
        // line 12
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 16
        echo "\t</head>
\t
\t<body>
\t\t<div class=\"container\">
\t\t
\t\t\t<div id=\"header\" class=\"jumbotron\">
\t\t\t\t<h1>Ma plateforme d'annonces</h1>
\t\t\t\t<p>
\t\t\t\t\tPlatforme réaliser avec Symfony2...
\t\t\t\t</p>
\t\t\t\t<p>
\t\t\t\t\t<a class=\"btn btn-primary btn-lg\" href=\"#\">
\t\t\t\t\t\tLire plus »
\t\t\t\t\t</a>
\t\t\t\t</p>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"row\">
\t\t\t\t<div id=\"menu\" class=\"col-md-3\">
\t\t\t\t\t<h3>Les annonces</h3>
\t\t\t\t\t<ul class=\"nav nav-pills nav-stacked\">
\t\t\t\t\t\t";
        // line 38
        echo "\t\t\t\t\t\t<li><a href=\"";
        echo $this->env->getExtension('routing')->getPath("kaiim_platform_home");
        echo "\">Accueil</a></li>
\t\t\t\t\t\t<li><a href=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("kaiim_platform_add");
        echo "\">Ajouter une annonce</a></li>
\t\t\t\t\t</ul>
\t\t\t\t\t
\t\t\t\t\t<h4>Dernières annonces</h4>
\t\t\t\t\t";
        // line 44
        echo "\t\t\t\t\t";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("KaiimPlatformBundle:Advert:menu", array("limit" => 3)));
        echo "
\t\t\t\t</div>
\t\t\t\t<div id=\"content\" class=\"col-md-9\">
\t\t\t\t\t";
        // line 47
        $this->displayBlock('body', $context, $blocks);
        // line 49
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<hr>
\t\t\t
\t\t\t<footer>
\t\t\t\t<p>© ";
        // line 55
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " Karim FATHI</p>
\t\t\t</footer>
\t\t</div>
\t\t
\t\t";
        // line 59
        $this->displayBlock('javascripts', $context, $blocks);
        // line 64
        echo "\t\t
\t</body>
</html>";
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
        echo "Kaiim Plateforme";
    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 13
        echo "\t\t\t";
        // line 14
        echo "\t\t\t<link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css\">
\t\t";
    }

    // line 47
    public function block_body($context, array $blocks = array())
    {
        // line 48
        echo "\t\t\t\t\t";
    }

    // line 59
    public function block_javascripts($context, array $blocks = array())
    {
        // line 60
        echo "\t\t\t";
        // line 61
        echo "\t\t\t<script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
\t\t\t<script src=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js\"></script>
\t\t";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 61,  132 => 60,  129 => 59,  125 => 48,  122 => 47,  117 => 14,  115 => 13,  112 => 12,  106 => 10,  100 => 64,  98 => 59,  91 => 55,  83 => 49,  81 => 47,  74 => 44,  67 => 39,  62 => 38,  39 => 16,  37 => 12,  32 => 10,  23 => 3,);
    }
}
