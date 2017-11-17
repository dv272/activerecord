<html>
<head>
	<title>Active Records Demo</title>
</head>
<body>
	
	<?php
		include 'staticDatabase.php';
	?>
	<?php
		$recordAll = todos::findAll();
		echo '<h2>Select all Records</h2>';
		echo '<p>Select ALL records</p>';
		echo "<table>";
		if (count($recordAll) > 0) {
			echo "<tr><th>ToDo ID</th><th>Owner Email</th><th>Owner ID</th><th>Create Date
			</th><th>Due Date</th><th>Message</th><th>Is Done?</th></tr>";
			foreach ($recordAll as $row) {
				echo "<tr><td>".$row->id."</td><td>".$row->owneremail."</td><td>".$row->ownerid."</td><td>".$row->createddate."</td>
				<td>".$row->duedate."</td><td>".$row->message."</td><td>".$row->isdone."</td></tr>";
			}
		}
		echo "</table><hr>";
		
	
	?>
</body>
</html>