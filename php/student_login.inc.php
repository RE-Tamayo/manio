<?php

    require_once("db.php");

    $db = new Database();

    $conn = $db->connect();


    if(isset($_POST['submit'])) {
        $username = $_POST['uname'];
        $password = $_POST['pwd'];

        $query = "SELECT * FROM student_acc WHERE username = ? AND pwd = ? LIMIT 1";

        $stmt = $conn->prepare($query);

        $stmt->execute(array($username, $password));

        if($stmt->rowCount() > 0){
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['name'] = $data['fname'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['status'] = true;
            $_SESSION['type'] = "user";
            header("Location: ../student/student_dashboard.php");
            exit();
        } else {
            header("Location: ../student/student_login.php?error=Wrong username or password.");
            exit();
        }

    }

    
