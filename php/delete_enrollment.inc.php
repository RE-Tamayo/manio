<?php

    require_once("db.php");

    $db = new Database();

    $conn = $db->connect();

    $query = "DELETE FROM student WHERE user_id = ?";

    $stmt = $conn->prepare($query);

    if($stmt->execute(array($_GET['id']))){
        if($_GET['from'] == 'pending'){
            header("Location: ../admin/admin_dashboard.php?currentTab=1");
            exit();
        } else {
            header("Location: ../admin/admin_dashboard.php?currentTab=2");
            exit();
        }
    } else {
        if($_GET['from'] == 'pending'){
            header("Location: ../admin/admin_dashboard.php?currentTab=1");
            exit();
        } else {
            header("Location: ../admin/admin_dashboard.php?currentTab=2");
            exit();
        }
    }
