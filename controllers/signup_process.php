<?php
require_once("../models/users.php");
require_once("SignupController.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swe";

$signupController = new SignupController($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = new users();
    $user->set_firstname($_POST['firstname']);
    $user->set_lastname($_POST['lastname']);
    $user->set_mail($_POST['mail']);
    $user->set_phone($_POST['phone']);
    $user->set_dob($_POST['dob']);
    $user->set_gender($_POST['gender']);
    $user->set_username($_POST['username']);
    $user->set_password($_POST['password']);
    $user->set_confirmpassword($_POST['confirmpassword']);

    $signupController->signup($user);
}
?>