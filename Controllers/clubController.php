<?php 

require_once "Models/schoolModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/mesclub_basket"){
    $school = selectMyclub_basket($pdo);

    $title = "Mes clubs de basket";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
}
elseif ($uri === "/createclub_basket")
{
    //si on a rempli le formulaire est qu'on l'a validé
        if (isset($_POST['btnEnvoi'])) {
            createclub_basket($pdo);
            //récupération du numéro de la dernière ligne dans la table des clubs de basket.
            $recetteId = $pdo->lastInsertId();
            // ajout des options liées au club de basket dans la table des équipes 
            // ne pas oublier que $_POST["options"] est un tableau ! => le parcourir et faire une écritur epour chaque élément trouvé
            for ($i = 0; $i < count($_POST["options"]); $i++) {
                $optionclub_basketId = $_POST[""] [$i];
                //écriture dans la table des options 
                ajouterOptionEquipe($pdo, $club_basketId, $optionEquipeId);
            }
            header("location:/mesclub_baskets");
        }  
        $options = selectAllOptions($pdo);
        $title = "Ajout d'un club de basket";
        $template = "Views/Users/inscriptionOrEditProfil.php";
        require_once("Views/base.php");
        
}
//ceci n'est possible que si on dispose d'un id pour le club de basket => isset ($_GET["schoolId"])
elseif (isset($_GET["club_basketId"]) && $uri === "/Voirclub_basket,club_basketId=" . $_GET["club_basketId"])
{
    //rechercher les données du club de basket concerné  ainsi qie les options correspondantes 
    $club_basket = selectOneclub_basket($pdo);
    $options = selectOptionsActiveclub_basket($pdo);
    $title = "ajout d'un club de basket";   //titre à afficher dans l'onglet de la page du navigateur 
    $template = "Views/basket/basket.php";  //chemin vers la vue demandée 
    require_once("Views/base.php"); //appel de la page de base qui sera remplie avec la vue demandée
}
//mise à jour des données d'un club de basket
elseif (isset($_GET["club_basketId"]) && $uri ==="/updateclub_basket?club_basketId=" . $_GET["club_basketId"])
{
    //si on a validé des modifications 
    if(isset($_POST["btnEnvoie"]))
    {
        updateclub_basket($pdo);//mettre à jour la table club_basket
        //pour mettre à jour les options, il faut d'abbords supprimer les anciennes, puis réécrire les nouvelles
        deleteOptionEquipe($pdo);
        for($i = 0; $i < count($_POST["options"]); $i++)
        {

        }
    }
}

