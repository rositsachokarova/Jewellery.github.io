<?php
session_start();
include ("db.php");							//include db.php file to connect to DB
$pagename="Shop"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=ExternalCss1.css>"; //Call in stylesheet
echo "<script src=https://kit.fontawesome.com/b1d0ed65fc.js crossorigin=anonymous></script>";
echo "<title>".$pagename."</title>";

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
echo "<li><a href='index.html'>Home</a></li>";
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

$id=$_GET['id'];

if ($id=='Bracelets')
{
  echo "<h1> Bracelets </h1>";

//create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL='select prodId, prodName, prodPicNameSmall,prodDescripShort,prodPrice from Product where prodCategory="Bracelet" ';

}
elseif ($id=='Necklaces')
{
  echo "<h1> Necklaces </h1>";

  $SQL='select prodId, prodName, prodPicNameSmall,prodDescripShort,prodPrice from Product where prodCategory="Necklace" ';

}
elseif ($id=='Earrings')
{
  echo "<h1> Earrings </h1>";

  $SQL='select prodId, prodName, prodPicNameSmall,prodDescripShort,prodPrice from Product where prodCategory="Earrings" ';

}
elseif ($id=='Rings')
{
  echo "<h1> Rings </h1>";

  $SQL='select prodId, prodName, prodPicNameSmall,prodDescripShort,prodPrice from Product where prodCategory="Rings" ';

}
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it

while ($arrayp=mysqli_fetch_array($exeSQL))
{
  echo "<div class='rowS'>";
  echo "<div class='columnS'>";
	echo "<a href=ShopPage_Buy.php?u_prod_id=".$arrayp['prodId'].">";
	//display the small image whose name is contained in the array
	echo "<img src=Pictures/".$arrayp['prodPicNameSmall']." height=300px width=350px></a>";

	echo "<p2><h3 style='color: black'>".$arrayp['prodName']."</h3>";	//display product name as contained in the array
	echo "<p2><h4 style='color: white'>".$arrayp['prodDescripShort']."</h4>";
	echo "<p2><h2 style='color: black'> £".$arrayp['prodPrice']."</h2>";
  echo "</div>";
  echo "</div>";

}

echo "</body>";
?>

<!-- References */
/* https://www.sitepoint.com/community/t/php-if-value-is-1-or-2-then-echo/6164 */
/*Roubert, F. (no date). Tutorials [lecture notes].
Server-side Web Development. Available from
https://learning.westminster.ac.uk/
[Accessed 03 February 2021]. */
/* https://fontawesome.com/v5.15/icons?d=gallery&p=2 */
/* https://www.w3schools.com/ */
/* Pictures created by Izabel Velkovska */ -->
