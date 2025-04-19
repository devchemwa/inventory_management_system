<?php
require 'config.php';
$conn = mysqli_connect($server, $user, $pass, $db_name);
if (!$conn) {
    die('CONNECTION ERROR: ' . mysqli_connect_error());
} else {
    $sql = mysqli_query($conn, 'select * from items');
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
            <div class="delete-item-table">
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
                        <?php for ($i = 0; $i < count($item); $i++) { ?>
                            <tr>
                                <form action="delete.php" method="post">
                                    <td><input type="number" name="itemID" value="<?= $item[$i]['itemID']; ?>"></td>
                                    <td><input type="text" name="item-name" id="item-name" value="<?= $item[$i]['name']; ?>"></td>
                                    <td><input type="text" name="category" id="category" value="<?= $item[$i]['category']; ?>"></td>
                                    <td><input type="number" name="quantity" id="quantity" value="<?= $item[$i]['quantity']; ?>"></td>
                                    <td><input type="text" name="unit" id="unit" value="<?= $item[$i]['unit']; ?>"></td>
                                    <td><input type="number" name="reorder-level" id="reorder-level" value="<?= $item[$i]['reorder_level']; ?>">
                                    </td>
                                    <td><input type="submit" name="delete-item"
                                            onclick="return confirm('Delete This Item? This Action Cannot Be Undone!')"
                                            value="Delete Item">
                                    </td>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <form action="clear.php" method="post">
                    <input type="submit" name="clear-items" id="clear-items" value="Delete All Items" onclick="return confirm('Confirm To Delete All Items? This Action Cannot Be Undone!')">
                </form>
            </div>
        </div>
        <div class="footer-container">
            <?php include 'footer.php'; ?>
        </div>
    </body>

    </html>

<?php } ?>