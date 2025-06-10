

<?php

function selectAllClubs($pdo)
{
    try {
        //définition de la requête
        $query = 'select * from club_basket';
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


function deleteAllclub_basketFromUser($pdo)
{
    try {
        $query = 'delete from school where utilisateurId = :utilisateurId';
        $deleteAllclub_basketFromId = $pdo->prepare($query);
        $deleteAllclub_basketFromId->execute([
            'utilisateurId' => $_SESSION['user']->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function deleteOptionsclub_basketFromUser($dbh)
{
    try {
        $query = 'delete from option_ecole where schoolId in (select schoolId from school where utilisateurId = :utilisateurId)';
        $deleteAllclub_basketFromId = $dbh->prepare($query);
        $deleteAllclub_basketFromId->execute([
            'utilisateurId' => $_SESSION['user']->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
/*
Fonction selectMyclub_basket
----------------------------
BUT: aller rechercher les caractéristiques des clubs de basket de l'utilisateur conncté dans la base de donnée
IN: $pdo reprenant toutes les informations de connexion
OUT: objet pdo contenant les écoles de l'utilisateur connecté de la base de donnée 
*/
function selectMyclub_basket($pdo)
{
    try{
        //requête avec critère et paramètre !
        $query = "select * from school where utilisateurId = :utilisateurId";
        $selectclub_basket = $pdo->prepare($query);
        $selectclub_basket->execute([
            //le paramètre est l'ID de l'utilisateur connecté
            "utilisateurId" => $_SESSION["user"]->id
        ]);
        $club_basket = $selectclub_basket->fetchAll();
        return $club_basket;
    }  catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
/*
fonction selectAllOptions 
--------------------------
BUT: aller rechercher les caractéristiques de toutes les options dans la base de données
IN: $pdo reprenan ttoutes les informations de conexion 
OUT: objet pdo contenant la liste de toutes les options existantes de la bas de données 
*/
function selectAllOptions($pdo)
{

    try{
        $query = "SELECT * FROM club_basket";
        $selectEquipes = $pdo->prepare($query);
        $selectEquipes->execute();
        $club_basket = $selectEquipes->fetchAll();
        return $club_basket;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
/*
fonction createclub_basket 
-------------------------------
BUT: ajouter les données d'un club de basket encodées dans la table club_basket
IN: $pdo reprenant toutes les information de connexion 
*/
function createclub_basket($pdo)
{
    try {
        $query = 'insert into club_basket (club_basketNom, club_BaskteImage, utiId, club_basketAdresse, club_BaketTel)
        values (:recetteNom, :recetteImage, :utilisateurId)';
        $addclub_basket = $pdo->prepare($query);
        $addclub_basket->execute([
            'club_basketNom' => $_POST['nom'],
            'club_basketAdresse' => $_POST ['Adresse'],
            'club_basketVille' => $_POST ['Ville'],
            'club_basketCodePostal' => $_POST['code_postal'],
            'club_basketImage' => $_POST['image'],
            'utilisateurId' => $_SESSION['user']->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
/*
Fonction selectOneclub_basket
------------------------------
BUT: aller rechercher les caractéristiques du club de basket actif dans la base de donnée
IN: $pdo reprenant toutes les informations de connexion
OUT: objet pdo contenant toutes les informations concernat le club de basket actif
*/
function selectOneclub_basket ($pdo)
{
    try{
        $query = "select * from club_basket where club_basketId = :club_basketId";
        $selectclub_basket = $pdo->prepare($query);
        $selectclub_basket->execute([
            "cl" => $_GET["club_basketId"] // récupération du paramètre se trouvant dans l'adresse
        ]);
        $club_basket = $selectclub_basket->fetch(); //récupération d'un enregistrement (pas fetchAll)
        return $club_basket;
    } catch(PDOException $e) 
    {
        $message = $e->getMessage();
        die($message);
    }
}
/*
fonction aujouteroptionEquipe
--------------------------------
BUT: ajouter les données d'une equipe encodée par l'utilisateur dans la table equipe 
IN: $pdo reprenant toutes les informations de connexion 
    $equipeId identifiant de la dernière equipe ajoutée dans la table equipe
*/
function ajouterOptionEquipe($pdo, $EquipeId, $EquipeCategorie)
{
    try {
        $query = 'INSERT INTO equipe (EquipeId, EquipeCatégorie) VALUES (:EquipeId, :EquipeCategorie)';
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'EquipeId' => $EquipeId,
        ]);
    } catch (\PDOException $e) {
        die("Erreur lors de l'ajout de l'équipe : " . $e->getMessage());
    }
}

/*
Fonction selectOptionsAvtiveclub_basket
---------------------------------------
BUT: aller rechercher dans la base de donnée les caractéristiques des options du club afiché
IN: $pdo reprenant toutes les informations de connexion
OUT: objet pdo contenant la liste des options du club de basket afiché
*/
    
function selectOptionsActiveclub_basket($pdo)
{
    try{
        $query = "select * from optionscolaire where optionscolaire in (select optionsolairefrom option_ecolewhere scoolId = :schoolId);";
                    
        $selectclub_basket = $pdo->prepare($query);
        $selectclub_basket->execute([
            "club-BasketId" => $_GET["club_basketId"]
        ]);
        $option = $selectclub_basket->fetch();
        return $option;
    } catch(PDOException $e) 
    {
        $message = $e->getMessage();
        die($message);
    }
}
/*  
function updateclub_basket
---------------------------
BUT: mettre à jour les données du club de basket actif dans la table club_basket
IN: $pdo reprennat toutes les informations de connexion
*/
function updateclub_basket($dbh)
{
    try
    {
        $query = "updateclub_basket set club_basketNom = :club_basketNom, club_basketAdresse= :club_basketAdresse
        club_basketVille = :club_basketVille, club_basketCodePostal = :club_basketCodePostal, 
        , club_basketImage = : club_basketImage where club_basketId = :club_basketid";
        $updateclub_basketFromId = $dbh->prepare($query);
        $updateclub_basketFromId->execute([
            'club_basketNom' => $_POST['nom'],
            'club_basketAdresse' => $_POST['Adresse'],
            'club_basketCodePostal' => $_POST['Code Postal'],
            'club_basketVille' => $_POST["Ville"],
            'club_basketImage' => $_POST["Image"],
            'club_basketId' => $_GET["club_basket"]
        ]);

    }catch (PDOException $e) 
    {
        $message = $e->getMessage();
        die($message);
    }
}
function deleteOptionEquipe($dbh)
{
    try
    {
        $query= 'delete from OptionEquipe where club_basketId = :club_basketId';
        $deleteAllclub_basketFromId = $dbh->prepare($query);
        $deleteAllclub_basketFromId->execute([
            'club_basketId' => $_GET["club_basketId"]
        ]);
    }catch (PDOException $e)
    {
        $message = $e->getmessage();
        die($message);
    }

}
function deleteOneclub_basket($pdo)
{
    try
    {
        $query ='delete from club_basket where club_basketId = :club_basketId';
        $deleteAllclub_basketFromId = $pdo->prepare($query);
        $deleteAllclub_basketFromId->execute([
            'club_basket' => $_GET["club_basketId"]
        ]);
    }catch (PDOException $e)
    {
        $message = $e->getmessage();
        die($message);
    }
}

