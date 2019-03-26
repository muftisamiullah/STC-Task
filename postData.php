<?php 
require "config.php";
if(isset($_POST['name'])){
    try{
        $conn=new PDO($dsn,$username,$password,$options);
        $sql="INSERT INTO tasks (taskName,taskPosition,dueDate) VALUES(:name,:position,:day)";
        $statement=$conn->prepare($sql);
        $statement->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
        $statement->bindParam(":position", $_POST['position'],PDO::PARAM_STR);
        $statement->bindParam(":day", $_POST['date'],PDO::PARAM_STR);
        $statement->execute();
        $message="Task added successfully";
        echo json_encode($message);
    }
    catch(PDOException $e){
        echo $sql ."<br>".$e->getmessage();
    }
}
?>