<?php

require "../../connection.php";

if($trigger == 1){
    try{
        $sql = "SELECT users.id, users.name, contacts.email, contacts.number FROM users INNER JOIN contacts ON users.id = contacts.user_id GROUP BY users.id";
        $sttm = $conn -> prepare($sql);
        $sttm -> execute();
        $dat = $sttm -> fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOEXCeption $e){
        //echo$e;
    }
    echo json_encode($dat);
}else{
    echo "Não é possível realizar a ação, pois não há conexão com o banco";
}



