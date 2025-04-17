<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    die('Connection Error: ' . mysqli_connect_error());
}else{
    $sql = 'select name,category,quantity,unit,reorder_level from items';
    $result = mysqli_query($conn,$sql);
    $item = mysqli_fetch_all($result );
    if($item == null){
        echo 'Add Items First To Access This Page';
        $url = 'http://localhost/inventory_management_system/add.php';
        header("Location: " . $url);
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
    <div class="navbar-container">
<?php include 'navbar.php'; ?>
</div>
<div class="main">    
<div class="edit-item">
        <table border="1">
            <thead>
                <h5>Edit Items</h5>
                <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Reorder Level</th>
                <th>Actions</th>
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
                <td colspan="2" style="justify-items:center;">
                    <form action="edit-item.php" method="post">
                        <input type="submit" value="Edit Item" name="edit-item">
                    </form>
                    <form action="delete-item.php" method="post">
                        <input type="submit" value="Delete Item" name="delete-item">
                    </form>
                </td>
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
