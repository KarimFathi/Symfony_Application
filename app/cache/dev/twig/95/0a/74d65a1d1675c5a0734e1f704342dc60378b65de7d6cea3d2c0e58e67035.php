<?php

/* KaiimPlatformBundle:Advert:edit.html.twig */
class __TwigTemplate_950a74d65a1d1675c5a0734e1f704342dc60378b65de7d6cea3d2c0e58e67035 extends Twig_Template
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

    // line 9
    public function block_title($context, array $blocks = array())
    {
        // line 10
        echo "\tModifier une annonce - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 14
    public function block_ocplatform_body($context, array $blocks = array())
    {
        // line 15
        echo "\t
\t<h2>Modifier une annonce</h2>
\t
\t";
        // line 18
        echo twig_include($this->env, $context, "KaiimPlatformBundle:Advert:form.html.twig");
        echo "
\t
\t<p>
\t\tVous éditez une annonce déjà existante, merci de ne pas changer\tl'esprit générale de l'annonce déjà publiée.
\t</p>
\t
\t<p>
\t\t<a href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("kaiim_platform_view", array("id" => $this->getAttribute((isset($context["advert"]) ? $context["advert"] : $this->getContext($context, "advert")), "id", array()))), "html", null, true);
        echo "\" class=\"btn btn-default\">
\t\t\t<i class=\"glyphicon glyphicon-chevron-left\"></i>
\t\t\tRetour à l'annonce
\t\t</a>
\t\t
\t\t<a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("kaiim_platform_home");
        echo "\" class=\"btn btn-default\">
\t\t\t<i class=\"glyphicon glyphicon-chevron-left\"></i>
\t\t\tRetour à la liste
\t\t</a>
\t</p>
\t
";
    }

    public function getTemplateName()
    {
        return "KaiimPlatformBundle:Advert:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 30,  57 => 25,  47 => 18,  42 => 15,  39 => 14,  32 => 10,  29 => 9,);
    }
}
