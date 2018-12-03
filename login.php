<?php
include 'db.php';

if(isset($_POST['signin'])|| isset($_POST['signup'])){
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$role=$_POST['role'];


	if(isset($_POST['signin'])){
		$sql="SELECT * FROM users WHERE username='$username'AND password=md5('$password') AND role='$role'";
	}
	elseif(isset($_POST['signup'])){
		$sql="INSERT INTO users(username,password,role) VALUES('$username', md5('$password'),'$role')";
		
	}
	$row=handleQuery($sql,$db);

	if(is_array($row) && !empty($row)){
		setSession($row);
	}


}	

function handleQuery($sql,$db){
	$result=$db->query($sql) or die("Could not execute query");
	if(is_object($result) ){ //means it's sign in
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
	else echo "Record inserted Successfully";
	return null;
}
function setSession($row){
	$_SESSION['valid'] = $row['username'];
	$_SESSION['username'] = $row['name'];
	$_SESSION['id'] = $row['id'];
	$_SESSION['role']=$row['role'];              
	print_r($_SESSION);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="dist/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body class="login-body">

    <form class="form-signin" method="post">

      <img class="mb-4" src="img/psu.png" alt="" width="150" height="150">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

      <div class="form-group">
        <label for="sel1">Select Role:</label>
        <select class="form-control" id="sel1" name="role">
          <option value="user">user</option>
          <option value="admin">admin</option>
        </select>
      </div>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="signin" value="submit">Sign in</button>
      <div>
        <br>
        <h5>Don't have an account?</h5>
      </div>
      <button class="btn btn-lg btn-secondary btn-block" name="signup" value="signup">Sign up</button>

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
    </form>
	
</body>
</html>