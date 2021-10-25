<?php
session_start();
include("db.php");
$pagename="Your Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=ExternalCss1.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";
echo "<h2>".$pagename."</h2>";//display name of the page on the web page

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$telno=$_POST['telNo'];
$email=$_POST['emailAddress'];
$pwOne=$_POST['password'];
$pwTwo=$_POST['conPassword'];


//if the mandatory fields are not empty
if(!empty($_POST['firstName']) || !empty($_POST['lastName']) || !empty($_POST['telNo']) || !empty($_POST['emailAddress']) || !empty($_POST['password'])
|| !empty($_POST['conPassword'])) {

    	//if the 2 entered passwords do not match
		if ($_POST['password'] != $_POST['conPassword']){
      //Display error passwords not matching message
  		//Display a link back to register page
			echo "<p> Passswords are not matching";
			echo "<p> Go back to <a href='signup.php'>sign up</a>";
		}
		else{
      //define regular expression
  		//if email matches the regular expression
			//$pwOne=$_POST['pw1'];
			//$pwTwo=$_POST['pw2'];
			$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
			if (preg_match($pattern,$_POST['emailAddress'])){
				//$email=$_POST['emailAddress'];
        //Write SQL query to insert a new user into users table and execute SQL query
  			//Execute INSERT INTO SQL query
				$SQL="Insert into Users (userFName,userType,userSName,userTelNo,userEmail,userPassword)
				values('$firstName','u','$lastName','$telno','$email','$pwOne')";
				$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
				$errorNo=mysqli_errno($conn);
        //Return the SQL execution error number using the error detector	(hint: use mysql_errno)
  			//If the error detector returns the number 0, everything is fine

				if ($errorNo==0){
          //Display registration confirmation message
  				//Display a link to login page
					echo "<p>Sign-up successful!";
					echo "<p>To continue, please <a href='signUp.php'>login</a>";
				}
				else {
          //else, which means if the error detector does not return the number 0, there is a problem
					if($errorNo==1062){
						echo "<p>Email has already been taken</p>";
            //Display email already taken error message
            //Display a link back to register page
						echo "<p> Go back to <a href='signUp.php'>Sign up</a>";
					}
					if ($errorNo==1064) {
            //if error detector returned number 1064 i.e. invalid characters such as ' and \ have been entered
            //Display invalid characters error message
            //Display a link back to signup page
						echo "<p>Invalid characters such as ' and \ have been entered.";
						echo "<p> Go back to <a href='signUp.php'>sign up</a>";
					}

				}
			}
			else {
        //Display "email not in the right format" message and link back to register page
				echo "<p> Email is not in the right format";
				echo "<p> Go back to <a href='signUp.php'>sign up</a>";
			}
		}
	}
	else {
    //Display "all mandatory fields need to be filled in " message and link to register page
		echo "<p> All mandatory fields need to be filled in";
		echo "<p> Go back to <a href='signUp.php'>sign up</a>";
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
