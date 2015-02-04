<?php

/* MoviesMoviesBundle:Movies:index.html.twig */
class __TwigTemplate_5fda8a9f2fc6017a5130d9f9b0fdd25d198d3117abf0054f11f24c9aabd16e5c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'title' => array($this, 'block_title'),
            'arianne' => array($this, 'block_arianne'),
            'section' => array($this, 'block_section'),
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

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
<link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/moviesmovies/movies.css"), "html", null, true);
        echo "\">
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Index";
    }

    // line 11
    public function block_arianne($context, array $blocks = array())
    {
        // line 12
        $this->displayParentBlock("arianne", $context, $blocks);
        echo " <img height=\"15px\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/arrow.png"), "html", null, true);
        echo "\"/> Accueil
";
    }

    // line 15
    public function block_section($context, array $blocks = array())
    {
        // line 16
        echo "\t<h2>Les films de la semaine</h2>
\t";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, twig_length_filter($this->env, (isset($context["test"]) ? $context["test"] : $this->getContext($context, "test")))));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 18
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["test"]) ? $context["test"] : $this->getContext($context, "test")), "find", array(0 => $context["i"]), "method"), "titre", array()), "html", null, true);
            echo "
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "\t
";
    }

    public function getTemplateName()
    {
        return "MoviesMoviesBundle:Movies:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 20,  81 => 18,  77 => 17,  74 => 16,  71 => 15,  63 => 12,  60 => 11,  53 => 8,  47 => 5,  42 => 4,  39 => 3,  11 => 1,);
    }
}
