<?php
class SignupController
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function signup($user)
    {
        $this->connect();

        $firstname = $user->get_firstname();
        $lastname = $user->get_lastname();
        $mail = $user->get_mail();
        $phone = $user->get_phone();
        $dob = $user->get_dob();
        $gender = $user->get_gender();
        $username = $user->get_username();
        $password = $user->get_password();
        $confirmpassword = $user->get_confirmpassword();

        $sql = "INSERT INTO users (firstname, lastname, mail, phone, dob, gender, username, password, confirmpassword) 
                VALUES ('$firstname', '$lastname', '$mail', '$phone', '$dob', '$gender', '$username', '$password', '$confirmpassword')";

        if ($this->conn->query($sql) === TRUE) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        $this->close();
    }

    private function connect()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function close()
    {
        $this->conn->close();
    }
}
?>