<?php

require "../connection.php"; //conecta ao banco de dados

$dados = file_get_contents("php://input");  //pego as informações passadas pelo fetch no front/js(body).
$dados = json_decode($dados); // "Desencodo" o código de json para um obj.

$name = $dados -> name; // Pega o valor do atributo "nome" no obj $dados.
$tel = $dados -> tel;
$email = $dados -> email;

$sttm = $conn -> prepare("SELECT * FROM Users"); //prepara o sql para rodar no banco de dados
$sttm -> execute(); //executa a query no banco de dados
$data = $sttm -> fetchAll(PDO::FETCH_ASSOC); // pega todas as informações do banco de dados


json_encode($data); //"encoda" as informações em formato json

var_dump($data);