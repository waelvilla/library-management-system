<!DOCTYPE html>
<?php include 'db.php'; 
$id=$_GET['BookID'];
$sql ="select * from library where BookID='$id'";

$rows = $db->query($sql); 

$row = $rows->fetch_assoc();

var_dump($row);

if(isset($_POST['send'])){
	$task = htmlspecialchars($_POST['task']);
	$sql2 ="update library set name='$task' where id ='$id'";
	$db->query($sql2);
}

?>
<html>
	<head>
		<title>	Edit Book</title>
	<script src="dist/jquery-3.2.1.slim.min.js"></script>
	<script src="dist/bootstrap.min.js" ></script>
	<link rel="stylesheet" href="dist/bootstrap.min.css">
	</head>
	<body>

		<div class="container">
			
			<div class="row" style="margin-top: 70px;">
				<center><h3> Editing The Book: <?php echo $row['book_name'];?> </h3></center>
				<div class="col-md-10 col-md-offset-1" > <!-- Task 2 -->
					<table class="table">

						
							       <form method="post" >
								       	<div class="form-group">
								       		<label> Book Name</label>
								       		<input type="text" value="<?php echo $row['book_name']; ?>" required name="task" class="form-control">
								       	</div>
								       	<div class="form-group">
								       		<label> Author</label>
								       		<input type="text" value="<?php echo $row['author'] ?>" name="author" class="form-control" required> 
								       	</div>
								       	<div class="form-group">
								       		<label> Publisher</label>
								       		<input type="text" value="<?php echo $row['publisher'] ?>"  name="publisher" class="form-control"> 
								       	</div>
								       	<div class="form-group">
								       		<label> Price ($)</label>
								       		<input type="number" value="<?php echo $row['price'] ?>" name="price" class="form-control"> 
								       	</div>
									<input type="submit" name="send" value="Add" class="btn btn-success">
									<input type="submit"  value="Cancel" class="btn btn-secondary" onclick="window.location.href='index.php'">
							       </form>

							      </div>
							     


						<hr><br>
						
					<div>
					</div>
				</div>
			</body>
		</html>