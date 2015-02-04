<?php

/* ::layout.html.twig */
class __TwigTemplate_1aac09d4ac8b8bf9e9a94bb0fe4a43dfcdb3264117b2779ebb027964bf72bb1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'arianne' => array($this, 'block_arianne'),
            'section' => array($this, 'block_section'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "</head>
<body>
    <header>
    <div id=\"menu\">
        <ul>
            <li class=\"item\"><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("movies_moviesbundle_home");
        echo "\">Accueil</a></li>
            <li class=\"item\"><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("movies_moviesbundle_movies");
        echo "\">Cinémas</a></li>
            <li class=\"item\"><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("movies_moviesbundle_series");
        echo "\">Séries</a></li>
        </ul>
    </div>
    </header>
    <div id=\"arianne\">
    ";
        // line 21
        $this->displayBlock('arianne', $context, $blocks);
        // line 24
        echo "    </div>

    <section>
       ";
        // line 27
        $this->displayBlock('section', $context, $blocks);
        // line 29
        echo "    </section>
    <footer>
    </footer>
  ";
        // line 32
        $this->displayBlock('javascripts', $context, $blocks);
        // line 35
        echo "</body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Movies";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "        <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("index.css"), "html", null, true);
        echo "\">
    ";
    }

    // line 21
    public function block_arianne($context, array $blocks = array())
    {
        // line 22
        echo "    Movies
    ";
    }

    // line 27
    public function block_section($context, array $blocks = array())
    {
        // line 28
        echo "        ";
    }

    // line 32
    public function block_javascripts($context, array $blocks = array())
    {
        // line 33
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
  ";
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
        return array (  115 => 33,  112 => 32,  108 => 28,  105 => 27,  100 => 22,  97 => 21,  90 => 7,  87 => 6,  81 => 5,  75 => 35,  73 => 32,  68 => 29,  66 => 27,  61 => 24,  59 => 21,  51 => 16,  47 => 15,  43 => 14,  36 => 9,  34 => 6,  30 => 5,  24 => 1,);
    }
}
