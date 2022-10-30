<?php
include "lib/config.php";
include "lib/functions.php";
session_start();
?>
<?php
$pageName = "form";
include "templates/header.php";
?>
<?php
$newContactName = $newContactEmail = $newContactPhone = $newContactWeb = $newContactAge = $newContactGender = $newContactComments = "";//initiate the variables

if(isset($_POST["contactSubmit"])){//filter variables
    $newContactName = filterInput($_POST["contactName"]);
    $newContactEmail = filterInput($_POST["contactEmail"]);
    $newContactPhone = filterInput($_POST["contactPhone"]);
    $newContactWeb = filterInput($_POST["contactWeb"]);
    $newContactAge = filterInput($_POST["contactAge"]);
    if(!isset($_POST["contactGender"])){//prevent error when gender not selected
        $newContactGender = "";
      } else {
        $newContactGender = filterInput($_POST["contactGender"]);
      }
    $newContactComments = filterInput($_POST["contactComments"]);


    if($newContactName != "" && $newContactEmail != "" && $newContactPhone != "" && $newContactGender != ""){//check require fields are not empty
        if(isValidEmail($newContactEmail)){//check email validity
            if(isValidPhone($newContactPhone)){//check phone number
                $_SESSION["contactName"] = $newContactName;
                $_SESSION["contactEmail"] = $newContactEmail;
                $_SESSION["contactPhone"] = $newContactPhone;
                $_SESSION["contactWeb"] = $newContactWeb;
                $_SESSION["contactAge"] = $newContactAge;
                $_SESSION["contactGender"] = $newContactGender;
                $_SESSION["contactComments"] = $newContactComments;
                jsRedirect(SITE_ROOT . "output.php");
            }
            else {
                $errorMsg = "Phone number is not valid";
                jsAlert("invalid-phone-number");
            }
        }
        else {
            $errorMsg = "invalid-email";
            jsAlert("invalid-email");
        }
    } 
    else {
        $errorMsg = "empty-fields";
        jsAlert("empty-fields");
    }
}
?>

<body>
<div class="container">  
  <form id="contact" method="POST">
    <h3>Contact Form</h3>
    <h4>Contact us</h4>
        <fieldset>
            <input name="contactName" placeholder="Your name" type="text" value="<?php echo $newContactName; ?>" required>
        </fieldset>
        <fieldset>
            <input name="contactEmail" placeholder="Your Email Address" type="email" value="<?php echo $newContactEmail; ?>" required>
        </fieldset>
        <fieldset>
            <input name="contactPhone" placeholder="Your Phone Number" type="tel" value="<?php echo $newContactPhone; ?>" required>
        </fieldset>
        <fieldset>
            <input name="contactWeb" placeholder="Your Web Site (optional): https://example.com" type="url" value="<?php echo $newContactWeb; ?>">
        </fieldset>
        <fieldset>
            <input name="contactAge" placeholder="Your Age (optional)" type="text" value="<?php echo $newContactAge; ?>">
        </fieldset>
        <fieldset>
            <input type="radio" id="html" name="contactGender" value="male">
            <label for="html">Male</label>
            <input type="radio" id="css" name="contactGender" value="female">
            <label for="css">Female</label>
        </fieldset>
        <fieldset>
            <textarea name="contactComments" placeholder="Type your comments here...." ><?php echo $newContactComments; ?></textarea>
        </fieldset>
        <fieldset>
            <button class="btn" name="contactSubmit" type="submit" id="contact-submit">Submit</button>
        </fieldset>
    <p class="copyright">Copyright &copy; <?php echo date("d-M-Y H:i"); ?> interesting</p>
  </form>
</div>

</body>
</html>