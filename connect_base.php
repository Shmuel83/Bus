<?php
//Connection to Database MySQL
global $connexion;
global $db;
try {
@$connexion=new PDO("mysql:host='".HOST_MYSQL."';dbname='".DB_MYSQL."', '".USER_MYSQL."', '".PASS_MYSQL."'");
$connexion->query('SET NAMES utf8');
} catch (PDOException $erreur) {
    
        echo '<p style="text-align:center;">La base de donnée n\'est pas disponible</p>';
}
?>