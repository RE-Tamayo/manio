<?php
    
    if(!isset($_SESSION)) {
        session_start();

        if(isset($_SESSION['status'])) {
            if($_SESSION['status']  !== true) {
                header("Location: admin_login.php?error=Please log in first.");
                exit();
            }
        } else {
            header("Location: admin_login.php?error=Please log in first.");
            exit();
        }
        
        if(isset($_SESSION['type'])) {
            if($_SESSION['type'] !== "admin") {
                header("Location: admin_login.php?error=Please log in first.");
                exit();
            }
        } else {
            header("Location: admin_login.php?error=Please log in first.");
            exit();
        }

        require_once("../php/db.php");

        $db = new Database();
    
        $conn = $db->connect();

        $query = 'SELECT * FROM student;';

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;

    }   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Antionio Highschool</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="../css/admin_dashboard.css">
</head>
<body>
    <div class="d-flex justify-content-between px-5 mt-4"><h4>Admin Dashboard</h4><a class="btn btn-sm btn-danger" href="../php/admin_logout.inc.php">Logout</a></div>
    <div class="p-5">
        <div class="tab-wrap">
            
            <input type="radio" id="tab1" name="tabGroup1" onclick="addParam(1)" class="tab" checked>
            <label for="tab1">Pending Enrollment</label>

            <input type="radio" id="tab2" name="tabGroup1" onclick="addParam(2)" class="tab">
            <label for="tab2">Enrolled</label>

            <input type="radio" id="tab3" name="tabGroup1" onclick="addParam(3)" class="tab">
            <label for="tab3">Section Three</label>

            <div class="tab__content">
                <div class="p-5 pending_enrollment">
                    <div class="d-flex justify-content-between px-3 my-4"><h4>Pending Enrollment</h4><a class="btn btn-sm btn-success" href="../php/admin_import.php">Import</a></div>
                    <hr>
                    <table class="table table-success table-striped table-hover display" id="pending" style="width: 100%;">
                        <thead class="bg-success text-white">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">FirstName</th>
                                <th class="text-center">LastName</th>
                                <th class="text-center">Age</th>
                                <th class="text-center">Sex</th>
                                <th class="text-center">Grade Level</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab__content">
                <div class="p-5 erolled">
                    <div class="d-flex px-3 my-4"><h4>Enrolled</h4></div>
                    <hr>
                    <table class="table table-success table-striped table-hover display" id="enrolled" style="width: 100%;">
                        <thead class="bg-success text-white">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">FirstName</th>
                                <th class="text-center">LastName</th>
                                <th class="text-center">Age</th>
                                <th class="text-center">Sex</th>
                                <th class="text-center">Grade Level</th>
                                <th class="text-center">Section</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab__content">
                <h3>Section Three</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Morbi mattis ullamcorper velit. Pellentesque posuere. Etiam ut purus mattis mauris sodales aliquam. Praesent nec nisl a purus blandit viverra.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Morbi mattis ullamcorper velit. Pellentesque posuere. Etiam ut purus mattis mauris sodales aliquam. Praesent nec nisl a purus blandit viverra.</p>
            </div>
        </div>
    </div>
    <script>
        let tab1 = document.getElementById("tab1");
        let tab2 = document.getElementById("tab2");
        let tab3 = document.getElementById("tab3");

        const urlParams = new URLSearchParams(window.location.search);
        let currentTab = urlParams.get('currentTab');

        if(currentTab == 1) {
            tab1.checked = true;
        } else if (currentTab == 2) {
            tab2.checked = true;
        } else if (currentTab == 3) {
            tab3.checked = true;
        }

        const addParam = (param) => {
            const MyURL = new URLSearchParams(window.location.search);
            MyURL.set('currentTab', param);
            window.location.search = MyURL;
        }

        $(document).ready(function () {
            const table = $('#pending').DataTable({
                dom: "<'row'<'col-sm-12 col-md-12 w-100'f>>" +
                "<'row'<'col-sm-12't>>" +
                "<'row'<'col-sm-4 col-md-4'p><'col-sm-4 col-md-4'i><'col-sm-4 col-md-4'l>>",
                processing: true,
                serverSide: true,
                ajax: '../php/pending_enrollment.inc.php',
                columnDefs: [{"render": createPendingBtn, "data": null, "targets": [6]}],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                    infoEmpty:      "Showing 0 to 0 of 0 entries",
                    emptyTable:     "No data available in table"
                }
            });

            const table2 = $('#enrolled').DataTable({
                dom: "<'row'<'col-sm-12 col-md-12 w-100'f>>" +
                "<'row'<'col-sm-12't>>" +
                "<'row'<'col-sm-4 col-md-4'p><'col-sm-4 col-md-4'i><'col-sm-4 col-md-4'l>>",
                processing: true,
                serverSide: true,
                ajax: '../php/enrolled.inc.php',
                columnDefs: [{"render": createEnrolledBtn, "data": null, "targets": [7]}],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                    infoEmpty:      "Showing 0 to 0 of 0 entries",
                    emptyTable:     "No data available in table"
                }
            });

            function createPendingBtn() {
            return '<button id="approveBtn" type="button" class="btn btn-success btn-xs">Enroll</button> <button id="deleteBtn" type="button" class="btn btn-danger btn-xs">Delete</button>';
            }

            function createEnrolledBtn() {
            return '<button id="manageBtn" type="button" class="btn btn-success btn-xs">Manage</button> <button id="deleteBtn" type="button" class="btn btn-danger btn-xs">Delete</button>';
            }

            $('#pending tbody').on('click', '#approveBtn', function () {
                var data = table.row($(this).parents('tr')).data();
                window.location.replace("../php/approve_enrollment.inc.php?id="+data[0]+"&from=pending");
            });

            $('#pending tbody').on('click', '#deleteBtn', function () {
                var data = table.row($(this).parents('tr')).data();
                window.location.replace("../php/delete_enrollment.inc.php?id="+data[0]+"&from=pending");
            });

            $('#enrolled tbody').on('click', '#manageBtn', function () {
                var data = table2.row($(this).parents('tr')).data();
                window.location.replace("manage_student.php?id="+data[0]);
            });

            $('#enrolled tbody').on('click', '#deleteBtn', function () {
                var data = table2.row($(this).parents('tr')).data();
                window.location.replace("../php/delete_enrollment.inc.php?id="+data[0]+"&from=enrolled");
            });

            

        });
    </script>
</body>
</html>