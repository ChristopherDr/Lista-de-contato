<?php

require "../../connection.php";


$data = json_decode(file_get_contents("php://input"));



$sql = "SELECT users.name, contacts.email, contacts.number
FROM users
JOIN contacts ON users.id = contacts.user_id
WHERE users.name LIKE '%{$data}%' OR contacts.email LIKE '%{$data}%' OR contacts.number LIKE '%{$data}%'
";
$sttm = $conn -> prepare($sql);
$sttm -> execute();
$dat = $sttm -> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($dat);