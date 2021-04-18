<?php

namespace App\Controller;
use App\Service\myService;
use App\Entity\Utilisateurs;
use App\Entity\Produit;
use App\Entity\Panier;
use App\Form\AjoutProduitType;
use App\Form\CreationCompteType;
use App\Form\PanierType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class ProjetController
 * @package App\Controller
 *
 * @Route ("/projet")
 */
class ProjetController extends AbstractController
{
    /**
     * @Route("/", name="projet_accueil")
     */
    public function accueilAction(myService $myservice): Response
    {
        $id = $this->getParameter('id');

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('App\Entity\Utilisateurs');

        $user = $repo->find($id);
        if ($user == null)
            $status = "guest";
        elseif ($user->getIsadmin() == 1)
            $status = "admin";
        else
            $status = "user";

        $args = array
        (
            'status' => $status,
            'user' => $user,
            'serviceResult' => $myservice->invertMyMessage()
        );
        return $this->render('projet/accueil.html.twig', $args);
    }
    // #####################################################
    // ################ actions guest ######################
    // #####################################################

    /**
     * @Route("/connexion", name="projet_connexion")
     */
    public function connexionAction(): Response
    {
        $id = $this->getParameter('id');

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('App\Entity\Utilisateurs');

        $user = $repo->find($id);

        if ($user != null)
            throw new NotFoundHttpException('Vous êtes déjà connecté');
        else
            return $this->render("projet/connexion.html.twig",['user' => $user]);
    }

