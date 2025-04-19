<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    die('Connection Error: ' . mysqli_connect_error());
}else{
    $sql = 'select name,category,quantity,unit from items';
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
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i = 0; $i < count($item); $i++){ ?>
                <tr>
                <td><?=$item[$i]['name'];?></td>
                <td><?=$item[$i]['category'];?></td>
                <td><?=$item[$i]['quantity'];?></td>
                <td><?=$item[$i]['unit'];?></td>   
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
