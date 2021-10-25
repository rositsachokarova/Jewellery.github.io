<?php
session_start();
include("db.php");
$pagename="Favourites";
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



if (isset($_POST['h_prodid'])){


$newprodid=$_POST['h_prodid'];
$reququantity=$_POST['p_quantity'];

$_SESSION['favourites'][$newprodid]=$reququantity;

}
else if (isset($_POST['removeItem'])){

	$delprodid=$_POST['h_del_prodid'];
	unset($_SESSION['favourites'][$delprodid]);
	echo "<p> 1 item has been removed from Favourites";
}

else {
	echo "<p> Current Favourites is unchanged";
}


if(isset($_SESSION['favourites'])){

	 foreach($_SESSION['favourites'] as $index => $value){

		$SQL="select prodName, prodPicNameSmall, prodPrice, prodQuantity from Product where prodId=".$index;
		$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

		while ($arrayp=mysqli_fetch_array($exeSQL)) {
			echo "<div class='row-fav'>";
			echo "<div class='column-fav'>";
			echo "<span style='font-size: 2em; color: #ff8ea7';>";
			echo "<i class='fas fa-heart'></i></span></a>";
			echo "<h1>".$arrayp['prodName'];
			echo "<h2> Price: £".$arrayp['prodPrice'];
			echo "<img src=Pictures/".$arrayp['prodPicNameSmall']." height=300px width=350px>";
			echo "<p> Quantity: ".$value;
			echo "<form action=favouritePage.php method=post>";
			echo "<input type=submit class='btn' value='Remove' name='removeItem'>";
			echo "<input type=hidden name=h_del_prodid value=".$index.">";
			echo "</form>";
			echo "</div>";
			echo "</div>";
		}
	}

}
echo "<br>";
echo "<br>";

echo "</body>";
?>

<!-- References */
/*Roubert, F. (no date). Tutorials [lecture notes].
Server-side Web Development. Available from
https://learning.westminster.ac.uk/
[Accessed 03 February 2021]. */
/* https://fontawesome.com/v5.15/icons?d=gallery&p=2 */
/* https://www.w3schools.com/ */ -->
