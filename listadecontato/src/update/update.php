<?php

require "../../connection.php";

// error_reporting(E_ALL);
// ini_set("display_errors", 1);


if($trigger == 1){
    $data = json_decode(file_get_contents("php://input"));

    $id = $data->id;
    $name = $data->name;
    $email = $data->email;
    $tel = $data->tel;

    try{
    $sqlUsers =  "UPDATE users SET name = :name WHERE id = :id;";

    $sttmUsers = $conn -> prepare($sqlUsers);
    $sttmUsers -> bindParam(":id", $id);
    $sttmUsers -> bindParam(":name", $name);
    $sttmUsers -> execute();

    $count = $sttmUsers -> rowCount();

    if($count == 1){
        $sqlContacts = " UPDATE contacts SET email = :email, number = :tel WHERE user_id = :id ;";

        $sttmContacts = $conn -> prepare($sqlContacts);
        $sttmContacts -> bindParam(":id", $id);
        $sttmContacts -> bindParam(":email", $email);
        $sttmContacts -> bindParam(":tel", $tel);
        $sttmContacts -> execute();

        $messsage = " O usuário foi alterado com sucesso!";
        echo json_encode($messsage);


    }else{
        $messsage = "Não foi possível realizar a alteração";
        echo json_encode($messsage);
    }

    }catch(PDOException $e){
        //echo $e;
        //die("Deu ruim");
    }
}else{
    $messsage = "Não é possível completar esta ação pois não há conexão com a base de dados";
    echo json_encode($messsage);
}



