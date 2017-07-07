<?php
	include_once('student-func.php');
	$students = getAllStudent();
?>
<!DOCTYPE html>
<html>
<head>
	<title>LIST Students</title>
	<meta charset="UTF-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
</head>
<body>
	<a href="student-add.php">ADD STUDENT</a>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>EMAIL</th>
			<th>ACTION</th>
		</tr>
		<?php foreach($students as $key) { ?>
		<tr>
			<td><? echo $key['student_id'];?></td>
			<td><a href="student-add.php?id=<? echo $key['student_id'];?>"><? echo $key['student_name'];?></a></td>
			<td><? echo$key['student_email'];?></td>
			<td>
				<form method = "POST" action="student-delete.php">
					<input type="hidden" name="student_id" value="<? echo $key['student_id'] ;?>" >
					<input onclick = "return confirm('Do you want delete this student?") type = "submit" value = "delete" name = "delete">
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>