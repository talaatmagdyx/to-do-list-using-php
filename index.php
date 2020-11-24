<!DOCTYPE html>
<html>
    <head>
        <title>المساعد الشخصي ﻷدارة المهام</title>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <div class="container">
            <h1 class="header"> مهماتي </h1>
            <ul class="tasks">
                <li>
                    <span class="task"> وصف المهمة</span>
                    <a class="done-button" href="#"> تم اﻷنجاز </a>
                    <p class="date">اخر تاريخ لإنجاز المهمة : 2020-11-24</p>
                </li>
            </ul>
            <form class="task-add" action="app/add.php" method="POST">
                <input type="text" placeholder="أدخل وصف مهمه جديدة هنا" class="input" name="task_name">
                <input type="text" placeholder="أدخل اخر تاريخ لإنجاز المهمه مثال ١/١/٢٠٢١" class="input" name="due_date">
                <input type="submit" value="أضف" class="submit">
            </form>
        </div>
    </body>
</html>