<?php
	session_start();

	require('config.php');
	
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$bool = true;

    $query = mysql_query("Select * from users WHERE username='$username'"); // QUERY THE USERS TABLE
    $exists = mysql_num_rows($query); // Checks if username exists

    $table_users = "";
    if($exists>0) // if there are no returning rows or no existing username
    {
    	while ($row=mysql_fetch_assoc($query)) { // display all rows from query
    		$table_users = $row['username']; // the first udername row is passed on to $table_users,and so on until the query is finished
    		$table_password = $row['password']; // the first udername row is passed on to $table_users,and so on until the query is finished
    	}
    	if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
    	{
    		if($password == $table_password)
    		{
    			$_SESSION['user'] = $username; // set the username in a session. This serves as global variable
    			header("location:home.php"); // redirects the user to the authenticated home page
    		}
    	}
    	else
    	{
    		 Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
        	 Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    	}
    }
    else
    {
    	 Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
         Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
?>