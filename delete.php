
<?php
if(isset($_REQUEST['delete'])) {
    $link = 'upload/'.$_REQUEST['delete'];
    if(unlink($link)) {
        header("Location: /");

    } else {
        echo "L'image n'a pas été supprimée"."<a href='index.php'>retour à l'accueil</a>";

    }
}