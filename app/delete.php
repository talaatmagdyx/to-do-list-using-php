<?php
require 'config.php';
if(!empty($_GET['task_id'])){
    $connection->query(" Delete From tasks WHERE id = ".$_GET['task_id']." AND user_id = ".$_SESSION['user_id']." ");
}
header('location: ../index.php');
