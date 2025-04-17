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
        $item = mysqli_fetch_all($sql);
?>
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
                <th>Date</th>
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
                <td><?=$item[$i][6];?></td>
            </tr>
            <tr>
                <td> </td>
                <form action="edit-item.php" method="post">
                <td><textarea name="new-name" id="new-name" cols="10" rows="3"><?=$item[$i][1]?></textarea></td>
                <td><textarea name="new-category" id="new-category" cols="10" rows="3"><?=$item[$i][2]?></textarea></td>
                <td><textarea name="new-quantity" id="new-quantity" cols="10" rows="3"><?=$item[$i][3]?></textarea></td>
                <td><textarea name="new-unit" id="new-unit" cols="10" rows="3"><?=$item[$i][4]?></textarea></td>
                <td><textarea name="new-reorder-level" id="new-reorder-level" cols="10" rows="3"><?=$item[$i][5]?></textarea></td>
                <td><textarea name="new-date" id="new-date" cols="10" rows="3"><?=$item[$i][6]?></textarea></td>
                <td><input type="submit" value="Save Changes" name="make-edit"></td>
                <?php
                        require 'config.php';
                        $conn = mysqli_connect($server,$user,$pass,$db_name);
                        if(!$conn){
                            die('Connection Error: ' . mysqli_connect_error());
                        }else{
                            if(isset($_POST['make-edit'])){
                                $newName = $_POST['new-name'];
                                $newCategory = $_POST['new-category'];
                                $newQuantity = $_POST['new-quantity'];
                                $newUnit = $_POST['new-unit'];
                                $newReorderlevel = $_POST['new-reorder-level'];
                                $sql = mysqli_query($conn,"update items set name = '$newName', category = '$newCategory', quantity = '$newQuantity',unit = '$newUnit', reorder_level = '$newReorderlevel' where itemID = '<?=$item[$i][0]?>'" ) ;
                            }
                        }
                    ?>
                </form>
            </tr>
            <?php } ?>   
        </tbody>
    </table>
</div>
<?php } } } ?>