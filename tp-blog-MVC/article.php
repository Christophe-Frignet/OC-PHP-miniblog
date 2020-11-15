<?php session_start();

require('modele.php');

if(isset($_GET['id_billet']))
{
    $id_article = clarifierIdArticle($_GET['id_billet']);
    $article = recupererUnArticle($id_article);
    
    if($article != false)
    {
        require('afficher-article.php');
    }
}
else
{
    echo $article;
}

include('afficher-article.php');