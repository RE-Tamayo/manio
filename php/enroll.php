<?php

     require_once("db.php");

     $db = new Database();
 
     $conn = $db->connect();

     if(isset($_POST['enroll'])) {
        if(!isset($_SESSION)) {
            session_start();
        }
        $user_id = $_SESSION['id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $gradelvl = $_POST['gradelvl'];
        $schoolyear = $_POST['schoolyear'];
        $postcode = $_POST['postcode'];
        $barangay = $_POST['barangay'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $dob = $_POST['dob'];
        $age;
        $child_legit = $_POST['child_legit'];
        $child_pos = $_POST['child_pos'];
        $sex = $_POST['sex'];
        $nationality = $_POST['nationality'];
        $religion = $_POST['religion'];
        $lastschool = $_POST['lastschool'];
        $gradelvl_lastschool = $_POST['gradelvl_lastschool'];
        $schoolyear_lastschool = $_POST['schoolyear_lastschool'];
        $sibling_names = $_POST['sibling_names'];
        $mother = $_POST['mother'];
        $mother_occupation = $_POST['mother_occupation'];
        $mother_phone = $_POST['mother_phone'];
        $father = $_POST['father'];
        $father_occupation = $_POST['father_occupation'];
        $father_phone = $_POST['father_phone'];


        $query = 'DELETE FROM student WHERE user_id = ?';

        $stmt = $conn->prepare($query);

        $stmt->execute(array($user_id));

        $stmt = null;

        $query = 'INSERT INTO student SET
            user_id = :user_id,
            fname = :fname,
            mname = :mname,
            lname = :lname,
            email = :email,
            gradelvl = :gradelvl,
            schoolyear = :schoolyear,
            postcode = :postcode,
            barangay = :barangay,
            city = :city,
            province = :province,
            dob = :dob,
            age = :age,
            child_legit = :child_legit,
            child_pos = :child_pos,
            sex = :sex,
            nationality = :nationality,
            religion = :religion,
            lastschool = :lastschool,
            gradelvl_lastschool = :gradelvl_lastschool,
            schoolyear_lastschool = :schoolyear_lastschool,
            sibling_names = :sibling_names,
            mother = :mother,
            mother_occupation = :mother_occupation,
            mother_phone = :mother_phone,
            father = :father,
            father_occupation = :father_occupation,
            father_phone = :father_phone';

        $stmt = $conn->prepare($query);

        $user_id = htmlspecialchars(strip_tags($user_id));
        $fname = htmlspecialchars(strip_tags($fname));
        $mname = htmlspecialchars(strip_tags($mname));
        $lname = htmlspecialchars(strip_tags($lname));
        $email = htmlspecialchars(strip_tags($email));
        $gradelvl = htmlspecialchars(strip_tags($gradelvl));
        $schoolyear = htmlspecialchars(strip_tags($schoolyear));
        $postcode = htmlspecialchars(strip_tags($postcode));
        $barangay = htmlspecialchars(strip_tags($barangay));
        $city = htmlspecialchars(strip_tags($city));
        $province = htmlspecialchars(strip_tags($province));
        $dob = htmlspecialchars(strip_tags($dob));
        $age =  calcAge($dob);
        $child_legit = htmlspecialchars(strip_tags($child_legit));
        $child_pos = htmlspecialchars(strip_tags($child_pos));
        $sex = htmlspecialchars(strip_tags($sex));
        $nationality = htmlspecialchars(strip_tags($nationality));
        $religion = htmlspecialchars(strip_tags($religion));
        $lastschool = htmlspecialchars(strip_tags($lastschool));
        $gradelvl_lastschool = htmlspecialchars(strip_tags($gradelvl_lastschool));
        $schoolyear_lastschool = htmlspecialchars(strip_tags($schoolyear_lastschool));
        $sibling_names = htmlspecialchars(strip_tags($sibling_names));
        $mother = htmlspecialchars(strip_tags($mother));
        $mother_occupation = htmlspecialchars(strip_tags($mother_occupation));
        $mother_phone = htmlspecialchars(strip_tags($mother_phone));
        $father = htmlspecialchars(strip_tags($father));
        $father_occupation = htmlspecialchars(strip_tags($father_occupation));
        $father_phone = htmlspecialchars(strip_tags($father_phone));

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':mname', $mname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gradelvl', $gradelvl);
        $stmt->bindParam(':schoolyear', $schoolyear);
        $stmt->bindParam(':postcode', $postcode);
        $stmt->bindParam(':barangay', $barangay);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':province', $province);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':child_legit', $child_legit);
        $stmt->bindParam(':child_pos', $child_pos);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':nationality', $nationality);
        $stmt->bindParam(':religion', $religion);
        $stmt->bindParam(':lastschool', $lastschool);
        $stmt->bindParam(':gradelvl_lastschool', $gradelvl_lastschool);
        $stmt->bindParam(':schoolyear_lastschool', $schoolyear_lastschool);
        $stmt->bindParam(':sibling_names', $sibling_names);
        $stmt->bindParam(':mother', $mother);
        $stmt->bindParam(':mother_occupation', $mother_occupation);
        $stmt->bindParam(':mother_phone', $mother_phone);
        $stmt->bindParam(':father', $father);
        $stmt->bindParam(':father_occupation', $father_occupation);
        $stmt->bindParam(':father_phone', $father_phone);
      
        if($stmt->execute()) {
            header("Location: ../student/student_dashboard.php?status=Success");
            exit();
        } else {
            header("Location: ../student/student_dashboard.php?error=Something went wrong.");
            exit();
        }
    }

    function calcAge($dob) {
        $d = new DateTime($dob);
        $n = new DateTime();
        $interval = $n->diff($d);
        return $interval->y;
    }

 