<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>User Management</title>
</head>
<body>

    <div class="container my-5">
        <h2>List of users</h2>
        <a class="btn btn-primary" href="user_create.php" role="button">ADD New User</a>
        <a class="btn btn-secondary" href="admin_dashboard.php" role="button">Back Previous Page</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>User</th>
                    <th>Mail</th>
                    <th>Number</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>BMI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $database="diet_planning_&_health_checkup_system";

                    //create connection
                    $conn= new mysqli($servername,$username,$password,$database);

                    if($conn->connect_error){
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql="SELECT * FROM user_registration";
                    $result=$conn->query($sql);

                    if(!$result){
                        die("Invalid query: " . $conn->error);
                    }

                    while($row=$result->fetch_assoc()){
                        echo "
                            <tr>
                                <td>$row[user_id]</td>
                                <td>$row[full_name]</td>
                                <td>$row[user_name]</td>
                                <td>$row[mail]</td>
                                <td>$row[pnum]</td>
                                <td>$row[age]</td>
                                <td>$row[gender]</td>
                                <td>$row[height]</td>
                                <td>$row[weight]</td>
                                <td>$row[bmi]</td> 
                                <td>
                                    <a class='btn btn-primary btn-sm' href='user_edit.php?user_id=$row[user_id]'>Edit</a>
                                    <a class='btn btn-danger btn-sm' href='user_delete.php?user_id=$row[user_id]'>Delete</a>
                                </td>
                            </tr>
                            ";
                        }
                ?>

            </tbody>
        </table>
    </div>
</body>
</html>