<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
    <div class="navbar-container">
<?php include 'navbar.php'; ?>
</div>
<div class="main">
<div class="add-item">
    <form action="add.php" method="post">
        <h4>Add New Item</h4>
        <input type="text" name="item-name" id="item-name" placeholder="Name" required><br><br>
        <input type="text" name="category" id="category" placeholder="Category" required><br><br>
        <input type="number" name="quantity" id="quantity" placeholder="Quantity" required><br><br>
        <input type="text" name="unit" id="unit" placeholder="Unit e.g. Kg" required><br><br>
        <input type="number" name="reorder-level" id="reorder-level" placeholder="reorder level" required><br><br>
        <input type="submit" name="add-new-item" id="add-new-item"><br><br>
    </form>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    die('Connection Error: ' . mysqli_connect_error());
}else{
    if(isset($_POST['add-new-item'])){
        $name = htmlspecialchars($_POST['item-name']);
        $category = htmlspecialchars($_POST['category']); 
        $quantity = htmlspecialchars($_POST['quantity']); 
        $unit = htmlspecialchars($_POST['unit']);
        $reorder_level = htmlspecialchars($_POST['reorder-level']);
        $sql =mysqli_query($conn, "insert into items(name,category,quantity,unit,reorder_level) values('$name','$category','$quantity','$unit','$reorder_level')");
        if(!$sql){
            echo 'ERROR' . '<h3>' .  $sql . '</h3>' ;
        }else{
            $url = 'http://localhost/inventory_management_system/inventory.php';
            header('Location: '. $url);
            die();
        }
        mysqli_close($conn);
}
    }
