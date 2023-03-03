<?php
try{
    //connexion à la base
    $db = new PDO('mysql:host=localhost;dbname=crud', 'root','');
    $db->exec('SET NAMES "UTF8"');
}catch(PDOExecption $e){
    echo 'Erreur :' . $e->getMessage();
    die();
}