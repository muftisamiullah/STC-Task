<?php 
require "config.php";
require "getData.php";
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
    }
    catch(PDOException $e){
        echo $sql ."<br>".$e->getmessage();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>STC - Task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript">
    // my custom script
    $(document).ready(function() {
        retrieveTasks();
        // Save Function
        $(document).on('click', '#addTask', function() {
            addTask();
        });
    });

    function addTask() {
        var name = $('#taskName').val();
        var position = $('#taskPosition').val();
        var date = $('#taskDate').val();

        $.ajax({
            url: "/index.php",
            type: 'POST',
            dataType: 'JSON',
            data: {
                name: name,
                position: position,
                date: date,
            },
            success: function(data) {
                console.log(data);
                console.log('success');
                // document.getElementById("sss").style.display = "block";
                alert(data);
            },
            error: function(data) {
                console.log(data);
                console.log('error');
                // document.getElementById("sss").style.display = "block";
                alert(data);
            }
        });
    }

    function retrieveTasks() {
        $.ajax({
            url: "/getData.php",
            type: 'GET',
            dataType:'JSON',
            success: function(data) {
                console.log("hello");
                console.log(data);
            }
        });
    }
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- <form method="post"> -->
                <br>
                <h1><strong style="color:blue;">TODOLIST:</strong></h1>
                <div class="form-group">
                    <label for="exampleInputEmail1">Add Task</label>
                    <input type="text" class="form-control" id="taskName" aria-describedby="emailHelp"
                        placeholder="Enter task" name="name" required>
                </div>
                <div class="form-group">
                    <label for="pos">Position</label>
                    <select class="form-control" id="taskPosition" name="pos">
                        <option value="0">left up</option>
                        <option value="1">right up</option>
                        <option value="2">left down</option>
                        <option value="3">right bottom</option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control" type="date" id="taskDate" name="date" required>
                </div>
                <div class="sss">Task added successfully</div>
                <button type="submit" id="addTask" class="btn btn-primary float-right" value="Add"
                    name="addTask">Add</button>
                <!-- </form> -->
            </div>
        </div>
    </div>
    <hr><br><br>
    <div class="container">
        <div class="row text-center">
            <div class="col-sm scroll">
                <strong style="color:blue;">left Up </strong>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Task</th>
                            <th scope="col">Position</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $task):
                        if ($task['taskPosition']==0):?>
                        <tr>
                            <td><?php echo ($task['taskName']); ?></td>
                            <td><?php echo ($task['taskPosition']); ?></td>
                            <td><?php echo ($task['dueDate']); ?></td>
                            <td><a href="#">Edit</a>
                            <td>
                        </tr>
                        <?php endif; endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm scroll">
                <strong style="color:blue;"> Right Up </strong>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Task</th>
                            <th scope="col">Position</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $task):
                        if ($task['taskPosition']==1):?>
                        <tr>
                            <td><?php echo ($task['taskName']); ?></td>
                            <td><?php echo ($task['taskPosition']); ?></td>
                            <td><?php echo ($task['dueDate']); ?></td>
                            <td><a href="#">Edit</a>
                            <td>
                        </tr>
                        <?php endif; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr><br>
        <div class="row text-center">
            <div class="col-sm scroll">
                <strong style="color:blue;">Left Down</strong>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Task</th>
                            <th scope="col">Position</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $task):
                        if ($task['taskPosition']==2):?>
                        <tr>
                            <td><?php echo ($task['taskName']); ?></td>
                            <td><?php echo ($task['taskPosition']); ?></td>
                            <td><?php echo ($task['dueDate']); ?></td>
                            <td><a href="#">Edit</a>
                            <td>
                        </tr>
                        <?php endif; endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm scroll">
                <strong style="color:blue;">Right Down </strong>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Task</th>
                            <th scope="col">Position</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $task):
                        if ($task['taskPosition']==3):?>
                        <tr>
                            <td><?php echo ($task['taskName']); ?></td>
                            <td><?php echo ($task['taskPosition']); ?></td>
                            <td><?php echo ($task['dueDate']); ?></td>
                            <td><a href="#">Edit</a>
                            <td>
                        </tr>
                        <?php endif; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </div>
</body>

</html>