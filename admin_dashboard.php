<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../CSS/admin_dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="user_management.php">Users</a></li>
            <li><a href="../package/PRead.php">Packages</a></li>
            <li><a href="../clinic/index.php">Clinics</a></li>
            <li><a href="../blog/all_posts.php">Blogs</a></li>
            <li><a href="../health_record_admin/readd.php">Health Checkup</a></li>
            <li><a href="../appoinment/indexRegister.php">Appoinment</a></li>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../profile/logout.php">Logout</a></li>
        </ul>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <div class="top-nav">
            <h1>
                Welcome  
                <?php 
                // Check if the admin is logged in and display the username
                if (isset($_SESSION['user_name'])) {
                    echo htmlspecialchars($_SESSION['user_name']);
                } else {
                    echo "Admin";
                }
                ?>
            </h1>
        </div>

        <!-- Dashboard Overview -->
        <div class="content">
            <div class="card">
                <h3>Total Users</h3>
                <p>50</p>
            </div>
            <div class="card">
                <h3>Staff</h3>
                <p>10</p>
            </div>
            <div class="card">
                <h3>Inquiries</h3>
                <p>50</p>
            </div>
        </div>
    </div>
</body>
</html>
