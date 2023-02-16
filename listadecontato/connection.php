<?php

$host = 'sql306.epizy.com';
$dbname = 'epiz_33481678_listadecontato';
$user = 'epiz_33481678';
$pass = 'CEPt3pNhQWKUd';

error_reporting(E_ALL);

ini_set("display_errors", 1);


try {
    $conn = new PDO ("mysql:host=$host;dbname=$dbname", "$user", "$pass");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }catch(PDOException $e) {
        echo "A sua conexão com o banco de dados falhou: " . $e->getMessage();
    }
