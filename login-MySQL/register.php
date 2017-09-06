<!DOCTYPE html>
	<html>
		<head>
			<title>First Php website</title>
		</head>
		<body>
			<h2>Registration Page</h2>
			<a href="index.php">CLICK HERE TO GO BACK</a>
			<form action="register.php" method="post">
				Enter Username:<input type="text" name="username" required="required"/> <br>
				Enter Password:<input type="password" name="password" required="required"><br>
			<input type="submit" value="Register">
			</form>
		</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);

		$bool = true;

		require('config.php');
		
		$query = mysql_query("Select * from users"); // Query the users table

		while ($row=mysql_fetch_array($query)) { // dispaly all rows from the query
			$table_users = $row['username']; // the first username row is passed on $table_users,and so on untl the query is finished
			if($username == $table_users) // checks if there are any matching fields
			{
				$bool = false; // set bool to false
				Print '<script>alert("username has been taken");</script>'; // prompts the user
				Print '<script> window.location.assign("register.php");</script>'; // redirects to register.php
			}
		}
		if($bool)// checks if bool is true
			{
				mysql_query("insert into users (username,password) values ('$username','$password')"); // inserts the values to table users
				Print '<script>alert("Successfully registered");</script>'; // prmpts the user
				Print '<script> window.location.assign("register.php");</script>'; // redirects to register.php
			}
	}
?>