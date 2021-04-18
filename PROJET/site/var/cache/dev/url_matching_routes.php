<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/projet' => [[['_route' => 'projet_accueil', '_controller' => 'App\\Controller\\ProjetController::accueilAction'], null, null, null, true, false, null]],
        '/projet/connexion' => [[['_route' => 'projet_connexion', '_controller' => 'App\\Controller\\ProjetController::connexionAction'], null, null, null, false, false, null]],
        '/projet/creationCompte' => [[['_route' => 'projet_creation_compte', '_controller' => 'App\\Controller\\ProjetController::creationCompteAction'], null, null, null, false, false, null]],
        '/projet/deconnexion' => [[['_route' => 'projet_deconnexion', '_controller' => 'App\\Controller\\ProjetController::deconnexionAction'], null, null, null, false, false, null]],
        '/projet/modifiercompte' => [[['_route' => 'projet_modification_compte', '_controller' => 'App\\Controller\\ProjetController::modificationCompteAction'], null, null, null, false, false, null]],
        '/projet/produits/afficher' => [[['_route' => 'projet_produits_afficher', '_controller' => 'App\\Controller\\ProjetController::produitsAfficherAction'], null, null, null, false, false, null]],
        '/projet/panier/ajout' => [[['_route' => 'projet_ajout_panier', '_controller' => 'App\\Controller\\ProjetController::ajoutPanierAction'], null, null, null, false, false, null]],
        '/projet/panier/gestion' => [[['_route' => 'projet_gestion_panier', '_controller' => 'App\\Controller\\ProjetController::gestionPanierAction'], null, null, null, false, false, null]],
        '/projet/user/gestion' => [[['_route' => 'projet_user_gestion', '_controller' => 'App\\Controller\\ProjetController::userGestionAction'], null, null, null, false, false, null]],
        '/projet/produit/ajout' => [[['_route' => 'projet_produit_ajout', '_controller' => 'App\\Controller\\ProjetController::produitAjoutAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/projet/(?'
                    .'|panier/(?'
                        .'|gestion/(?'
                            .'|suppresion/([^/]++)(*:220)'
                            .'|vider/([^/]++)(*:242)'
                        .')'
                        .'|acheter/([^/]++)(*:267)'
                    .')'
                    .'|suppresion/([^/]++)(*:295)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        220 => [[['_route' => 'projet_suppression_panier', '_controller' => 'App\\Controller\\ProjetController::suppressionPanierAction'], ['idPanier'], null, null, false, true, null]],
        242 => [[['_route' => 'projet_vider_panier', '_controller' => 'App\\Controller\\ProjetController::viderpanierAction'], ['idUser'], null, null, false, true, null]],
        267 => [[['_route' => 'projet_acheter_panier', '_controller' => 'App\\Controller\\ProjetController::acheterPanierAction'], ['idUser'], null, null, false, true, null]],
        295 => [
            [['_route' => 'projet_suppression_user', '_controller' => 'App\\Controller\\ProjetController::suppressionUserAction'], ['idUser'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
