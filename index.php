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
        console.log("in ready");
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
            url: "/postData.php",
            type: 'POST',
            dataType: 'JSON',
            data: {
                name: name,
                position: position,
                date: date,
            },
            success: function(data) {
                alert(data);
            },
            error: function(data) {
                alert("Error");
            }
        });
    }

    function retrieveTasks() {
        console.log('in retirvetasks');
        $.ajax({
            url: "/getData.php",
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
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
                            <th scope="col">Id</th>
                            <th scope="col">Task</th>
                            <th scope="col">Position</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm scroll">
                <strong style="color:blue;"> Right Up </strong>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Task</th>
                            <th scope="col">Position</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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
                            <th scope="col">Id</th>
                            <th scope="col">Task</th>
                            <th scope="col">Position</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm scroll">
                <strong style="color:blue;">Right Down </strong>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Task</th>
                            <th scope="col">Position</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </div>
</body>

</html>