    /**
     * @Route("/creationCompte", name="projet_creation_compte")
     */
    public function creationCompteAction(Request $request): Response
    {
        $id = $this->getParameter('id');

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('App\Entity\Utilisateurs');

        $user = $repo->find($id);

        if ($user != null)
            throw new NotFoundHttpException('Vous êtes déjà connecté');
        else
            {
                $form = $this->createForm(CreationCompteType::class);
                $form->add('send', SubmitType::class, ['label' => 'creation compte']);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid())
                {
                    $task = $form->getData();
                    $em->persist($task);
                    $em->flush();
                    $this->addFlash('info', 'creation ok');
                    return $this->redirectToRoute('projet_accueil',['user' => $user]);
                }

                if ($form->isSubmitted())
                    $this->addFlash('info', 'creation erronée pas ok');

                $args = array(
                    'myform' =>$form->createView(),
                    'user' => $user
                );
                return $this->render("projet/creationCompte.html.twig", $args);
            }
    }

    // #####################################################
    // ################ actions users ######################
    // #####################################################

    /**
     * @Route("/deconnexion", name="projet_deconnexion")
     */
    public function deconnexionAction(): Response
    {
        $id = $this->getParameter('id');

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('App\Entity\Utilisateurs');

        $user = $repo->find($id);

        if ($user == null)
            throw new NotFoundHttpException('Vous n\'êtes pas sensé être ici');
        else
            $this->addFlash('info', 'Vous pourrez bientôt vous déconnecter');
            return $this->redirectToRoute("projet_accueil",['user' => $user]);
    }

    /**
     * @Route("/modifiercompte", name="projet_modification_compte")
     */
    public function modificationCompteAction(Request $request) : Response
    {
        $id = $this->getParameter('id');

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('App\Entity\Utilisateurs');

        $user = $repo->find($id);

        if ($user == null || $user->getisadmin() == 1)
            throw new NotFoundHttpException('Vous n\'êtes pas sensé être ici');
        else
        {
            $form = $this->createForm(CreationCompteType::class, $user);
            $form->add('send', SubmitType::class, ['label' => 'modifier compte']);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid())
            {
                $task = $form->getData();
                $em->persist($task);
                $em->flush();
                $this->addFlash('info', 'modification ok');
                return $this->redirectToRoute('projet_produits_afficher',['user' => $user]);
            }

            if ($form->isSubmitted())
                $this->addFlash('info', 'modification erronée pas ok');

            $args = array(
                'myform' =>$form->createView(),
                'user' => $user
            );
            return $this->render("projet/creationCompte.html.twig", $args);
        }
    }

    /**
     * @Route("/produits/afficher", name="projet_produits_afficher")
     */
    public function produitsAfficherAction(): Response
    {
        $id = $this->getParameter('id');
        $em = $this->getDoctrine()->getManager();
        $repoUser = $em->getRepository('App\Entity\Utilisateurs');
        $repoProduit = $em->getRepository('App\Entity\Produit');
        $user = $repoUser->find($id);
        $listProduits = $repoProduit->findAll();

        if ($user == null || $user->getisadmin() == 1)
            throw new NotFoundHttpException('Vous n\'êtes pas sensé être ici');
        else
            {
                $args = array(
                    'user' => $user,
                    'produits' => $listProduits
                );
                return $this->render("projet/listProduits.html.twig", $args);
            }
    }

    /**
     * @Route("/panier/ajout", name="projet_ajout_panier")
     */
    public function ajoutPanierAction(): Response
    {
        $id = $this->getParameter('id');

        $em = $this->getDoctrine()->getManager();
        $repoUser = $em->getRepository('App\Entity\Utilisateurs');
        $repoProduit = $em->getRepository('App\Entity\Produit');
        $repoPanier = $em->getRepository('App\Entity\Panier');
        $user = $repoUser->find($id);
        if ($user == null || $user->getisadmin() == 1)
            throw new NotFoundHttpException('Vous n\'êtes pas sensé être ici');
        else {
                $produits = $repoProduit->findAll();

                foreach ($produits as $produit)
                    if (isset($_POST['quantite' . $produit->getId() . '']) && $_POST['quantite' . $produit->getId() . ''] != 0) {
                        $panier = new Panier();
                        $panier->setAcheteurs($user)
                            ->setQuantite($_POST['quantite' . $produit->getId() . ''])
                            ->setProduit($produit);
                        $produit->setQuantity($produit->getQuantity() - $_POST['quantite' . $produit->getId() . '']);
                        $user->addPanier($panier);
                        $em->persist($panier);
                        $em->flush();
                    }
            return $this->redirectToRoute('projet_produits_afficher', ['user'=>$user]);
        }
    }

    /**
     * @Route("/panier/gestion", name="projet_gestion_panier")
     */
    public function gestionPanierAction(): Response
    {
        $id = $this->getParameter('id');

        $em = $this->getDoctrine()->getManager();
        $repoUser = $em->getRepository('App\Entity\Utilisateurs');
        $repoPanier = $em->getRepository('App\Entity\Panier');
        $repoProduit = $em->getRepository('App\Entity\Produit');
        $user = $repoUser->find($id);
        if ($user == null || $user->getisadmin() == 1)
            throw new NotFoundHttpException('Vous n\'êtes pas sensé être ici');
        else {
            $args = array('user' => $user);
            return $this->render('projet/gestionPanier.html.twig', $args);
        }
    }
    /**
     * @Route ("/panier/gestion/suppresion/{idPanier}", name="projet_suppression_panier")
     */
    public function suppressionPanierAction($idPanier): Response
    {
        $id = $this->getParameter('id');
        $em = $this->getDoctrine()->getManager();
        $repoUser = $em->getRepository('App\Entity\Utilisateurs');
        $repoPanier = $em->getRepository('App\Entity\Panier');
        $user = $repoUser->find($id);
        if ($user == null || $user->getisadmin() == 1)
            throw new NotFoundHttpException('Vous n\'êtes pas sensé être ici');
        else {
            $panier = $repoPanier->find($idPanier);
            $panier->getProduit()->setQuantity($panier->getQuantite() + $panier->getProduit()->getQuantity());
            $user->removePanier($panier);
            $em->flush();
            $args = array('user' => $user);
            return $this->redirectToRoute('projet_gestion_panier', $args);
        }
    }

    /**
     * @Route("/panier/gestion/vider/{idUser}", name="projet_vider_panier")
     */
    public function viderpanierAction($idUser): Response
    {
        $id = $this->getParameter('id');
        $em = $this->getDoctrine()->getManager();
        $repoUser = $em->getRepository('App\Entity\Utilisateurs');
        $repoPanier = $em->getRepository('App\Entity\Panier');
        $user = $repoUser->find($id);
        if ($user == null)
            throw new NotFoundHttpException('Vous n\'êtes pas sensé être ici');
        else {
            $panierComplet = $user->getPanier();
            foreach ($panierComplet as $panier) {
                $this->suppressionPanierAction($panier->getId());
            }
            $em->flush();
            $args = array('user' => $user);
            return $this->redirectToRoute('projet_gestion_panier', $args);
        }
    }

    /**
     * @Route("/panier/acheter/{idUser}", name="projet_acheter_panier")
     */
    public function acheterPanierAction():Response
    {
        $id = $this->getParameter('id');
        $em = $this->getDoctrine()->getManager();
        $repoUser = $em->getRepository('App\Entity\Utilisateurs');
        $repoPanier = $em->getRepository('App\Entity\Panier');
        $user = $repoUser->find($id);
        if ($user == null || $user->getisadmin() == 1)
            throw new NotFoundHttpException('Vous n\'êtes pas sensé être ici');
        else {
            $panierComplet = $user->getPanier();
            foreach ($panierComplet as $panier) {
                $user->removePanier($panier);
            }
            $em->flush();
            $args = array('user' => $user);
            return $this->redirectToRoute('projet_gestion_panier', $args);
        }
    }
    // #####################################################
    // ################ actions admin ######################
    // #####################################################

    /**
     * @Route ("/user/gestion", name="projet_user_gestion")
     */
    public function userGestionAction(): Response
    {
        $id = $this->getParameter('id');
        $em = $this->getDoctrine()->getManager();
        $repoUser = $em->getRepository('App\Entity\Utilisateurs');
        $user = $repoUser->find($id);
        if ($user->getIsadmin() != 1)
            throw new NotFoundHttpException('Vous n\'avez rien à faire ici');
        else
        {
            $users = $repoUser->findAll();
            $args = array('user' => $user,
                'users' => $users);
            return $this->render('projet/gestionusers.html.twig', $args);
        }
    }

    /**
     * @Route ("/produit/ajout", name="projet_produit_ajout")
     */
    public function produitAjoutAction(Request $request): Response
    {
        $id = $this->getParameter('id');
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('App\Entity\Utilisateurs');

        $user = $repo->find($id);

        if ($user->getIsadmin() != 1)
            throw new NotFoundHttpException('Vous n\'avez rien à faire ici');
        else
        {
            $form = $this->createForm(AjoutProduitType::class);
            $form->add('send', SubmitType::class, ['label' => 'Ajout Produit']);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid())
            {
                $task = $form->getData();
                $em->persist($task);
                $em->flush();
                $this->addFlash('info', 'Produit ajouté avec succès');
                return $this->redirectToRoute('projet_accueil',['user' => $user]);
            }

            if ($form->isSubmitted())
                $this->addFlash('info', 'creation erronée pas ok');

            $args = array(
                'myform' =>$form->createView(),
                'user' => $user
            );
            return $this->render("projet/creationCompte.html.twig", $args);
        }
    }

    /**
     * @Route ("/suppresion/{idUser}", name="projet_suppression_user")
     */
    public function suppressionUserAction($idUser): Response
    {
        $id = $this->getParameter('id');

        $em = $this->getDoctrine()->getManager();
        $repoUser = $em->getRepository('App\Entity\Utilisateurs');
        $user = $repoUser->find($id);
        if ($id == $idUser)
        {
            $this->addFlash('info', 'Vous ne pouvez pas vous supprimer');
            return $this->redirectToRoute('projet_user_gestion', ['user' => $user]);
        }
        if ($user == null || $user->getisadmin() != 1)
            throw new NotFoundHttpException('Vous n\'êtes pas sensé être ici');
        else {
            $userToDelete = $repoUser->find($idUser);
            if ($userToDelete->getPanier() != null)
            {
                $this->viderpanierAction($user->getPk());
            }
            $em->remove($userToDelete);
            $em->flush();
            $args = array('user' => $user);
            return $this->redirectToRoute('projet_user_gestion', $args);
        }
    }
}
//Berthelot Yann