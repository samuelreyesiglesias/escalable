<?php
//set the db connection
$user = "root";
$pass = "";
//$conn = new PDO('mysql:host=localhost;dbname=project', $user, $pass);
$conn = null;
//connnect if not exist database project connect and create it 
try {
    $conn = new PDO('mysql:host=localhost', $user, $pass);
    $sql = "CREATE DATABASE IF NOT EXISTS project";
    $conn->exec($sql);
    $conn->exec("use project");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

//create table
?>