<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    die('Connection Error: ' . mysqli_connect_error());
}else{
   $sql = 'select * from items';
   $result = mysqli_query($conn,$sql);
   $item = mysqli_fetch_all($result, MYSQLI_ASSOC);
   if($item == null){
    echo 'Add Items First To Access This Page';
    $url = 'http://localhost/inventory_management_system/add.php';
    header("Location: " . $url);
}else{
?>
<!DOCTYPE html>
<html lang="en">
<?php include'header.php'; ?>
<body>
    <div class="navbar-container">
<?php include 'navbar.php'; ?>
</div>
<div class="main">
<div class="items-listing">
    <table border="1">
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Reorder Level</th>
                <th>Last Updated</th>
            </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($item); $i++){ ?>
            <tr>
                <td><?=$item[$i]['itemID'];?></td>
                <td><?=$item[$i]['name'];?></td>
                <td><?=$item[$i]['category'];?></td>
                <td><?=$item[$i]['quantity'];?></td>
                <td><?=$item[$i]['unit'];?></td>
                <td><?=$item[$i]['reorder_level'];?></td>
                <td><?=$item[$i]['last_updated'];?></td>
            </tr>
            <?php } ?>   
        </tbody>
    </table>
</div>
<?php } } ?>
</div>
<div class="footer-container">
<?php include 'footer.php'; ?>
</div>
</body>
</html>