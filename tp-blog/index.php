<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Billets de blog</title>
</head>

<body>
    <h1>Mon premier blog</h1>

        <p style="text-align:center;">
            <?php
            if (isset($_SESSION['access']) AND $_SESSION['access'] = 'admin') {
                //Si la session accès est "admin" on passe admin_access à true et on propose la déconnexion
                echo 'ACCES : ADMINISTRATEUR<br><a href="deconnexion.php">se déconnecter</a>';
                echo '<br><br><a href="#">+ Ajouter un artile</a>';
                $admin_access = true;
            } else {
                //Sinon on passe passe admin_access à false et on propose la connexion à l'espace admin
                echo '<a href="adminaccessform.php">accès administrateur >></a>';
                $admin_access = false;
            }
            ?>
        </p>
        
        <?php
        //on définit le deuxième paramètre du LIMIT de la requête SQL : le nombre de billets par page, 
        $billets_par_page = 2;

        //on calcul le premier paramètre du LIMIT de la requête SQL : le numero du billet à afficher en premier
        if(isset($_GET['num_page']))
        {
            $num_page = $_GET['num_page'];
        }
        else
        {
            $num_page = 1;
        }
        $num_billet = ($num_page -1)*$billets_par_page;

        //on se connecte à la bdd
        include('connexion_bdd.php');

        //On affiche les billets du blog
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation,  \'%d/%m/%Y\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT ' . $num_billet . ',' . $billets_par_page . '';

        $requete = $bdd->prepare($sql);
        $requete->execute();

        while ($billet = $requete->fetch())
        {
            include('afficher_billet.php');
        }
        
        $requete->closeCursor();

        //On récupère le nombre de billets du blog
        $sql = 'SELECT COUNT(*) AS nb_billets FROM billets';

        $requete = $bdd->prepare($sql);
        $requete->execute();

        $req = $requete->fetch();
        $nbr_billets = $req['nb_billets'];

        //on calcule le nombre de pages nécessaires pour la pagination
        $nbr_pages = ceil(($nbr_billets/$billets_par_page));

        //On crée les liens vers les pages
        $num = 1;

        echo '<p style="text-align: center;">';
        for ($pagination = 1; $pagination <= $nbr_pages; $pagination++)
        {
            echo '<a href="?num_page=' . $num . '">| Page ' . $pagination . ' |</a> ';
            $num = $num + 1;
        }
        echo '</p>';
    ?>
</body>
</html>