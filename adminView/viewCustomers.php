<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>User Details</h1>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Username</th>
        </tr>
        <?php
      
        $servername = "localhost";
        $dbname = "swe";
        $username_db = "root";
        $password_db = "";

        $conn = new mysqli($servername, $username_db, $password_db, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve the user details from the users table
        $sql = "SELECT * FROM users WHERE isAdmin = 0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['mail'];
                $phone = $row['phone'];
                $dob = $row['dob'];
                $gender = $row['gender'];
                $username = $row['username'];

                echo "<tr>";
                echo "<td>$firstname</td>";
                echo "<td>$lastname</td>";
                echo "<td>$email</td>";
                echo "<td>$phone</td>";
                echo "<td>$dob</td>";
                echo "<td>$gender</td>";
                echo "<td>$username</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No users found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>