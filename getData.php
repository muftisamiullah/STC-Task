<?php require "config.php"; 
try{
        //header('Content-Type: application/json');
        $conn=new PDO($dsn,$username,$password,$options);
        $sql="Select * from tasks ORDER BY dueDate DESC";
        $statement=$conn->prepare($sql);   
        $statement->execute();
        $result = $statement->fetchAll();
        echo json_encode($result);
    }
    catch(PDOException $e){
        echo $sql ."<br> ".$e->getmessage();
    }

    ?>