<?php
session_start();

$servername = "localhost";
$dbname = "planeja-financas";
$username = "root";
$pwd = "";

try{
    $pdo = new PDO ("mysql:host=$servername;dbname=$dbname" , "$username" , "$pwd");
    // echo "Conectado com sucesso!";
    $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
} catch(Exception $e){
    die (print_r ($e->getMessage()));
}

