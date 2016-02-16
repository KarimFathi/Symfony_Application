<?php

/* KaiimPlatformBundle:Advert:index.html.twig */
class __TwigTemplate_cc38d03a28286b89af3e03627c871d963fff8fcd8db997ae0b21601256d26cc5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

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
        <title>Bienvenue sur ma première page avec OpenClassrooms !</title>
\t\t<meta charset=\"utf-8\" />
    </head>
    <body>
        <h1>Hello ";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["idNom"]) ? $context["idNom"] : null), "html", null, true);
        echo " !</h1>
        
        <p>
            Le Hello World est un grand classique en programmation.
            Il signifie énormément, car cela veut dire que vous avez
            réussi à exécuter le programme pour accomplir une tâche simple :
            afficher ce hello world !
        </p>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "KaiimPlatformBundle:Advert:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 8,  19 => 1,);
    }
}
