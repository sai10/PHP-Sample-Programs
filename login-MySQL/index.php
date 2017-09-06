<!DOCTYPE html>
	<html>
		<head>
			<title>LOGIN PHP</title>
		</head>
		<body>
		
			<?php
				echo "Hello , Welcome to this page";
			?>
			<br>
			<a href="login.php">CLICK HERE TO LOGIN</a>
			<br>
			<a href="register.php">CLICK HERE TO REGISTER</a>

		</body>

		<br/>
		<h2 align="center">List</h2>
		<table width="100%" border="1px">
				<tr>
					<th>Id</th>
					<th>Details</th>
					<th>Post Time</th>
					<th>Edit Time</th>
				</tr>
				<?php
					require('config.php');
					$query = mysql_query("Select * from list Where public='yes'"); // SQL Query
					while($row = mysql_fetch_array($query))
					{
						Print "<tr>";
							Print '<td align="center">'. $row['id'] . "</td>";
							Print '<td align="center">'. $row['details'] . "</td>";
							Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
							Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
						Print "</tr>";
					}
				?>
		</table>
</html>