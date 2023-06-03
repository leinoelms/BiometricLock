<?php
include 'conn.php';

if (isset($_POST['delUser'])) {
    $id = $_POST['del_user_id'];

    $sql = "DELETE FROM users where id=:userid";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':userid' => $id]);

    $removesql = "UPDATE locker SET `status` = 0, `userID` = null WHERE `id` = :locker_id";
    $removestmt= $conn->prepare($removesql);
    $removestmt->bindParam(':locker_id', $_POST['lockerid']);
    $removestmt->execute();
    

    header('location: index.php');
} 
