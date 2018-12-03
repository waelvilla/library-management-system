<!DOCTYPE html>
<?php include 'db.php';
	$sql='select * from library';
	$rows=$db->query($sql);

?>
<html>
<head>
	<title>	my Library</title>
	<script src="dist/jquery-3.2.1.slim.min.js"></script>
	<script src="dist/bootstrap.min.js" ></script>
	<link rel="stylesheet" href="dist/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="row" style="margin-top: 70px;">
			<center><h1>Library </h1></center>
			<div class="col-md-10 col-md-offset-1" > 
				<table class="table">
					<button type="button" data-target="#addBookForm" data-toggle="modal" class="btn btn-success"> Add Book</button>  

						<div id="addBookForm" class="modal fade" role="dialog">
					  		<div class="modal-dialog">
						    
					    		<div class="modal-content">
					      		<div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">Add Book</h4> 
					      		</div>
					      		<div class="modal-body">
							       <form method="post" action="add.php">
								       	<div class="form-group">
								       		<label> Book Name</label>
								       		<input type="text" required name="bookName" class="form-control"> 
								       	</div>
								       	<div class="form-group">
								       		<label> Author</label>
								       		<input type="text" required name="author" class="form-control"> 
								       	</div>
								       	<div class="form-group">
								       		<label> Publisher</label>
								       		<input type="text"  name="publisher" class="form-control"> 
								       	</div>
								       	<div class="form-group">
								       		<label> Price ($)</label>
								       		<input type="number" name="price" class="form-control"> 
								       	</div>

										<input type="submit" name="send" value="Submit" class="btn btn-success">
							       </form>			
					      		</div>
				      			<div class="modal-footer">
				        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      			</div>
					    		</div>

					  		</div>
						</div>

					<hr><br>
					<thead>
						<tr>
							<th scope="col">BookID</th>
							<th scope="col">Book Name</th>  
							<th scope="col">Author</th>
							<th scope="col">Publisher</th>
							<th scope="col">Price</th>
						</tr>
					</thead>
					<tbody>
						<?php while($row =$rows->fetch_assoc()) : ?>
						<tr>
							<th scope="row"><?php echo $row['BookID'] ?></th>
							<td class="col-md-10"><?php echo $row['book_name'] ?></td>
							<td class="col-md-10"><?php echo $row['author'] ?></td>
							<td class="col-md-10"><?php echo $row['publisher'] ?></td>
							<td class="col-md-10"><?php echo $row['price'] ?></td>  
							<td><a href="update.php?BookID=<?php echo $row['BookID'];?>" class="btn btn-success">Edit </a></td>  
							<td><a href="delete.php?BookID=<?php echo $row['BookID'];?>" class="btn btn-danger">Delete </a></td>  
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
			<div id="search">
				<form action="search.php" method="post" class="form-group">
					<input type="text" name="search" placeholder="search" class="form-control">
				</form>
			</div>
		</div>
	</div>
</body>
</html>