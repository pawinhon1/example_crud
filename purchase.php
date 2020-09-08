<?php
require('db.php');
include('auth.php');


$data = "SELECT * FROM products WHERE p_id='".$_GET['id']."'";
$query = mysqli_query($con,$data);
$products = mysqli_fetch_array($query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สั่งซื้อสินค้า</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="form">
    <?php
        if(isset($_POST['submit'])){
            $purchase = "INSERT INTO purchasing (p_id,address) VALUES ('".$_POST['p_id']."','".$_POST['address']."')";
            if(mysqli_query($con,$purchase)){
                echo "ทำการสั่งซื้อสินค้าเรียบร้อย";
            }

        }
    ?>
<a href="dashboard.php">Dashboard</a>
    <form action="" method="post" name="fpurchase">
        <table>
            <tr>
                <td colspan="2"><img src="<?php echo $products['p_img']; ?>"  width="35%"></td>
            </tr>
            <tr>
                <th>ชื่อสินค้า</th>
                <td><?php echo $products['p_name']; ?></td>
            </tr>
            <tr>
                <th>คำอธิบายสินค้า</th>
                <td><?php echo $products['p_desc']; ?></td>
            </tr>
            <tr>
                <th>ราคา</th>
                <td><?php echo $products['p_price']; ?></td>
            </tr>
            <tr>
                <th colspan="2">ที่อยู่ในการจัดส่ง</th>
            </tr>
            <tr>
                <td colspan="2"><textarea name="address" rows="6" cols="50%"></textarea> <input type="hidden" name="p_id" value="<?php echo $products['p_id']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="submit">ยืนยันการสั่งซื้อ</button></td>
            </tr>
        </table>
    </form>
</div>


</body>
</html>