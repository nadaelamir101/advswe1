<?php
session_start();

class Authentication    
{
    private $servername;
    private $username_db;
    private $password_db;
    private $dbname;
    private $conn;

    public function __construct($servername, $username_db, $password_db, $dbname)
    {
        $this->servername = $servername;
        $this->username_db = $username_db;
        $this->password_db = $password_db;
        $this->dbname = $dbname;
    }

    public function authenticate($username, $password)
    {
        $this->connect();

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            $isAdmin = $user['isAdmin'];

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = true;

            if ($isAdmin == 1) {
                header("Location: /r-n/Views/admin.php");
                exit;
            } else {
                header("Location: /r-n/index.php");
                exit;
            }
        } else {
            echo "Invalid username or password";
        }

        $this->close();
    }

    private function connect()
    {
        $this->conn = new mysqli($this->servername, $this->username_db, $this->password_db, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function close()
    {
        $this->conn->close();
    }
}


$username = $_POST['username'];
$password = $_POST['password'];

$servername = "localhost";
$dbname = "swe";
$username_db = "root";
$password_db = "";

$auth = new Authentication($servername, $username_db, $password_db, $dbname);
$auth->authenticate($username, $password);
?>