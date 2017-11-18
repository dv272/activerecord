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
		
		echo '<h2>Delete Existing Record</h2>';
		$td1 = new todo();
		$td1->id = 3;
		$td1->delete();
		echo '<p>Deleted Record data id: '.$td1->id.'</p>';
		echo "<table>";
		$recordAll = todos::findAll();
		if (count($recordAll) > 0) {
			echo "<tr><th>ToDo ID</th><th>Owner Email</th><th>Owner ID</th><th>Create Date
			</th><th>Due Date</th><th>Message</th><th>Is Done?</th></tr>";
			foreach ($recordAll as $row) {
				echo "<tr><td>".$row->id."</td><td>".$row->owneremail."</td><td>".$row->ownerid."</td><td>".$row->createddate."</td>
				<td>".$row->duedate."</td><td>".$row->message."</td><td>".$row->isdone."</td></tr>";
			}
		}
		echo '</table><br><hr>';
		
		echo '<h2>Update Old Record</h2>';
		$td2 = new todo();
		$td2->id = 7;
		$td2->owneremail = 'dwija@njit.edu';
		$td2->ownerid = 1;
		$td2->createddate = '0000-00-00 00:00:00';
		$td2->duedate = '0000-00-00 00:00:00';
		$td2->message = 'Test task Updated';
		$td2->isdone = 0;
		$td2->save();
		echo '<p>Todo Record data: Title = '.$td2->message.', Status = '.$td2->isdone.'</p>';
		echo "<table>";
		$recordAll = todos::findAll();
		if (count($recordAll) > 0) {
			echo "<tr><th>ToDo ID</th><th>Owner Email</th><th>Owner ID</th><th>Create Date
			</th><th>Due Date</th><th>Message</th><th>Is Done?</th></tr>";
			foreach ($recordAll as $row) {
				echo "<tr><td>".$row->id."</td><td>".$row->owneremail."</td><td>".$row->ownerid."</td><td>".$row->createddate."</td>
				<td>".$row->duedate."</td><td>".$row->message."</td><td>".$row->isdone."</td></tr>";
			}
		}
		echo '</table><br><hr>';
		
		echo '<h2>Insert New Record</h2>';
		$td3 = new todo();
		$td3->id = '00';
		$td3->owneremail = 'dwija@njit.edu';
		$td3->ownerid = 13;
		$td3->createddate = '0000-00-00 00:00:00';
		$td3->duedate = '0000-00-00 00:00:00';
		$td3->message = 'Test task';
		$td3->isdone = 0;
		$td3->save();
		echo '<p>Todo Record data: Title = '.$td3->message.', Status = '.$td3->isdone.'</p>';
		echo "<table>";
		$recordAll = todos::findAll();
		if (count($recordAll) > 0) {
			echo "<tr><th>ToDo ID</th><th>Owner Email</th><th>Owner ID</th><th>Create Date
			</th><th>Due Date</th><th>Message</th><th>Is Done?</th></tr>";
			foreach ($recordAll as $row) {
				echo "<tr><td>".$row->id."</td><td>".$row->owneremail."</td><td>".$row->ownerid."</td><td>".$row->createddate."</td>
				<td>".$row->duedate."</td><td>".$row->message."</td><td>".$row->isdone."</td></tr>";
			}
		}
		echo '</table><br><hr>';
		
		$recordAll = accounts::findAll();
		echo '<h2>Select all Records from Accounts</h2>';
		echo '<p>Select ALL records</p>';
		echo "<table>";
		if (count($recordAll) > 0) {
			echo "<tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";
			foreach ($recordAll as $row) {
				echo "<tr><td>".$row->id."</td><td>".$row->email."</td><td>".$row->fname."</td><td>".$row->lname."</td><td>".$row->phone."</td><td>".$row->birthday."</td><td>".$row->gender."</td><td>".$row->password."</td></tr>";
			}
		}
		echo "</table><hr>";
		
		$id = 10;
		$record = accounts::findOne($id);
		echo '<h2>Select One Record from Accounts</h2>';
		echo '<p>Select Record ID: '.$id.'</p>';
		echo "<table>";
		echo "<tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";
		echo "<tr><td>".$record->id."</td><td>".$record->email."</td><td>".$record->fname."</td><td>".$record->lname."</td><td>".$record->phone."</td><td>".$record->birthday."</td><td>".$record->gender."</td><td>".$record->password."</td></tr>";
		echo "</table><hr>";
		
		echo '<h2>Delete Existing Record from Accounts</h2>';
		$ac1 = new account();
		$ac1->id = 6;
		$ac1->delete();
		echo '<p>Deleted Record data id: '.$ac1->id.'</p>';
		echo "<table>";
		$recordAll = accounts::findAll();
		if (count($recordAll) > 0) {
			echo "<tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";
			foreach ($recordAll as $row) {
				echo "<tr><td>".$row->id."</td><td>".$row->email."</td><td>".$row->fname."</td><td>".$row->lname."</td><td>".$row->phone."</td><td>".$row->birthday."</td><td>".$row->gender."</td><td>".$row->password."</td></tr>";
			}
		}
		echo '</table><br><hr>';
		
		echo '<h2>Update Old Record from Accounts</h2>';
		$ac2 = new account();
		$ac2->id = 9;
		$ac2->email = 'test@njit.edu';
		$ac2->fname = 'Test1';
		$ac2->lname = 'Test2';
		$ac2->phone = '888-999-1234';
		$ac2->birthday = '2000-01-01';
		$ac2->gender = 'female';
		$ac2->password = 'test12345';
		$ac2->save();
		echo "<table>";
		$recordAll = accounts::findAll();
		if (count($recordAll) > 0) {
			echo "<tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";
			foreach ($recordAll as $row) {
				echo "<tr><td>".$row->id."</td><td>".$row->email."</td><td>".$row->fname."</td><td>".$row->lname."</td><td>".$row->phone."</td><td>".$row->birthday."</td><td>".$row->gender."</td><td>".$row->password."</td></tr>";
			}
		}
		echo '</table><br><hr>';
		
		echo '<h2>Insert New Record to Accounts</h2>';
		$ac3 = new account();
		$ac3->id = '';
		$ac3->email = 'new.test@gmail.com';
		$ac3->fname = 'Demo';
		$ac3->lname = 'Test';
		$ac3->phone = '';
		$ac3->birthday = '';
		$ac3->gender = '';
		$ac3->password = 'test12345';
		$ac3->save();
		echo "<table>";
		$recordAll = accounts::findAll();
		if (count($recordAll) > 0) {
			echo "<tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";
			foreach ($recordAll as $row) {
				echo "<tr><td>".$row->id."</td><td>".$row->email."</td><td>".$row->fname."</td><td>".$row->lname."</td><td>".$row->phone."</td><td>".$row->birthday."</td><td>".$row->gender."</td><td>".$row->password."</td></tr>";
			}
		}
		echo '</table><br><hr>';
	?>
</body>
</html>