<?php


$todos=[];
if(file_exists('todo.json')){
    $json=file_get_contents('todo.json');
    $todos=json_decode($json,true);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="newtodo.php" method="post" style="margin-bottom:10px;">
        <input type="text" name="todo_name" placeholder="Enter Your Todo">
        <button>New Todo</button>
    </form>
    <?php 
    
    foreach($todos as $todoname=>$todo):?>
    <div style="margin-bottom: 20px;">
        <form style="display: inline-block;" action="change.php" method="post">
            <input type="hidden" name="todo_name" value="<?php echo $todoname;  ?>">
            <input type="checkbox" <?php echo $todo['complete']?"checked":"" ; ?> >
        </form>
        <?php echo ($todoname );?>
        <form style="display:inline-block;" action="delete.php" method="post">
            <input type="hidden" name="todo_name" value="<?php echo $todoname;  ?>">
            <button>Delete</button>
        </form>
    </div>
    <?php endforeach;?>


    <script>
        const checkbox = document.querySelectorAll('input[type=checkbox]');
        checkbox.forEach(element => {
            element.onclick = function(){
                this.parentNode.submit();
            };
            
        });
    </script>
</body>
</html>