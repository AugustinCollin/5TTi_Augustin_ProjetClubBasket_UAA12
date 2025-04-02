<?php


try{
    $strConnexion = "mysql:host=10.10.51.98;dbname=augustin";
    $pdo= new PDO($strConnexion,"Augustin","root",[
        PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
}   catch (PDOException $e) {
    $message = $e->getMessage();
    die($message);
}
?>