<?php

/* MoviesMoviesBundle:Movies:formAjoutMovie.html.twig */
class __TwigTemplate_9200953ca5730a09ba4569cb16ea777e6cfacef44e4ebc6782e4161e92c6e994 extends Twig_Template
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

    // line 9
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Ajouter un film";
    }

    // line 11
    public function block_arianne($context, array $blocks = array())
    {
        // line 12
        echo "\t";
        $this->displayParentBlock("arianne", $context, $blocks);
        echo "
\t<img height=\"15px\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/arrow.png"), "html", null, true);
        echo "\"/> Ajouté un film
";
    }

    // line 16
    public function block_section($context, array $blocks = array())
    {
        // line 17
        echo "\t<h2>Ajouter un film</h2>

";
    }

    public function getTemplateName()
    {
        return "MoviesMoviesBundle:Movies:formAjoutMovie.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 17,  75 => 16,  69 => 13,  64 => 12,  61 => 11,  54 => 9,  47 => 5,  42 => 4,  39 => 3,  11 => 1,);
    }
}
