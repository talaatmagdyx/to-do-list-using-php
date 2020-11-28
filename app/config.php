<?php
session_start();
$_SESSION['user_id'] = 1 ;
$server_name = 'localhost';
$user_name = 'root';
$password = '';
$dbname = 'to_do';
// start connection with mysql
$connection = new mysqli($server_name, $user_name, $password, $dbname);
// use standard format for data send to my sql
// importance for arabic word
mysqli_set_charset($connection, 'utf8');
// check error when connect with mysql
if($connection->connect_error) {
    echo "$connection->connect_error فشل اﻷتصال بقاعدة البيانات ";
}else{
    echo "  نم اﻷتصال بقاعدة البيانات بنجاح ";
}