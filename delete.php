<?php 

    $json=file_get_contents('todo.json');
    $todos=json_decode($json,true);
    $todoname=$_POST['todo_name'];
    unset($todos[$todoname]);
    file_put_contents('todo.json',json_encode($todos,JSON_PRETTY_PRINT));
    header("Location:index.php");  

?>