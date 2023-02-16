<?php

require "../../connection.php";

$data = $_GET['id'];

try{
    $sttm =  $conn -> prepare("DELETE FROM contacts WHERE user_id = :id");
    $sttm -> bindParam(":id", $data);
    $sttm -> execute();

    $sttm2 = $conn -> prepare("DELETE FROM  users WHERE id = :id");
    $sttm2 -> bindParam(":id", $data);
    $sttm2 -> execute();

    echo("Usuario deletado com sucesso!");
}catch(PDOException $e){
    die("Deu erro");
}