<?php
function jsRedirect($url){
    echo "<script>window.location.href = '" . $url . "';</script>";
}

function jsAlert($text){
    echo "<script>alert('" . $text . "');</script>";
}

function filterInput($input){
    $input = trim($input); // remove unnecessary spaces, tabs, or new line
    $input = stripslashes($input); // remove backslashes "\"
    $input = htmlspecialchars($input); // remove any special html characters that might harm your code
    return $input; // final filtered input
}

function isValidEmail($email){
    // Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    // Check if email format is valid
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}

function isValidPhone($phone){
    if(preg_match('/^[0-9]{8}+$/', $phone)) {//check if 8 numbers in phone numbers from 0-9
        return true;
        } else {
        return false;
        }
    }

function isSubmitted() {
        //Check if contact form submitted
        if(isset($_SESSION["contactName"]) && isset($_SESSION["contactEmail"]) && isset($_SESSION["contactPhone"])){
            return true;
        } else {
            return false;
        }
    }    

?>