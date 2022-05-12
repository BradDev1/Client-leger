<?php 
session_start();
$bdd = new PDO('mysql:host=127.0.0.1:3307;dbname=fpec', 'root', '',);
$bdd->exec("SET NAMES 'UTF8'");
?>