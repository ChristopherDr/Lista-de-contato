<?php

require "../../connection.php";


//$data = urldecode($_GET['term']);

$sql = "SELECT users.id, users.name, contacts.email, contacts.number FROM users INNER JOIN contacts ON users.id = contacts.user_id GROUP BY users.id";
$sttm = $conn -> prepare($sql);
$sttm -> execute();
$dat = $sttm -> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($dat);