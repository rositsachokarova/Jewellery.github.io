<?php
session_start();
include("db.php");
$pagename="Your Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=ExternalCss1.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";
echo "<h4>".$pagename."</h4>";//display name of the page on the web page


if(!empty($_POST['emailAddress']) || !empty($_POST['password'])){
  $email=$_POST['emailAddress'];
	//create a $SQL variable and populate it with a SQL statement that retrieves product details
    $SQL="select * from Users where userEmail='".$email."'";
    //run SQL query for connected DB or exit and display error message
    $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

    while ($arrayU=mysqli_fetch_array($exeSQL)) {
  		if(($arrayU['userEmail'] != $_POST['emailAddress'])){
  			echo "<b>Login failed!</b>";
  			echo "The email you entered was not recognized! Try again";
  			echo "Go back to <a href='signUp.php'>login</a>";
  		}
  		else {
  			if(($arrayU['userPassword']) != ($_POST['password'])){
  			echo "<b>Login failed!</b>";
  			echo "The password you entered is not valid! Try again.";
  			echo "Go back to <a href='signUp.php'>login</a>";
  			}
  			else {
  				$_SESSION['fname']=$arrayU['userFName'];
  				$_SESSION['sname']=$arrayU['userSName'];
  				$_SESSION['userId']=$arrayU['userId'];
  				$_SESSION['userType']=$arrayU['userType'];

  				echo "<b>Login successful!</b>";
  				echo "<p>Hello ".$_SESSION['fname']." ".$_SESSION['sname'];
          echo "<br>Go back to : <a href='MainPage.html'>Home Page</a>";
	}
}
}
}
else {
	echo "<script>alert('Both email and password fields need to be filled in. Try again');</script>";
	echo "<br>Go back to : <a href='signUp.php'>Log In</a>";
}

echo "</body>";
?>

<!-- References */
/*Roubert, F. (no date). Tutorials [lecture notes].
Server-side Web Development. Available from
https://learning.westminster.ac.uk/
[Accessed 03 February 2021]. */
/* https://fontawesome.com/v5.15/icons?d=gallery&p=2 */
/* https://www.w3schools.com/ */ -->
