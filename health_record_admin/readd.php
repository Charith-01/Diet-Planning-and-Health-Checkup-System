<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Health Records</h2><br>

        <a class="btn btn-primary" href="indexx.php" role="button">ADD New User</a>
        <a class="btn btn-secondary" href="../dashboard/admin_dashboard.php" role="button">Back Previous Page</a>

        <table class="table">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Date</th>
                    <th>Surgeries</th>
                    <th>Allergies</th>
                    <th>Smoke</th>
                    <th>Alcohol</th>
                    <th>Vision</th>
                    <th>Headaches</th>
                    <th>Glucose</th>
                    <th>Cholesterol</th>
                    <th>Pressure</th>
                    <th>Action</th>
                </tr>
            </thead>
       
            <tbody>
                <?php
                require 'configg.php';
                
                $sql="SELECT * FROM healthrec";
                $result=$con->query($sql);
                if(!$result)
                {
                    die("Invalid query :".$con->error);
                }
                while($row=$result->fetch_assoc())
                {
                    echo "
                    <tr>
                    <td>$row[uname]</td>
                    <td>$row[date]</td>
                    <td>$row[surgeries]</td>
                    <td>$row[allergies]</td>
                    <td>$row[smoke]</td>
                    <td>$row[alcohol]</td>
                    <td>$row[vision]</td>
                    <td>$row[headaches]</td>
                    <td>$row[glucose]</td>
                    <td>$row[cholesterol]</td>
                    <td>$row[pressure]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='upindex.php'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='dindex.php'>DELETE</a>
                    </td>

                </tr>

                    ";
                }
                    echo "</table>";
                ?>
                
            </tbody>
    </div>
</body>
</html>