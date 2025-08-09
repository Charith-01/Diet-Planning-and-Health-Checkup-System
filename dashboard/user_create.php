<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="diet_planning_&_health_checkup_system";

    $conn= new mysqli($servername,$username,$password,$database);

    $fname="";
    $uname="";
    $mail="";
    $number="";
    $age="";
    $gender="";
    $height="";
    $weight="";
    $bmi="";
    $password="";

    $errorMessage="";
    $successMessage="";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $fname=$_POST["name"];
        $uname=$_POST["uname"];
        $mail=$_POST["mail"];
        $number=$_POST["number"];
        $age=$_POST["age"];
        $gender=$_POST["gender"];
        $height=$_POST["height"];
        $weight=$_POST["weight"];
        $bmi=$_POST["bmi"];
        $password=$_POST["password"];

        do{
            if(empty($fname) || empty($uname) || empty($mail) || empty($number) || empty($age) || empty($gender) || empty($height) || empty($weight) || empty($bmi) || empty($password)){
                $errorMessage="All the fields are required";
                break;
            }

            //add new user to database
            $encpwd = password_hash($password,PASSWORD_DEFAULT);

            $sql="INSERT INTO user_registration (user_id,full_name,user_name,mail,pnum,age,gender,height,weight,bmi,pw1) VALUES ('','$fname','$uname','$mail','$number','$age','$gender','$height','$weight','$bmi','$encpwd')";
            $result=$conn->query($sql);

            if(!$result){
                $errorMessage="Invalid query: ".$conn->error;
                break;
            }

            $fname="";
            $uname="";
            $mail="";
            $number="";
            $age="";
            $gender="";
            $height="";
            $weight="";
            $bmi="";
            $password="";

            $successMessage="User added correctly";

            header("location: user_management.php");
            exit();

        }while(false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Create</title>
</head>
<body>
    <div class="container my-5">
        <h2>ADD New User</h2>

        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                 <strong>$errorMessage</strong>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Full Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $fname; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">User Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="uname" value="<?php echo $uname; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Mail</label>
            <div class="col-sm-6">
                <input type="mail" class="form-control" name="mail" value="<?php echo $mail; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Number</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="number" value="<?php echo $number; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Age</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="age" value="<?php echo $age; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="gender" value="<?php echo $gender; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Height</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="height" value="<?php echo $height; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Weight</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="weight" value="<?php echo $weight; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">BMI</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="bmi" value="<?php echo $bmi; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
            </div>
        </div>


        <?php
            if(!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
        ?>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="user_management.php" role="button">Cancel</a>
            </div>
        </div>
        </form>
    </div>
</body>
</html>