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
		
		$id = 3;
		$record = todos::findOne($id);
		echo '<h2>Select One Record</h2>';
		echo '<p>Select Record ID: '.$id.'</p>';
		echo "<table>";
		echo "<tr><th>TODO ID</th><th>Owner Email</th><th>Owner ID</th><th>Create Date</th><th>Due Date</th><th>Message</th><th>Is Done?</th></tr>";
		echo "<tr><td>".$record->id."</td><td>".$record->owneremail."</td><td>".$record->ownerid."</td><td>".$record->createddate."</td><td>".$record->duedate."</td><td>".$record->message."</td><td>".$record->isdone."</td></tr>";
			
		echo "</table><hr>";
		
	?>
</body>
</html>