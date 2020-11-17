<?php
session_start();
require('controller/controller.php');

if(isset($_GET['action'])){
    if($_GET['action'] == 'afficherAccueil'){
        afficherAccueil();
    }
    elseif ($_GET['action'] == 'afficherArticle' AND isset($_GET['id_article'])) {
        afficherArticle();//fonctionne si un id_article est passé en GET
    }
    elseif ($_GET['action'] == 'afficherAjoutArticle') {
        afficherAjoutArticle();
    }
    elseif ($_GET['action'] == 'ajouterArticle' AND isset($_POST['titre']) AND isset($_POST['contenu'])) {

        $post_titre_article = $_POST['titre'];
        $post_contenu_article = $_POST['contenu'];

        ajouterArticleController($post_titre_article,$post_contenu_article);
    }
    elseif ($_GET['action'] == 'ajouterCommentaire' AND isset($_POST['id_article']) AND isset($_POST['date_commentaire']) AND isset($_POST['auteur']) AND isset($_POST['commentaire'])) {

        $id_article = $_POST['id_article'];
        $date_commentaire = $_POST['date_commentaire'];
        $auteur = $_POST['auteur'];
        $commentaire = $_POST['commentaire'];

        ajouterCommentaireController($id_article,$date_commentaire,$auteur,$commentaire);
    }
    elseif ($_GET['action'] == 'afficherConnexionAdmin') {
        afficherConnexionAdmin();
    }
    elseif ($_GET['action'] == 'connecterAdmin' AND isset($_POST['id_admin']) AND isset($_POST['mdp_formulaire'])) {

        $id_admin = $_POST['id_admin'];
        $mdp_formulaire = $_POST['mdp_formulaire'];

        connecterAdminController($id_admin,$mdp_formulaire);
    }
    elseif ($_GET['action'] == 'afficherCreationAdmin') {
        afficherCreationAdmin();
    }
    elseif ($_GET['action'] == 'creerAdmin' AND isset($_POST['id_admin']) AND isset($_POST['mdp_admin'])) {

        $id_admin = $_POST['id_admin'];
        $mdp_admin = $_POST['mdp_admin'];

        creerAdminController($id_admin,$mdp_admin);
    }
    elseif ($_GET['action'] == 'deconnecterAdmin') {
        deconnecterAdminController();
    }
    elseif ($_GET['action'] == 'afficherModificationArticle' AND isset($_GET['id_article'])) {
        $id_article = $_GET['id_article'];
        afficherModificationArticle($id_article);
    }
    
    elseif ($_GET['action'] == 'modifierArticle' AND isset($_POST['id']) AND isset($_POST['titre']) AND isset($_POST['contenu'])) {

        $id_article = $_POST['id'];
        $titre_article = $_POST['titre'];
        $contenu_article = $_POST['contenu'];

        modifierArticleController($id_article, $titre_article, $contenu_article);
    }
}
else{
    afficherAccueil();
}