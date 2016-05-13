<?php
 
$table = 'cargo';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'car_id', 'dt' => 0 ),
    array( 'db' => 'car_descripion',  'dt' => 1 ),
    array( 'db' => 'car_estado',   'dt' => 2 ),
    
);
 
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);