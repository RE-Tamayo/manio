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
            <div class="d-flex justify-content-between px-5 mt-4"><h4>Enrollment Form</h4><a href="../index.php">Back</a></div>
            <hr>
            <form class="form_body p-5" action="../php/enroll.php" method="POST">
                <input class="col4 form-control" type="text" name="fname" placeholder="First Name" required>
                <input class="col4 form-control" type="text" name="mname" placeholder="Middle Name" required>
                <input class="col4 form-control" type="text" name="lname" placeholder="Last Name" required>
                <input class="col6 form-control" type="text" name="email" placeholder="Email" required>
                <select class="col3 form-control" name="gradelvl" required>
                    <option value=7>Grade 7</option>
                    <option value=8>Grade 8</option>
                    <option value=9>Grade 9</option>
                    <option value=10>Grade 10</option>
                </select>
                <input class="col3 form-control" type="text" name="schoolyear" placeholder="School Year" required>
                <input class="col3 form-control" type="text" name="postcode" placeholder="Postal Code" required>
                <input class="col3 form-control" type="text" name="barangay" placeholder="Street/Barangay" required>
                <input class="col3 form-control" type="text" name="city" placeholder="City/Municipality" required>
                <input class="col3 form-control" type="text" name="province" placeholder="Pronvice" required>
                <input class="col3 form-control" type="date" name="dob" placeholder="Date of Birth" required>
                <select class="col3 form-control" name="sex" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <input class="col3 form-control" type="text" name="nationality" placeholder="Nationality" required>
                <input class="col3 form-control" type="text" name="religion" placeholder="Religion" required>
                <select class="col6 form-control" name="child_legit" required>
                    <option value="Adopted">Adopted</option>
                    <option value="Legal">Legal</option>
                    <option value="Illegitimate">Illegitimate</option>
                </select>
                <select class="col6 form-control" name="child_pos" required>
                    <option value="first">First</option>
                    <option value="second">Second</option>
                    <option value="third">Third</option>
                </select>
                <input class="col4 form-control" type="text" name="lastschool" placeholder="Last School Attended" required>
                <select class="col4 form-control" name="gradelvl_lastschool" required>
                    <option value="6">Grade 6</option>
                    <option value="7">Grade 7</option>
                    <option value="8">Grade 8</option>
                    <option value="9">Grade 9</option>
                </select>
                <input class="col4 form-control" type="text" name="schoolyear_lastschool" placeholder="School Year of Last School Attended" required>
                <input class="col12 form-control" type="text" name="sibling_names" placeholder="Names of Siblings" required>
                <input class="col4 form-control" type="text" name="mother" placeholder="Mother's Full Name" required>
                <input class="col4 form-control" type="text" name="mother_occupation" placeholder="Mother's Occupation" required>
                <input class="col4 form-control" type="text" name="mother_phone" placeholder="Mother's Contact Number" required>
                <input class="col4 form-control" type="text" name="father" placeholder="Father's Full Name" required>
                <input class="col4 form-control" type="text" name="father_occupation" placeholder="Father's Occupation" required>
                <input class="col4 form-control" type="text" name="father_phone" placeholder="Father's Contact Number" required>
                <div class="col12 d-flex justify-content-center mt-4"><button class="buttons btn btn-success" type="submit" name="enroll">Enroll</button></div>
            </form>
        </div>
    </div>
</body>
</html>