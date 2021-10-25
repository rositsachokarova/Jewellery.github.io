<?php
session_start();
include("db.php");
$pagename="Sign Up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=ExternalCss1.css>"; //Call in stylesheet
echo "<script src=https://kit.fontawesome.com/b1d0ed65fc.js crossorigin=anonymous></script>";
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";

echo "<a href='signUp.php'>";
echo "<span style='font-size: 2em; color: #ff8ea7';>";
echo "<i2 class='fas fa-user'></i2></span>";
echo "</a>";

echo "<a href='favouritePage.php'>";
echo "<span style='font-size: 2em; color: #ff8ea7';>";
echo "<i class='fas fa-heart'></i></span></a>";

echo "<a href='basketPage.php'>";
echo "<span style='font-size: 2em; color: grey;''>";
echo "<i class='fas fa-shopping-cart'></i></span></a>";

echo "<div id='topContainer'>";
echo "<div id='logo'><img src='Pictures/jewellery.world.png' height='350px' width='500px' alt='Jewellery Logo'></div>";
echo "</div>";

echo "<nav id='navBar'>";
echo "<ul id='navList'>";
echo "<li><a href='AboutUs.html'>About Us</a></li>";
echo "<li><a href='MainPage.html'>Home</a></li>";
echo "<li>";
echo "<span style='font-size: 3em'><i class='far fa-gem'></i></span></li>";
echo "<div class='dropdown'>";
echo "<button class='dropbtn'>Shop";
echo "<i class='fa fa-caret-down'></i>";
echo "</button>";
echo "<div class='dropdown-content'>";
echo "<a href='shopProd.php?id=Bracelets'>Bracelets</a>";
echo "<a href='shopProd.php?id=Necklaces'>Necklaces</a>";
echo "<a href='shopProd.php?id=Earrings'>Earrings</a>";
echo "<a href='shopProd.php?id=Rings'>Rings</a>";
echo "</div>";
echo "</div>";
echo "</ul>";
echo "</nav>";

/* SIGN UP FORM */
echo "<div class='row-fav'>";
echo "<div class='column-fav'>";
echo "<h2> SIGN UP </h2>";
echo "<form action=signup_process.php method=post>";
echo "First Name          ";
echo "<input type=text name=firstName>";
echo "<br>";
echo "</br>";
echo "Last Name        ";
echo "<input type=text name=lastName>";
echo "<br>";
echo "</br>";
echo "Tel No          ";
echo "<input type=text name=telNo>";
echo "<br>";
echo "</br>";
echo "Email Address         ";
echo "<input type=text name=emailAddress>";
echo "<br>";
echo "</br>";
echo "Password           ";
echo "<input type=password name=password>";
echo "<br>";
echo "</br>";
echo "Confirm Password           ";
echo "<input type=password name=conPassword>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<input type=submit value='Sign Up' name='signUp'>";
echo "<input type=reset value='Clear Form' name='clearForm'>";
echo "</form>";
echo "</div>";
echo "</div>";


/* LOG IN FORM */

echo "<div class='column-right'>";
echo "<h2>LOG IN</h2>";

echo "<form action=login_process.php method=post>";

echo "Email:            ";
echo "<input type=text name=emailAddress>";
echo "<br>";


echo "Password:         ";
echo "<input type=password name=password>";
echo "<br>";
echo "<br>";

echo "<input type=submit value='Log In' name='LogIn'>";
echo "<input type=submit value='Clear Form' name='clearForm'>";


echo "</form>";
echo "</div>";



echo "</body>";
?>

<!-- References */
/*Roubert, F. (no date). Tutorials [lecture notes].
Server-side Web Development. Available from
https://learning.westminster.ac.uk/
[Accessed 03 February 2021]. */
/* https://fontawesome.com/v5.15/icons?d=gallery&p=2 */
/* https://www.w3schools.com/ */ -->
