<?php
include 'db.php'; 
$id=$_GET['id'];
echo "$id was deleted ";

$sql="DELETE FROM library WHERE BookID=$id";
$val= $db -> query($sql);
if($val){
	echo " I deleted id no '$id'";
	echo "<h1> Record deleted Succesfully </h1>";
	header('location: index.php');
	die();
}

?>
