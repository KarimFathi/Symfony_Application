<?php

/* KaiimPlatformBundle:Advert:add.html.twig */
class __TwigTemplate_6d322b4c29cabe7736d0a2c77c9a9cb13bd80a62fe9aec1bd4803d29f9001bd5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("KaiimPlatformBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'ocplatform_body' => array($this, 'block_ocplatform_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "KaiimPlatformBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        // line 9
        echo "\tAjouter une annonce - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 13
    public function block_ocplatform_body($context, array $blocks = array())
    {
        // line 14
        echo "\t
\t<h2>Ajouter une annonce</h2>
\t
\t";
        // line 17
        echo twig_include($this->env, $context, "KaiimPlatformBundle:Advert:form.html.twig");
        echo "
\t
\t<p>
\t\tAttention : cette annonce sera ajoutée directement sur la page d'accueil après validation du formulaire.
\t</p>
\t
\t<p>\t\t
\t\t<a href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("kaiim_platform_home");
        echo "\" class=\"btn btn-default\">
\t\t\t<i class=\"glyphicon glyphicon-chevron-left\"></i>
\t\t\tRetour à la liste
\t\t</a>
\t</p>

";
    }

    public function getTemplateName()
    {
        return "KaiimPlatformBundle:Advert:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 24,  47 => 17,  42 => 14,  39 => 13,  32 => 9,  29 => 8,);
    }
}
