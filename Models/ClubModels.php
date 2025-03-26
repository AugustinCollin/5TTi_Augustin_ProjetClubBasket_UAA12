<?php
function selectAllSchools($pdo)
{
    try {
        //définition de la requête
        $query = 'select * from school';
        //préparation de l'execution de a requête
        $selectclub_Basket = $pdo->prepare($query);
        //execution
        $selectclub_Basket->execute();
        //récupération des données dans l'objet fetch
        $club_Basket = $selectclub_Basket->fetchAll();
        //renvoi des données
        return $slectclub_Basket;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function deleteAllclub_BAsketFromUser($pdo)
{
    try {
        $query = 'delete from school where utilisateurId = :utilisateurId';
        $deleteAllclub_BasketFromId = $pdo->prepare($query);
        $deleteAllclub_BAsketFromId->execute([
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
        $deleteAllclub_BAsketFromId->execute([
            'utilisateurId' => $_SESSION['user']->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function slectMyclub_Basket($pdo)
{
    try{
        $query = "slect * from school where utilisateurId = :utilisateurId";
        $selectclub_Basket = $pdo->prepare($query);
        $selectclub_Basket->execute([
            "utilisateurId" => $_SESSION["user"]->id
        ]);
        $schools = $selectSchool->fetchAll();
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
        $options = $slectOptions->fetchAll();
        return $options;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function selectOneclub_BAsket ($pdo)
{
    try{
        $query = "select * from school where schoolId = :schoolId";
        $slectclub_Basket = $pdo->prepare($query);
        $slectclub_Basket->execute([
            "schoolId" => $_GET["schoolId"]
        ]);
        $club_Basket = $selectclub_Basket->fetch();
        return $club_Basket;
    } catch(PDOExeption $e) 
    {
        $message = $e->getMessage();
        die($messsage);
    }
}
    
function selectOptionsActiveclub_Basket($pdo)
{
    try{
        $query = "select * from optionscolaire where optionscolaire in (select optionsolairefrom option_ecolewhere scoolId = :schoolId);";
                    
        $slectclub_Basket = $pdo->prepare($query);
        $slectclub_Basket->execute([
            "schoolId" => $_GET["schoolId"]
        ]);
        $option = $selectclub_Basket->fetch();
        return $option;
    } catch(PDOExeption $e) 
    {
        $message = $e->getMessage();
        die($messsage);
    }
}
