<?php
    $todolist=$_POST['todo_name'];
    $todolist=trim($todolist);
    if($todolist){
        if(file_exists('todo.json')){
            $json=file_get_contents('todo.json');
            $jsonArray=json_decode($json,true);
        }
        else{
            $jsonArray=[];
        }
        $jsonArray[$todolist]=["complete"=>false];
        file_put_contents('todo.json',json_encode($jsonArray,JSON_PRETTY_PRINT));
    }
   header('Location:index.php');

?>