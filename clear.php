<?php
require_once 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    echo 'CONNECTION ERROR: ' . mysqli_connect_error();
    exit();
}else{
    if(isset($_POST['clear-items'])){
        $sql = mysqli_query($conn,'truncate table items');
        if(!$sql){
            echo 'Error in sql statement: ' . $sql;
            exit();
        }else{
             $url =  'http://localhost/inventory_management_system/index.php';
             header('Location: ' . $url);
             die();
        }
}
}