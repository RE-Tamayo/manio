<?php
 
$table = 'student';
 

$primaryKey = 'id';
 
$columns = array(
    array( 'db' => 'user_id', 'dt' => 0 ),
    array( 'db' => 'fname',  'dt' => 1 ),
    array( 'db' => 'lname',   'dt' => 2 ),
    array( 'db' => 'age',     'dt' => 3 ),
    array( 'db' => 'sex',     'dt' => 4 ),
    array( 'db' => 'gradelvl',     'dt' => 5 ),
);
 

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'sahs_db',
    'host' => 'localhost'
);
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $whereResult="", $whereAll="enrollment_status="."'Not Enrolled'")
);