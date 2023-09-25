<?php 
    
    echo '<pre>';
    print_r($_POST['todo_name']);
    echo '</pre>';


    $json=file_get_contents('todo.json');
    $todos=json_decode($json,true);
    $todoname=$_POST['todo_name'];
    $todos[$todoname]['complete']=!$todos[$todoname]['complete'];
    file_put_contents('todo.json',json_encode($todos,JSON_PRETTY_PRINT));
    header("Location:index.php");  


?>