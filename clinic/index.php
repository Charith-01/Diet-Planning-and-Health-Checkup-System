<!DOCTYPEhtml>
<html>
    <head>
        <title>Clinic</title>
        <link rel="stylesheet" href="../CSS/clinic.css">
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    </head>
    <body>
        <div class="c1">
            <h2>List of clinics</h2> 
            <a href="create.php" class="btn">New Clinic</a>
            <a href="../dashboard/admin_dashboard.php" class="btn">Back Previous Page</a>
            <br>
            <table class="table" border="1"  width="98%">
                <tr>
                    <th>Clinic Id</th>
                    <th>Image</th>
                    <th>Clinic Name</th>
                    <th>Doctor-In-Charge</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>

                <?php
                $servername="localhost";
                $username="root";
                $password="";
                $database="diet_planning_&_health_checkup_system";

                //create connection
                $conn=new mysqli($servername,$username,$password,$database);

                //check connection
                if($conn->connect_error){
                    die ("Connection failed:".$conn->connect_error);
                }

                //read all row from database
                $sql="SELECT * FROM clinicdetails";
                $result=$conn->query($sql);

                if(!$result){
                    die("Invalid query:".$conn->error);
                }

                //read data of each row
                
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>{$row['clinicId']}</td>
                        <td><img src='" . $row['clinicImage'] . "' alt='Clinic Image' style='width: 40%; height: 40px; object-fit: cover;'/></td>
                        <td>{$row['clinicName']}</td>
                        <td>{$row['staffInCharge']}</td>
                        <td>{$row['address']}</td>
                        <td>
                            <button><a class='btn' href='edit.php?clinicId={$row['clinicId']}'>Edit</a></button>
                            <button><a class='btn' href='delete.php?clinicId={$row['clinicId']}' >Delete</a></button>
                        </td>
                    </tr>
                    ";
                    }
                ?>    
            </table>  
        </div>    
    </body>
</html>