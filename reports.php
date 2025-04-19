<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
    <div class="navbar-container">
<?php include 'navbar.php'; ?>    
</div>
<div class="main">
<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    echo 'Connection error' . mysqli_connect_error();
}else{
    $sql = mysqli_query($conn, "select itemID from items");
    if(!$sql){
        echo ' error in sql statement ' . $sql;
    }else{
    $result = mysqli_fetch_all($sql);
    $count = count($result);
?>
<div class="report-box">
<div class="counter">
 <p style="color: #000;">Inventory Report</p>
 <p>Total Number Of Items: <?=$count;?></p>
 <p><?php $query = mysqli_query($conn,'select name, quantity, reorder_level from items');
    $item = mysqli_fetch_all($query, MYSQLI_ASSOC);
    for($i = 0; $i < $count; $i++){
    $quantity = $item[$i]['quantity'];
    $reorder_level = $item[$i]['reorder_level'];
    if($quantity == $reorder_level){
        echo 'Restock item: ' . $item[$i]['name'] . '</br>';
    }
    }?></p>
</div>
</div>
<?php } }?>
</div>
<div class="footer-container">
<?php include 'footer.php'; ?>
</div>
</body>
</html>