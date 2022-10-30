<?php
include "lib/config.php";
include "lib/functions.php";
session_start();
?>

<?php
$pageName = "output";
include "templates/header.php";
?>

<?php
if(!isSubmitted()){ //makes sure form is submitted
    jsRedirect(SITE_ROOT);
}
?>
<div><button><a href="<?php echo SITE_ROOT?>signout.php">Signout</a></button></div>
<body>
<div class="container">  
  <form id="contact" method="">
    <h3>Hello <?php echo $_SESSION["contactName"]; ?></h3>
    <h4>Contact us</h4>
        <fieldset>
            <input name="contactName" placeholder="Your name" type="text" value="<?php echo $_SESSION["contactName"]; ?>" required>
        </fieldset>
        <fieldset>
            <input name="contactEmail" placeholder="Your Email Address" type="email" value="<?php echo $_SESSION["contactEmail"]; ?>" required>
        </fieldset>
        <fieldset>
            <input name="contactPhone" placeholder="Your Phone Number" type="tel" value="<?php echo $_SESSION["contactPhone"]; ?>" required>
        </fieldset>
        <fieldset>
            <input name="contactWeb" placeholder="Your Web Site (optional): https://example.com" type="url" value="<?php echo $_SESSION["contactWeb"]; ?>">
        </fieldset>
        <fieldset>
            <input name="contactAge" placeholder="Your Age (optional)" type="text" value="<?php echo $_SESSION["contactAge"]; ?>">
        </fieldset>
        <fieldset>
            <input name="contactGender" placeholder="Your Age (optional)" type="text" value="<?php echo $_SESSION["contactGender"]; ?>">
        </fieldset>
        <fieldset>
            <textarea name="contactComments" placeholder="Type your comments here...." ><?php echo $_SESSION["contactComments"]; ?></textarea>
        </fieldset>
    <p class="copyright">Copyright &copy; <?php echo date("d-M-Y H:i"); ?> interesting</p>
  </form>
</div>
<div>
    
</div>
</body>
</html>