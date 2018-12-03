<!DOCTYPE html>
<?php include 'db.php'; 

if(isset($_POST['search'])){

		$name = htmlspecialchars($_POST['search']);
		
		$sql = "select * from library where book_name like '%$name%' ";
			

		$rows = $db->query($sql);
}


?>
<html>
<head>
	<script src="dist/jquery-3.2.1.slim.min.js"></script>
	<script src="dist/bootstrap.min.js" ></script>
	<link rel="stylesheet" href="dist/bootstrap.min.css">
<title>Book Search</title>
</head>
<body>
<div class="container">
<center><h1>Book Search</h1></center>

<div class="row" style="margin-top: 70px;">
	<div class="col-md-10 col-md-offset-1" >
		<button type="button" data-target="#addBookForm" data-toggle="modal" class="btn btn-success ">Add Book</button>
		<button type="button" class="btn btn-default pull-right" onclick="print()">Print</button>
			<input type="submit" value="Cancel" class="btn btn-secondary" onclick="window.location.href='index.php'">
		<table class="table">						
			<hr><br>
			<!-- Modal -->
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
		<div class="col-md-12 text-center">
			<p>Search</p>
			<form action="search.php" method="post" class="form-group">
				
				<input type="text" placeholder="Search"
				 name="search" class="form-control">
			</form>
		</div>
		<?php if(mysqli_num_rows($rows) < 1 ): ?>

    <h2 class="text-danger text-center">Nothing Found</h2>
    <a href="index.php" class="btn btn-warning">Back</a>

	  <?php else: ?>		
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID.</th>
						<th>Task</th>
						
					</tr>
				</thead>
				<tbody>
					<tr>
					<?php while($row = $rows->fetch_assoc()): ?>
                       


				
						<th><?php echo $row['BookID'] ?></th>
						<td class="col-md-10"><?php echo $row['book_name'] ?> </td>
						<td><a href="update.php?id=<?php echo $row['BookID'];?>" class="btn btn-success">Edit</a> </td>
		<td><a href="delete.php?id=<?php echo $row['BookID'];?>" class="btn btn-danger">Delete</a> </td>
					</tr>
						<?php endwhile; ?>
					
				</tbody>
          </table>
<?php endif; ?>				
			
	
		<center>
		
		</div>
	</div>
</div>
</body>
</html>