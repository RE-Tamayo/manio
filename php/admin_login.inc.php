<?php

    require_once("db.php");

    $db = new Database();

    $conn = $db->connect();


    if(isset($_POST['submit'])) {
        $username = $_POST['uname'];
        $password = $_POST['pwd'];

        $query = "SELECT * FROM admin WHERE username = ? AND pwd = ? LIMIT 1";

        $stmt = $conn->prepare($query);

        $stmt->execute(array($username, $password));

        if($stmt->rowCount() > 0){
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['name'] = $data['username'];
            $_SESSION['status'] = true;
            $_SESSION['type'] = "admin";
            header("Location: ../admin/admin_dashboard.php");
            exit();
        } else {
            header("Location: ../admin/admin_login.php?error=Wrong username or password.");
            exit();
        }

    }

    
