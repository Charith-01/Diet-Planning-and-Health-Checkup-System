<!DOCTYPEhtml>
<html>
    <head>
        <title>Clinic Appointment</title>
        <link rel="stylesheet" href="../CSS/clinic.css">
        
    </head>
    <body>
        <div class="c1">
            <h2>List of clinic Appointments</h2>
            <button><a class="btn" href="register.php">New Appointment</a></button>
            <button><a class="btn" href="../dashboard/admin_dashboard.php">Back Previous Page</a></button>
            
            <br>
            <table class="table" border="1"  width="98%">
                <tr>
                    <th>Appointment Id</th>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Clinic Type</th>
                    <th>Appointment Date</th>
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
                $sql="SELECT * FROM appointments";
                $result=$conn->query($sql);

                if(!$result){
                    die("Invalid query:".$conn->error);
                }

                //read data of each row
                
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>{$row['appointmentId']}</td>
                        <td>{$row['patientName']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['clinicType']}</td>
                        <td>{$row['appointmentDate']}</td>
                        <td>
                            <button class='btn' style='text-align: center; margin: 20px 0;'><a href='editAppointment.php?appointmentId={$row['appointmentId']}'>Edit</a></button>
                            <button  class='btn' style='text-align: center; margin: 20px 0;'><a  href='deleteAppointment.php?appointmentId={$row['appointmentId']}'>Delete</a></button>
                        </td>
                    </tr>
                    ";
                    }
                ?>   
            </table>      
        </div>    
    </body>
</html>
    
