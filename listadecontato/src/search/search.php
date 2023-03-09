<?php

require "../../connection.php";

if($trigger == 1){
    $data = json_decode(file_get_contents("php://input"));
    $search = "%$data%";

    try{
        $sttm = $conn -> prepare("SELECT users.id, users.name, contacts.email, contacts.number FROM users INNER JOIN contacts ON
        users.id = contacts.user_id WHERE users.name LIKE :search OR contacts.email LIKE :search OR contacts.number LIKE :search");
        $sttm -> bindParam(':search', $search);
        $sttm -> execute();
        $dat = $sttm -> fetchAll(PDO::FETCH_ASSOC);

    }catch(PDOEXCeption $e){
        die($e);
    }

    echo json_encode($dat);
}else{
   echo "Não é possível completar a ação, pois não há conexão com a base de dados";

}




