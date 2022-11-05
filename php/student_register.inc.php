<?php

    require_once("db.php");

    $db = new Database();

    $conn = $db->connect();


    if(isset($_POST['submit'])) {
        $username = $_POST['uname'];
        $pwd = $_POST['pwd'];

        $query = 'INSERT INTO student_acc SET username = :username, pwd = :pwd';

        $stmt = $conn->prepare($query);

        $username = htmlspecialchars(strip_tags($username));
        $pwd = htmlspecialchars(strip_tags($pwd));
        
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':pwd', $pwd);

        if($stmt->execute()) {
            header("Location: ../student/student_login.php?status=Success");
            exit();
        } else {
            header("Location: ../student/student_login.php?error=Something went wrong.");
            exit();
        }

    }

    
