

<?php

function selectAllClubs($pdo)
{
    try {
        //définition de la requête
        $query = 'select * from club_Basket';
        //préparation de l'execution de a requête
        $selectclubs_Basket = $pdo->prepare($query);
        //execution
        $selectclubs_Basket->execute();
        //récupération des données dans l'objet fetch
        $clubs_Basket = $selectclubs_Basket->fetchAll();
        //renvoi des données
        return $clubs_Basket;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}


function deleteAllclub_BasketFromUser($pdo)
{
    try {
        $query = 'delete from school where utilisateurId = :utilisateurId';
        $deleteAllclub_BasketFromId = $pdo->prepare($query);
        $deleteAllclub_BasketFromId->execute([
            'utilisateurId' => $_SESSION['user']->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function deleteOptionsclub_BasketFromUser($dbh)
{
    try {
        $query = 'delete from option_ecole where schoolId in (select schoolId from school where utilisateurId = :utilisateurId)';
        $deleteAllclub_BasketFromId = $dbh->prepare($query);
        $deleteAllclub_BasketFromId->execute([
            'utilisateurId' => $_SESSION['user']->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function selectMyclub_Basket($pdo)
{
    try{
        $query = "select * from school where utilisateurId = :utilisateurId";
        $selectclub_Basket = $pdo->prepare($query);
        $selectclub_Basket->execute([
            "utilisateurId" => $_SESSION["user"]->id
        ]);
        $schools = $selectclub_Basket->fetchAll();
        return $schools;
    }  catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function selectAllOptions($pdo)
{

    try{
        $query = "SELECT * FROM optionscolaire";
        $selectOptions = $pdo->prepare($query);
        $selectOptions->execute();
        $options = $selectOptions->fetchAll();
        return $options;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function createclub_Basket($pdo)
{
    try {
        $query = 'insert into recette (recetteNom, recetteImage, utilisateurId)
        values (:recetteNom, :recetteImage, :utilisateurId)';
        $addclub_Basket = $pdo->prepare($query);
        $addclub_Basket->execute([
            'club_BasketNom' => $_POST['nom'],
            'club_BasketImage' => $_POST['image'],
            'utilisateurId' => $_SESSION['user']->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function selectOneclub_Basket ($pdo)
{
    try{
        $query = "select * from school where schoolId = :schoolId";
        $selectclub_Basket = $pdo->prepare($query);
        $selectclub_Basket->execute([
            "schoolId" => $_GET["schoolId"]
        ]);
        $club_Basket = $selectclub_Basket->fetch();
        return $club_Basket;
    } catch(PDOException $e) 
    {
        $message = $e->getMessage();
        die($message);
    }
}

function ajouterOptionclub_Basket ($pdo, $recetteId, $optionId)
{
    try {
        $query='insert into option_recette (recetteId, optionrecetteId) values (:recetteId, :optionrecetteId)';
        $deleteAllclub_BasketFromId = $pdo->prepare($query);
        $deleteAllclub_BasketFromId->execute([
            'club_BasketID' => $recetteId,
            'optionrecetteId' => $optionId
        ]);
    } catch (\PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}


    
function selectOptionsActiveclub_Basket($pdo)
{
    try{
        $query = "select * from optionscolaire where optionscolaire in (select optionsolairefrom option_ecolewhere scoolId = :schoolId);";
                    
        $selectclub_Basket = $pdo->prepare($query);
        $selectclub_Basket->execute([
            "club-BasketId" => $_GET["club_BasketId"]
        ]);
        $option = $selectclub_Basket->fetch();
        return $option;
    } catch(PDOException $e) 
    {
        $message = $e->getMessage();
        die($message);
    }
}

