<?php
	session_start();
	function getAllStudent(){
		var_dump($_SESSION['students']);
		return !empty($_SESSION['students']) ? $_SESSION['students'] : array();
	}
	function getStudent($id){
		$students = getAllStudent();
		foreach ($students as $key) {
			if($key['student_id'] == $id){
				return $key;
			}
		}
		return array();
	}
	function deleteStudent($id){
		$students = getAllStudent();
		foreach ($students as $key => $item) {
			if ($item['student_id'] == $id ){
				unset($students[$key]);
			}
		}
		$_SESSION[students] = $students;
		return $students;
	}
	function updateStudent($id, $name, $email){
		$students = getAllStudent();
		$new_student = array(
			'student_id' => $id,
			'student_name' => $name,
			'student_email' => $email
		);
		$is_update_action = false;
		foreach ($students as $key) {
			if ($key['student_id'] == $id){
				$students[$key] = $new_student;
				$is_update_action = true;
			}
		}
		if (!$is_update_action){
			$students[] = $new_student;
		}
		$_SESSION['students'] = $students;
		return $students;
	}

?>