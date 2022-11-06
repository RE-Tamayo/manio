<?php

if(isset($_POST['assign'])) {
    require_once("db.php");

    $db = new Database();

    $conn = $db->connect();

    $query = "UPDATE student SET section = ? WHERE user_id = ?";

    $stmt = $conn->prepare($query);

    $section = $_POST['section'];

    if($stmt->execute(array($section, $_GET['id']))){
        $stmt = null;

        $query = "SELECT * FROM student WHERE user_id = ?";

        $stmt = $conn->prepare($query);

        $stmt->execute(array($_GET['id']));

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = null;

        if($data['gradelvl'] == 7) {
            $query = "INSERT INTO sections (gradelvl, section, user_id, subjects_id) VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($query);

            $stmt->execute(array($data['gradelvl'], $data['section'], $_GET['id'], 1));
        }

        if($data['gradelvl'] == 8) {
            $query = "INSERT INTO sections (gradelvl, section, user_id, subjects_id) VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($query);

            $stmt->execute(array($data['gradelvl'], $data['section'], $_GET['id'], 2));
        }

        if($data['gradelvl'] == 9) {
            $query = "INSERT INTO sections (gradelvl, section, user_id, subjects_id) VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($query);

            $stmt->execute(array($data['gradelvl'], $data['section'], $_GET['id'], 3));
        }

        if($data['gradelvl'] == 10) {
            $query = "INSERT INTO sections (gradelvl, section, user_id, subjects_id) VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($query);

            $stmt->execute(array($data['gradelvl'], $data['section'], $_GET['id'], 4));
        }

        

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
}
