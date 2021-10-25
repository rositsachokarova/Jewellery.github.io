<?php
session_start();
include("db.php");
$pagename="Bracelet"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=ExternalCss1.css>"; //Call in stylesheet
echo "<script src=https://kit.fontawesome.com/b1d0ed65fc.js crossorigin=anonymous></script>";echo "<title>".$pagename."</title>";//display name of the page as window title
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

//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable
//applied to the query string u_prod_id
//store the value in a local variable called $prodid
$prodid=$_GET['u_prod_id'];

//display the value of the product id, for debugging purposes
//echo "<p>Selected product Id: ".$prodid;

$SQL="select prodName, prodPicNameLarge,prodDescripLong,prodPrice,prodQuantity from Product  where  prodId=".$prodid;
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
	$arrayp=mysqli_fetch_array($exeSQL)	;

	echo "<tr>";
	echo "<td style='border: 2px'>";
	echo "<a href=ShopPage_Buy.php?u_prod_id=".$prodid.">";
	//display the small image whose name is contained in the array
	echo "<img src=Pictures/".$arrayp['prodPicNameLarge']." height=400 width=600></a>";
	echo "</td>";
	echo "<td style='border: 2px'>";
	echo "<p><h1>".$arrayp['prodName']."</h1>";	//display product name as contained in the array
	echo "<p><h3>".$arrayp['prodDescripLong']."</h3>";
	echo "<p><h2>&pound".$arrayp['prodPrice']."</h2>";
	echo "<p><h5>Number left in stock:".$arrayp['prodQuantity']."</h5>";
	echo "<p>Number to be purchased: </p>" ;

	//create form made of one text field and one button for user to enter quantity
	//the value entered in the form will be posted to the basketPage.php and BasketAndFavourite.php to be processed
	echo "<form action=BasketAndFavourite.php method=post>";
	echo "<select name=p_quantity >";
	for ($i=1 ; $i<=$arrayp['prodQuantity']; $i++)
	{
		echo "<option value=".$i.">".$i."</option>";
	}
	echo "</select>";
	echo "<br>";
	echo "<br>";
	echo "<input type=submit name='basketButton' value='Buy'>";
	echo "<br>";
	echo "<input type=submit name='favButton' value='Favourites'>";

	echo "<br>";

	//pass the product id to the next page basketPage.php as a hidden value

	echo "<input type=hidden name=h_prodid value=".$prodid.">";
	echo "</form>";


	echo "</td>";
	echo "</tr>";


echo "</table>";
echo "</body>";
?>

<!-- References */
/*Roubert, F. (no date). Tutorials [lecture notes].
Server-side Web Development. Available from
https://learning.westminster.ac.uk/
[Accessed 03 February 2021]. */
/* https://fontawesome.com/v5.15/icons?d=gallery&p=2 */
/* https://www.w3schools.com/ */
/* Pictures created by Izabel Velkovska */ -->
