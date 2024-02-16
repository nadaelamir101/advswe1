<?php
  require_once("Model.php");
?>
 
 <?php  

 class users extends Model
 {
    private $firstname;
    private $lastname;
    private $mail;
    private $phone;
    private $dob;
    private $gender;
    private $username;
    private $password;
    private $confirmpassword;
    private $isAdmin;


    function set_firstname($firstname)
    {
        $this->firstname = $firstname;
    }

    function get_firstname()
    {
        return  $this->firstname ;
    }


    function set_lastname($lastname){
        $this->lastname=$lastname;
    }

 function get_lastname()
    {
        return  $this->lastname ;
    }

    function set_mail($mail)
    {
        $this->mail = $mail;
    }

    function get_mail()
    {
        return  $this->mail ;
    }

    function set_phone($phone)
    {
        $this->phone = $phone;
    }

    function get_phone()
    {
        return  $this->phone ;
    }

    function set_dob($dob)
    {
        $this->dob = $dob;
    }

    function get_dob()
    {
        return  $this->dob ;
    }

    
    function set_gender ($gender)
    {
        $this->gender = $gender;
    }

    function get_gender()
    {
        return  $this->gender ;
    }


    function set_username ($username)
    {
        $this->username = $username;
    }

    function get_username()
    {
        return  $this->username ;
    }


    function set_password ($password)
    {
        $this->password = $password;
    }

    function get_password()
    {
        return  $this->password ;
    }


    function set_confirmpassword ($confirmpassword)
    {
        $this->confirmpassword = $confirmpassword;
    }

    function get_confirmpassword()
    {
        return  $this->confirmpassword ;
    }


    function set_isAdmin ($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    function get_isAdmin()
    {
        return  $this->isAdmin;
    }

}

 ?>