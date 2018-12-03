<?php
include 'db.php';
if(isset($_POST['send'])){
	$name=strip_tags($_POST['bookName']); //removes scripts form <script> , <h1> 
	$author=strip_tags($_POST['author']);
	$publisher=strip_tags($_POST['publisher']);
	$price=strip_tags($_POST['price']);
	$sql= "INSERT INTO library(book_name,author,publisher,price) VALUES('$name', '$author','$publisher','$price')";
	$val= $db -> query($sql);

	if($val){
		echo "<h1> Record inserted successfully $name1 </h1>";
		header('location: index.php');
		die();
	}	
}

?>