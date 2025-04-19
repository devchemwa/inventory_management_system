<?php
require 'config.php';
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(!$conn){
    die('Connection Error: ' . mysqli_connect_error());
}else{
    if(isset($_POST['edit-item'])){
    $sql = mysqli_query($conn, 'select * from items');
    if(!$sql){
        die('Error in sql statement: ' . $sql);
    }else{
        $item = mysqli_fetch_all($sql, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
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
                <form action="save-changes.php" method="post">
                 <td><input type="number" name="itemID" id="itemID" value="<?=$item[$i]['itemID'];?>"></td>
                <td><input name="new-name" id="new-name" value="<?=$item[$i]['name']?>"></td>
                <td><input name="new-category" id="new-category" value="<?=$item[$i]['category']?>"></td>
                <td><input name="new-quantity" id="new-quantity" value="<?=$item[$i]['quantity']?>"></td>
                <td><input name="new-unit" id="new-unit" value="<?=$item[$i]['unit']?>"></td>
                <td><input name="new-reorder-level" id="new-reorder-level" value="<?=$item[$i]['reorder_level']?>"></td>
                <td><input type="submit" value="Save Changes" name="make-edit"></td>
                </form>
            </tr>
            <?php } ?>   
        </tbody>
        <p>
           NOTICE: DO NOT CHANGE ITEM ID
        </p>
    </table>
</div>
<?php } } } ?>
</div>
<div class="footer-container">
<?php include 'footer.php'; ?>
</div>
</body>
</html>