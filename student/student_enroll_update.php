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

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

       $stmt = null;

    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Antonio Highschool</title>
    <link rel="stylesheet" href="../css/enroll.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="enrollment-container">
        <div class="enrollment-form">
            <div class="d-flex justify-content-between px-5 mt-4"><h4>Enrollment Form</h4><a href="student_dashboard.php">Back</a></div>
            <hr>
            <form class="form_body p-5" action="../php/enroll.php" method="POST">
                <input class="col4 form-control" type="text" name="fname" placeholder="First Name" required value="<?= $data['fname'] ?>">
                <input class="col4 form-control" type="text" name="mname" placeholder="Middle Name" required value="<?= $data['mname'] ?>">
                <input class="col4 form-control" type="text" name="lname" placeholder="Last Name" required value="<?= $data['lname'] ?>">
                <input class="col6 form-control" type="text" name="email" placeholder="Email" required value="<?= $data['email'] ?>">
                <select class="col3 form-control" name="gradelvl" required>
                    <option value=7 <?php if($data['gradelvl'] == 7) { echo "selected"; }?>>Grade 7</option>
                    <option value=8 <?php if($data['gradelvl'] == 8) { echo "selected"; }?>>Grade 8</option>
                    <option value=9 <?php if($data['gradelvl'] == 9) { echo "selected"; }?>>Grade 9</option>
                    <option value=10 <?php if($data['gradelvl'] == 10) { echo "selected"; }?>>Grade 10</option>
                </select>
                <input class="col3 form-control" type="text" name="schoolyear" placeholder="School Year" required value="<?= $data['schoolyear'] ?>">
                <input class="col3 form-control" type="text" name="postcode" placeholder="Postal Code" required value="<?= $data['postcode'] ?>">
                <input class="col3 form-control" type="text" name="barangay" placeholder="Street/Barangay" required value="<?= $data['barangay'] ?>">
                <input class="col3 form-control" type="text" name="city" placeholder="City/Municipality" required value="<?= $data['city'] ?>">
                <input class="col3 form-control" type="text" name="province" placeholder="Pronvice" required value="<?= $data['province'] ?>">
                <input class="col3 form-control" type="date" name="dob" placeholder="Date of Birth" required value="<?= $data['dob'] ?>">
                <select class="col3 form-control" name="sex" required>
                    <option value="male" <?php if($data['sex'] == "male") { echo "selected"; }?>>Male</option>
                    <option value="female" <?php if($data['sex'] == "female") { echo "selected"; }?>>Female</option>
                </select>
                <input class="col3 form-control" type="text" name="nationality" placeholder="Nationality" required value="<?= $data['nationality'] ?>">
                <input class="col3 form-control" type="text" name="religion" placeholder="Religion" required value="<?= $data['religion'] ?>">
                <select class="col6 form-control" name="child_legit" required>
                    <option value="Adopted" <?php if($data['child_legit'] == "Adopted") { echo "selected"; }?>>Adopted</option>
                    <option value="Legal" <?php if($data['child_legit'] == "Legal") { echo "selected"; }?>>Legal</option>
                    <option value="Illegitimate" <?php if($data['child_legit'] == "Illegitimate") { echo "selected"; }?>>Illegitimate</option>
                </select>
                <select class="col6 form-control" name="child_pos" required>
                    <option value="first" <?php if($data['child_pos'] == "first") { echo "selected"; }?>>First</option>
                    <option value="second" <?php if($data['child_pos'] == "second") { echo "selected"; }?>>Second</option>
                    <option value="third" <?php if($data['child_pos'] == "third") { echo "selected"; }?>>Third</option>
                </select>
                <input class="col4 form-control" type="text" name="lastschool" placeholder="Last School Attended" required value="<?= $data['lastschool'] ?>">
                <select class="col4 form-control" name="gradelvl_lastschool" required>
                    <option value=6 <?php if($data['gradelvl_lastschool'] == 6) { echo "selected"; }?>>Grade 6</option>
                    <option value=7 <?php if($data['gradelvl_lastschool'] == 7) { echo "selected"; }?>>Grade 7</option>
                    <option value=8 <?php if($data['gradelvl_lastschool'] == 8) { echo "selected"; }?>>Grade 8</option>
                    <option value=9 <?php if($data['gradelvl_lastschool'] == 9) { echo "selected"; }?>>Grade 9</option>
                </select>
                <input class="col4 form-control" type="text" name="schoolyear_lastschool" placeholder="School Year of Last School Attended" required value="<?= $data['schoolyear_lastschool'] ?>">
                <input class="col12 form-control" type="text" name="sibling_names" placeholder="Names of Siblings" required value="<?= $data['sibling_names'] ?>">
                <input class="col4 form-control" type="text" name="mother" placeholder="Mother's Full Name" required value="<?= $data['mother'] ?>">
                <input class="col4 form-control" type="text" name="mother_occupation" placeholder="Mother's Occupation" required value="<?= $data['mother_occupation'] ?>">
                <input class="col4 form-control" type="text" name="mother_phone" placeholder="Mother's Contact Number" required value="<?= $data['mother_phone'] ?>">
                <input class="col4 form-control" type="text" name="father" placeholder="Father's Full Name" required value="<?= $data['father'] ?>">
                <input class="col4 form-control" type="text" name="father_occupation" placeholder="Father's Occupation" required value="<?= $data['father_occupation'] ?>">
                <input class="col4 form-control" type="text" name="father_phone" placeholder="Father's Contact Number" required value="<?= $data['father_phone'] ?>">
                <input class="form-control" type="hidden" name="enrollment_status" value="<?= $data['enrollment_status'] ?>">
                <input class="form-control" type="hidden" name="section" value="<?= $data['section'] ?>">
                <div class="col12 d-flex justify-content-center mt-4"><button class="buttons btn btn-success" type="submit" name="enroll">Enroll</button></div>
            </form>
        </div>
    </div>
</body>
</html>