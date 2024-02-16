<?php
require_once("../config.php");
require_once("../controllers/UsersController.php");

$user = new UsersController($conn);



?>
<!-- profile.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-header h1 {
            color: #333;
        }

        .profile-details {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .profile-details label {
            font-weight: bold;
            margin-right: 5px;
        }

        .logout-btn {
            display: block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <div class="profile-header">
            <h1>User Profile</h1>
        </div>
        <div class="profile-details">
            <label>First Name:</label> <?php echo $user->get_firstname(); ?><br>
            <label>Last Name:</label> <?php echo $user->get_lastname(); ?><br>
            <label>Email:</label> <?php echo $user->get_mail(); ?><br>
            <label>Phone:</label> <?php echo $user->get_phone(); ?><br>
            <label>Date of Birth:</label> <?php echo $user->get_dob(); ?><br>
            <label>Gender:</label> <?php echo $user->get_gender(); ?><br>
        </div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>

</html>

