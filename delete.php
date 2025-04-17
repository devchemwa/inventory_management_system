<?php
require_once 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    die('CONNECTION ERROR:' . mysqli_connect_error());
}else{
    if(isset($_POST['delete-item'])){
        $itemID = $_POST['itemID'];
        $sql = mysqli_query($conn, "delete  from items where itemID = '$itemID'");
        if(!$sql){
            die('Error in sql statement: ' . $sql);
        }else{
            $url = 'http://localhost/inventory_management_system/list.php';
            header('Location: ' . $url);
            die();
        }
}
}