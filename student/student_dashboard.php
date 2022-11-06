<?php
    
    if(!isset($_SESSION)) {
        session_start();

        if(isset($_SESSION['status'])) {
            if($_SESSION['status']  !== true) {
                header("Location: student_login.php?error=Please log in first.");
                exit();
            }
        } else {
            header("Location: student_login.php?error=Please log in first.");
            exit();
        }
        
        if(isset($_SESSION['type'])) {
            if($_SESSION['type'] !== "user") {
                header("Location: student_login.php?error=Please log in first.");
                exit();
            }
        } else {
            header("Location: student_login.php?error=Please log in first.");
            exit();
        }

        require_once("../php/db.php");

        $db = new Database();
    
        $conn = $db->connect();

        $query = 'SELECT * FROM student WHERE user_id = ? LIMIT 1';

        $stmt = $conn->prepare($query);

        $stmt->execute(array($_SESSION['id']));

        $row = $stmt->rowCount();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = null;

        if(isset($data['enrollment_status'])) {
            if($data['enrollment_status'] == "Enrolled") {
                $query = 'SELECT * FROM student INNER JOIN sections ON student.user_id = sections.user_id WHERE student.user_id = ?';
    
                $stmt = $conn->prepare($query);
    
                $stmt->execute(array($_SESSION['id']));
    
                $data2 = $stmt->fetch(PDO::FETCH_ASSOC);
    
                $stmt = null;
    
                $query = 'SELECT * FROM subjects WHERE set_id = ?';
    
                $stmt = $conn->prepare($query);
    
                $stmt->execute(array($data2['subjects_id']));
    
                $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }   
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Antonio Highschool</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/student_dashboard.css">
</head>
<body>
<div class="d-flex justify-content-between px-5 mt-4"><h4>Student Dashboard</h4> <div class="d-flex justify-content-end"><?php
        if(isset($data['enrollment_status'])) {
            if($data['enrollment_status'] == "Not Enrolled") {
                if($row <= 0) {
                    echo '<a class="btn btn-sm btn-success mx-2" href="student_enroll.php">Enroll</a>';
                } else {
                    echo '<a class="btn btn-sm btn-success mx-2" href="student_enroll_update.php">Update Enrollment</a>';
                }
            }
        } else {
            if($row <= 0) {
                echo '<a class="btn btn-sm btn-success mx-2" href="student_enroll.php">Enroll</a>';
            } else {
                echo '<a class="btn btn-sm btn-success mx-2" href="student_enroll_update.php">Update Enrollment</a>';
            }
        }
    ?><a class="btn btn-sm btn-danger" href="../php/student_logout.inc.php">Logout</a></div></div>

    <div class="px-5 mt-5">
        <div class="tab-wrap">
                <input type="radio" id="tab1" name="tabGroup1" onclick="addParam(1)" class="tab" checked>
                <label for="tab1">Student Information</label>

                <input type="radio" id="tab2" name="tabGroup1" onclick="addParam(2)" class="tab">
                <label for="tab2">Subjects</label>

                <div class="tab__content">
                    
                </div>

                <div class="tab__content">
                    <div class="mt-5 px-5">
                        <?php
                            if(isset($data['enrollment_status'])) {
                        ?>

                            <table class="table table-stripped table-hover table-success">
                                <thead class="bg-success text-white">
                                    <tr>
                                        <th class="text-center">Subject</th>
                                        <th class="text-center">Start</th>
                                        <th class="text-center">End</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($data['enrollment_status'])) {
                                            if($data['enrollment_status'] == "Enrolled") {
                                                foreach($subjects as $subject) {
                                                    echo '<tr>';
                                                        echo '<td>'.$subject['subject_name'].'</td>';
                                                        echo '<td>'.$subject['subject_start'].'</td>';
                                                        echo '<td>'.$subject['subject_end'].'</td>';
                                                    echo '</tr>';
                                                }
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>

                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>