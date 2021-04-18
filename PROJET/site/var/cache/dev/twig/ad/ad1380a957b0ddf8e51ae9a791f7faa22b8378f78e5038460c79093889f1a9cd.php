<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* projet/gestionPanier.html.twig */
class __TwigTemplate_0bdd4588d9a0e0c727559b31cc1e35da37ad0228a13c016bd9387133f0e4f824 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'vue' => [$this, 'block_vue'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "./projet/Layouts/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "projet/gestionPanier.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "projet/gestionPanier.html.twig"));

        $this->parent = $this->loadTemplate("./projet/Layouts/layout.html.twig", "projet/gestionPanier.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_vue($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "vue"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "vue"));

        // line 4
        echo "    ";
        $this->displayParentBlock("vue", $context, $blocks);
        echo "
    <h2>Panier</h2>
    <table>
        <tbody>
            <tr>
                <th>Libellé</th>
                <th>Prix Unit.</th>
                <th>Quantite</th>
                <th>Prix Total</th>
                <th>Action</th>
            </tr>
    ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 15, $this->source); })()), "panier", [], "any", false, false, false, 15));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 16
            echo "            <tr>
                <td>";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "produit", [], "any", false, false, false, 17), "libelle", [], "any", false, false, false, 17), "html", null, true);
            echo "</td>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "produit", [], "any", false, false, false, 18), "prix", [], "any", false, false, false, 18), "html", null, true);
            echo "</td>
                <td>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "quantite", [], "any", false, false, false, 19), "html", null, true);
            echo "</td>
                <td>
                    ";
            // line 21
            echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "produit", [], "any", false, false, false, 21), "prix", [], "any", false, false, false, 21) * twig_get_attribute($this->env, $this->source, $context["article"], "quantite", [], "any", false, false, false, 21)), "html", null, true);
            echo "
                </td>
                <td><a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("projet_suppression_panier", ["idPanier" => twig_get_attribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 23)]), "html", null, true);
            echo "\">Supprimer</a></td>
            </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "        <tr>
            <td>Total</td>
            <td></td>
            <td>
                ";
        // line 30
        $context["quantiteTotal"] = 0;
        // line 31
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 31, $this->source); })()), "panier", [], "any", false, false, false, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 32
            echo "                    ";
            $context["quantiteTotal"] = ((isset($context["quantiteTotal"]) || array_key_exists("quantiteTotal", $context) ? $context["quantiteTotal"] : (function () { throw new RuntimeError('Variable "quantiteTotal" does not exist.', 32, $this->source); })()) + twig_get_attribute($this->env, $this->source, $context["article"], "quantite", [], "any", false, false, false, 32));
            // line 33
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "                ";
        echo twig_escape_filter($this->env, (isset($context["quantiteTotal"]) || array_key_exists("quantiteTotal", $context) ? $context["quantiteTotal"] : (function () { throw new RuntimeError('Variable "quantiteTotal" does not exist.', 34, $this->source); })()), "html", null, true);
        echo "
            </td>
            <td>
                ";
        // line 37
        $context["prixTotal"] = 0;
        // line 38
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 38, $this->source); })()), "panier", [], "any", false, false, false, 38));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 39
            echo "                    ";
            $context["prixTotal"] = ((isset($context["prixTotal"]) || array_key_exists("prixTotal", $context) ? $context["prixTotal"] : (function () { throw new RuntimeError('Variable "prixTotal" does not exist.', 39, $this->source); })()) + (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "produit", [], "any", false, false, false, 39), "prix", [], "any", false, false, false, 39) * twig_get_attribute($this->env, $this->source, $context["article"], "quantite", [], "any", false, false, false, 39)));
            // line 40
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "                ";
        echo twig_escape_filter($this->env, (isset($context["prixTotal"]) || array_key_exists("prixTotal", $context) ? $context["prixTotal"] : (function () { throw new RuntimeError('Variable "prixTotal" does not exist.', 41, $this->source); })()), "html", null, true);
        echo "
            </td>
        </tr>
        <tr>
            <td><a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("projet_vider_panier", ["idUser" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 45, $this->source); })()), "pk", [], "any", false, false, false, 45)]), "html", null, true);
        echo "\">Vider</a></td>
            <td><a href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("projet_acheter_panier", ["idUser" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 46, $this->source); })()), "pk", [], "any", false, false, false, 46)]), "html", null, true);
        echo "\">Acheter</a></td>
            <td></td>
        </tr>
        </tbody>
    </table>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "projet/gestionPanier.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 46,  170 => 45,  162 => 41,  156 => 40,  153 => 39,  148 => 38,  146 => 37,  139 => 34,  133 => 33,  130 => 32,  125 => 31,  123 => 30,  117 => 26,  108 => 23,  103 => 21,  98 => 19,  94 => 18,  90 => 17,  87 => 16,  83 => 15,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"./projet/Layouts/layout.html.twig\" %}

{% block vue %}
    {{ parent() }}
    <h2>Panier</h2>
    <table>
        <tbody>
            <tr>
                <th>Libellé</th>
                <th>Prix Unit.</th>
                <th>Quantite</th>
                <th>Prix Total</th>
                <th>Action</th>
            </tr>
    {% for article in user.panier %}
            <tr>
                <td>{{ article.produit.libelle }}</td>
                <td>{{ article.produit.prix }}</td>
                <td>{{ article.quantite }}</td>
                <td>
                    {{ article.produit.prix * article.quantite }}
                </td>
                <td><a href=\"{{ path('projet_suppression_panier', {idPanier : article.id}) }}\">Supprimer</a></td>
            </tr>
    {% endfor %}
        <tr>
            <td>Total</td>
            <td></td>
            <td>
                {% set quantiteTotal = 0 %}
                {% for article in user.panier %}
                    {% set quantiteTotal = quantiteTotal + article.quantite %}
                {% endfor %}
                {{ quantiteTotal }}
            </td>
            <td>
                {% set prixTotal = 0 %}
                {% for article in user.panier %}
                    {% set prixTotal = prixTotal + article.produit.prix * article.quantite %}
                {% endfor %}
                {{ prixTotal }}
            </td>
        </tr>
        <tr>
            <td><a href=\"{{ path('projet_vider_panier', {idUser :user.pk }) }}\">Vider</a></td>
            <td><a href=\"{{ path('projet_acheter_panier', {idUser :user.pk }) }}\">Acheter</a></td>
            <td></td>
        </tr>
        </tbody>
    </table>

{% endblock %}", "projet/gestionPanier.html.twig", "S:\\wamp64\\www\\projet\\templates\\projet\\gestionPanier.html.twig");
    }
}
