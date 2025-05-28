

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
/*
Fonction selectMyclub_Basket
----------------------------
BUT: aller rechercher les caractéristiques des clubs de basket de l'utilisateur conncté dans la base de donnée
IN: $pdo reprenant toutes les informations de connexion
OUT: objet pdo contenant les écoles de l'utilisateur connecté de la base de donnée 
*/
function selectMyclub_Basket($pdo)
{
    try{
        //requête avec critère et paramètre !
        $query = "select * from school where utilisateurId = :utilisateurId";
        $selectclub_Basket = $pdo->prepare($query);
        $selectclub_Basket->execute([
            //le paramètre est l'ID de l'utilisateur connecté
            "utilisateurId" => $_SESSION["user"]->id
        ]);
        $club_Basket = $selectclub_Basket->fetchAll();
        return $club_Basket;
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
        $query = "SELECT * FROM club_Basket";
        $selectEquipes = $pdo->prepare($query);
        $selectEquipes->execute();
        $club_Basket = $selectEquipes->fetchAll();
        return $club_Basket;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
/*
fonction createclub_Basket 
-------------------------------
BUT: ajouter les données d'un club de basket encodées dans la table club_Basket
IN: $pdo reprenant toutes les information de connexion 
*/
function createclub_Basket($pdo)
{
    try {
        $query = 'insert into club_basket (club_BasketNom, club_BaskteImage, utiId, club_BasketAdresse, club_BaketTel)
        values (:recetteNom, :recetteImage, :utilisateurId)';
        $addclub_Basket = $pdo->prepare($query);
        $addclub_Basket->execute([
            'club_BasketNom' => $_POST['nom'],
            'club_BasketAdresse' => $_POST ['Adresse'],
            'club_BasketVille' => $_POST ['Ville'],
            'club_BasketCodePostal' => $_POST['code_postal'],
            'club_BasketImage' => $_POST['image'],
            'utilisateurId' => $_SESSION['user']->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
/*
Fonction selectOneclub_Basket
------------------------------
BUT: aller rechercher les caractéristiques du club de basket actif dans la base de donnée
IN: $pdo reprenant toutes les informations de connexion
OUT: objet pdo contenant toutes les informations concernat le club de basket actif
*/
function selectOneclub_Basket ($pdo)
{
    try{
        $query = "select * from club_Basket where club_BasketId = :club_BasketId";
        $selectclub_Basket = $pdo->prepare($query);
        $selectclub_Basket->execute([
            "cl" => $_GET["club_BasketId"] // récupération du paramètre se trouvant dans l'adresse
        ]);
        $club_Basket = $selectclub_Basket->fetch(); //récupération d'un enregistrement (pas fetchAll)
        return $club_Basket;
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
Fonction selectOptionsAvtiveclub_Basket
---------------------------------------
BUT: aller rechercher dans la base de donnée les caractéristiques des options du club afiché
IN: $pdo reprenant toutes les informations de connexion
OUT: objet pdo contenant la liste des options du club de basket afiché
*/
    
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

