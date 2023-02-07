<?php 
	

include'../database_connection/config.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM school_announcement WHERE id= ?");
    $stmt->execute([$id]);
    echo "<script>alert('POST DELETED')</script>";

    echo ("<script>location.href='School_Announcement.php'</script>");
}
?>