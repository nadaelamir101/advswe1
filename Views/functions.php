<?php
function renderHeaderSection()
{
    session_start(); 
    
    if (isset($_SESSION['logged_in'])&&isset($_SESSION['user_id'])) {
        $logged_in = $_SESSION['logged_in'];
       
        
        if ($logged_in) {
            include ('customer-header.php');
      
        }else{
            include 'header-section.php';
        }
    } else {
        include 'header-section.php';
    }
}
?>