<?php
session_start();
include "lib/config.php";
include "lib/functions.php";

if(isLoggedIn()){
        session_unset(); // remove all session variables
        session_destroy(); // destroy the session
        jsRedirect(SITE_ROOT);
    } else{                
        $errorMsg = "Phone number is not valid";
        jsAlert("invalid-phone-number");} 
    
?>

