<?php

require "../../connection.php";

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$name = $data->name;
$email = $data->email;
$tel = $data->tel;

try{

$sql =  "UPDATE users SET name = :name WHERE id = :id;
UPDATE contacts SET email = :email, number = :tel WHERE user_id = :id";
$sttm = $conn -> prepare($sql);
$sttm -> bindParam(":id", $id);
$sttm -> bindParam(":name", $name);
$sttm -> bindParam(":email", $email);
$sttm -> bindParam(":tel", $tel);

$sttm -> execute();

echo "Deu certo";

}catch(PDOException $e){
    echo $e;
    die("Deu ruim");
}