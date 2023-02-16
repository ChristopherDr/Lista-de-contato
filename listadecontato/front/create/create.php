<?php

require "../../connection.php";
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

 //Pega as informações passadas pelo fetch(no body) e retorna um objeto.
$dados = json_decode(file_get_contents("php://input"));
$name = $dados->name; // acessa o valor da propriedade "name" no objeto $dados.
$tel = $dados->tel;
$email = $dados->email;

try {
    $sttm = $conn->prepare("INSERT INTO users (name) VALUES (:name)"); //prepara o SQL
    $sttm -> bindParam(":name", $name);
    $sttm->execute(); // executa o SQL na tabela USERS inserindo o usuário.
    $id = $conn->lastInsertId(); // pega o último ID criado.

       //com o id do usuario, cadastra as outras informações do usuário na tabela contacts.
    $sttm2 = $conn->prepare("INSERT INTO contacts (email, number, user_id) VALUES (:email, :number, :user_id)");
    $sttm2->bindParam(":email", $email);  //bind para deixar mais seguro.
    $sttm2->bindParam(":number", $tel);
    $sttm2->bindParam(":user_id", $id);
    $sttm2->execute(); // executando o sql nno banco.
    echo "Usuário cadastrado com sucesso!";

 } catch (Exception $e) {
        die("Ops, deu algo errado");
 }
