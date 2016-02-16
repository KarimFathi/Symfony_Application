<?php

/* KaiimPlatformBundle::layout.html.twig */
class __TwigTemplate_bc0ac5453737c28117d43b954e608e9ab2292415598b474afe73914506d816a2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'ocplatform_body' => array($this, 'block_ocplatform_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        // line 10
        echo "\tAnnonces - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
        // line 15
        echo "\t
\t";
        // line 17
        echo "\t<h1>Annonces</h1>
\t
\t<hr>
\t
\t";
        // line 22
        echo "\t";
        $this->displayBlock('ocplatform_body', $context, $blocks);
        // line 24
        echo "
";
    }

    // line 22
    public function block_ocplatform_body($context, array $blocks = array())
    {
        // line 23
        echo "\t";
    }

    public function getTemplateName()
    {
        return "KaiimPlatformBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 23,  60 => 22,  55 => 24,  52 => 22,  46 => 17,  43 => 15,  40 => 14,  33 => 10,  30 => 9,);
    }
}
