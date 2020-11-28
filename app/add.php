<?php
    // call config file
    require 'config.php';
    // validate date and change format
    function validate_date($date_string){
        if($time = strtotime($date_string)){
            return $time;
        }
        return false;
    }
    // $_SERVER --> use to know type of api and params
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        # check if task name and date exist or not
        if(!empty($_POST['task_name']) and !empty($_POST['due_date'])){
            if($due_date = validate_date($_POST['due_date'])) {
                // save value in db
                $description = $_POST['task_name'];
                $due_date = date('Y-m-d H:i:s', $due_date);
                // insert new task
                $connection->query("INSERT INTO tasks(description, due_date, user_id)
                                          VALUEs('".$description."', '".$due_date."', '".$_SESSION['user_id']."')");
            } else{
                // not save and return value to user
                // invalid date
                $errors['invalid_date'] = 'يجب أن تكتب التاريخ بصورة صحيحة';
                $_SESSION['errors'] = $errors;

            }
        }else{
            if(empty($_POST['task_name'])){
                $errors['required_name'] = 'يجب أن تقوم بكتابة وصف مهمه ';
            }
            if(empty($_POST['due_date'])){
                $errors['invalid_date'] = 'يجب أن تعين أخر مهلة لأنجاز المهمه ';
            }
            $_SESSION['errors'] = $errors;
        }
        header('location: ../index.php');
    }
