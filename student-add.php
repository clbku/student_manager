<?php
	include_once("student-func.php");
	$data = array();
	$errors = array();
	$is_update_acction = false;
	if (!empty($_GET['id'])){
		$data = getStudent($_GET['id']);
		
		$is_update_acction = true;
	}
	if (!empty($_POST['submit'])) {
		$data['student_id'] = $_POST['student-id'];
		$data['student_name'] = $_POST['student-name'];
		$data['student_email'] = $_POST['student-email'];
		if (empty($data['student_id'])){
			$errors['student_id'] = 'INVALID!';
		}
		if (empty($data['student_name'])){
			$errors['student_name'] = 'INVALID!';
		}
		if (empty($data['student_email'])){
			$errors['student_email'] = 'INVALID!';
		}
		if (empty($errors)){
			//var_dump($data);
			updateStudent($data['student_id'],$data['student_name'],$data['student_email']);
			header("Location: student-list.php");
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><? echo (!$is_update_acction) ? 'ADD STUDENT' : 'UPDATE STUDENT' ?></title>
</head>
<body>
	<h1>STUDENT INFOMATION</h1>
	<form method = 'POST'>
	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<td>ID</td>
			<td>
				<input type="text" name="student-id" value=<? echo (!empty($_GET['id'])) ? $data['student_id'] : '';?> >
				<? echo (!empty($errors['student_id'])) ? $errors['student_id'] : '' ;?>
			</td>
		</tr>
		<tr>
			<td>NAME</td>
			<td>
				<input type="text" name="student-name" value=<? echo (!empty($_GET['id']))  ? $data['student_name'] : '';?> >
				<? echo (!empty($errors['student_name'])) ? $errors['student_name'] : '';?>
			</td>
		</tr>
		<tr>
			<td>EMAIL</td>
			<td>
				<input type="text" name="student-email" value=<? echo (!empty($_GET['id'])) ? $data['student_email'] : '';?> >
				<? echo (!empty($errors['student_email'])) ? $errors['student_email'] : '';?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="submit" value = <? echo (!$is_update_acction) ? "ADD" : "UPDATE";?>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>