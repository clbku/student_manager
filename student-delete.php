<?
if (!empty($_POST['delete']))
{
    include("student-list.php");
    $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
    deleteStudent($student_id);
}
 
header("Location: student-list.php");
?>