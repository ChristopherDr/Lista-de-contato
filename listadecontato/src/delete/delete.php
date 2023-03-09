<?php

require "../../connection.php";

if($trigger == 1){
    $data = $_GET['id'];
    if (isset($data) == true && is_numeric($_GET['id']) == true){
        try{
            $sttm =  $conn -> prepare("DELETE FROM contacts WHERE user_id = :id");
            $sttm -> bindParam(":id", $data);
            $sttm -> execute();

            $sttm2 = $conn -> prepare("DELETE FROM  users WHERE id = :id");
            $sttm2 -> bindParam(":id", $data);
            $sttm2 -> execute();

            //echo("Usuario deletado com sucesso!");
        }catch(PDOException $e){
            die("Deu erro");
        }
    }else{
        echo "Não é possível realizar a ação, pois não foi escolhido um usuário para apagar";
    }

}else{
    echo "Não é possível realizar a ação, pois não há conexão com o banco";
}

