<?php 
	

include'../database_connection/config.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $course = $_GET['course'];
    $year = $_GET['year'];
    $section = $_GET['section'];
    $stmt = $conn->prepare("DELETE FROM student_schedules WHERE id= ?");
    $stmt->execute([$id]);
    echo "<script>alert('SCHEDULE DELETED')</script>";

    echo ("<script>location.href='Students.php?course=".$course."&&year=".$year."&&section=".$section."'</script>");
}
?>