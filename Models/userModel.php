<?php
function createUser($pdo)
{
    try {
        $query = 'insert into utilisateur (nomUser, prenomUser, loginUser, passWordUser, emailUser, role)
        values (:nomUser, :prenomUser, :loginUser, :passWordUser, :emailUser, :role)';
        $ajouteUser = $pdo->prepare($query);
        $ajouteUser->execute([
            'nomUser' => $_POST['nom'],
            'prenomUser' => $_POST['prenom'],
            'loginUser' => $_POST['login'],
            'passWordUser' => $_POST['mot_de_passe'],
            'emailUser' => $_POST['email'],
            'role' => 'user'
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message); }
    
}

function connectUser($pdo)
{
    try {
        $query = 'select * from utilisateur where loginUser = :loginUser and passWordUser = :passWordUser';
        $connectUser = $pdo->prepare($query);
        $connectUser->execute([
            'loginUser' => $_POST['login'],
            'passWordUser' => $_POST['mot_de_passe']
        ]);
        $user = $connectUser->fetch();
        if (!$user) {
            return false;
        }
        else {
            $_SESSION['user'] = $user;
            return true;
        }
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function updateUser($pdo)
{
    try {
        //définition de la reqiête de mise à jour en utilisant la notion de paramètre
        //sans oublier le critère ! pour ne pas modifier toutes les lignes de la tables utilisateur !
        $query = 'update utilisateur set nomUser = :nomUser, prenomUser = :prenomUser, passWordUser = :passWordUser, emailUser = :emailUser where id = :id';
        $ajouteUser = $pdo->prepare($query);
        $ajouteUser->execute([
            'nomUser' => $_POST['nom'],
            'prenomUser'=> $_POST['prenom'],
            'passWordUser' => $_POST['mot de passe'],
            'emailUser' => $_POST['email'],
            'id' => $_SESSION['user']->id
        ]);
    } catch (PDOEXCEPTION $e) {
        $message = $e->getMessage();
        die($message);
    }

    
}

function updateSession($pdo)
{
    try {
        $query = 'select * from utilisateur where id = :id';
        $selectUser = $pdo->prepare($query);
        $selectUser->execute([
            'id' => $_SESSION['user']->id
        ]);
        $user = $selectUser->fetch();
        $_SESSION['user'] = $user;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function DeleteUser($pdo)
{
    try {
        $query = 'delete from utilisateur where id = :id';
        $delUser = $pdo->prepare($query);
        $delUser->execute([
            'id' => $_SESSION['user']->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}



