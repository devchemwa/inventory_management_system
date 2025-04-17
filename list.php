<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    die('Connection Error: ' . mysqli_connect_error());
}else{
   $sql = 'select * from items';
   $result = mysqli_query($conn,$sql);
   $item = mysqli_fetch_all($result);
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
            </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($item); $i++){ ?>
            <tr>
                <td><?=$item[$i][0];?></td>
                <td><?=$item[$i][1];?></td>
                <td><?=$item[$i][2];?></td>
                <td><?=$item[$i][3];?></td>
                <td><?=$item[$i][4];?></td>
                <td><?=$item[$i][5];?></td>
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