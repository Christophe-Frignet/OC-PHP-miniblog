<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Billets de blog</title>
</head>

<body>

<p style="text-align:center;"><a href="index.php">Liste articles</a></p>
<p style="text-align:center;"><a href="adminaccessform.php">Connexion administrateur</a></p>

<section class="bloc center padding">
    <h2>Création accès administrateur</h2>
        <form  method="POST" action="add_admin_access.php">
                    
            <label for="id_admin">Identifiant</label><br>
            <input type="text" id="id_admin" name="id_admin"><br>
    
            <label for="pwd_admin">Mot de passe</label><br>
            <input type="text" id="pwd_admin" name="pwd_admin"><br>

            <input type="submit" value="Envoyer en BDD">
        </form>
</section>

</body>
