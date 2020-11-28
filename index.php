<?php
require 'app/config.php';
$user_id = $_SESSION['user_id'];
$tasks = $connection->query("SELECT id, description, done, due_date FROM tasks where user_id = $user_id");
$tasks = $tasks->num_rows > 0 ? $tasks : [];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>المساعد الشخصي ﻷدارة المهام</title>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <div class="container">
            <h1 class="header"> مهماتي </h1>
            <?php if(empty($tasks)): ?>
                    <p>لم تقم بإضافة أي مهمه للقيام بها</p>
            <?php else: ?>

            <ul class="tasks">
                <?php foreach ($tasks as $task): ?>
                <li>
                    <span class="task  <?php echo $task['done'] ? 'done' : ''?>"><?php echo $task['description']?></span>
                    <?php if($task['done']): ?>
                        <a class="done-button" href="app/delete.php?task_id=<?php echo $task['id']?>"> حذف المهمه </a>
                    <?php else:?>
                        <a class="done-button" href="app/mark.php?task_id=<?php echo $task['id']?>"> تم اﻷنجاز </a>
                    <?php endif;?>
                    <?php $task['due_date'] = strtotime($task['due_date'])?>
                    <p class="date">اخر تاريخ لإنجاز المهمة : <?php echo date('Y-m-d',$task['due_date'])?> </p>
                </li>
                <?php endforeach;?>
            </ul>
            <?php endif;?>
            <?php
                if($_SESSION['errors']){
                    foreach ($_SESSION['errors'] as $error){
                        echo "<p class=\"error\">$error</p>";
                    }
                }
                $_SESSION['errors'] = [];
            ?>
            <form class="task-add" action="app/add.php" method="POST">
                <input type="text" placeholder="أدخل وصف مهمه جديدة هنا" class="input" name="task_name">
                <input type="text" placeholder="أدخل اخر تاريخ لإنجاز المهمه مثال ١/١/٢٠٢١" class="input" name="due_date">
                <input type="submit" value="أضف" class="submit">
            </form>
        </div>
    </body>
</html>