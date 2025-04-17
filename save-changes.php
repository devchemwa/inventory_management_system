<?php
require 'config.php';
$conn = mysqli_connect($server, $user, $pass, $db_name);
if (!$conn) {
    die('Connection Error: ' . mysqli_connect_error());
} else {
    if (isset($_POST['make-edit'])) {
        $itemID = $_POST['itemID'];
        $newName = $_POST['new-name'];
        $newCategory = $_POST['new-category'];
        $newQuantity = $_POST['new-quantity'];
        $newUnit = $_POST['new-unit'];
        $newReorderlevel = $_POST['new-reorder-level'];
        $sql = mysqli_query($conn, "update items set name = '$newName', category = '$newCategory', quantity = '$newQuantity',unit = '$newUnit', reorder_level = '$newReorderlevel' where itemID = '$itemID' ");
        if(!$sql){
            die('Error in sql statement: ' . $sql);
        }else{
            $url = 'http://localhost/inventory_management_system/list.php';
            header('Location: ' . $url);
            die();
        }
    }
}
?>