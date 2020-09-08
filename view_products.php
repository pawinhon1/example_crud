<?php
require("db.php");
include("auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สินค้า</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p><a href="dashboard.php">Dashboard</a></p>
    </div>


<?php
$data = "SELECT * FROM products ORDER BY p_id DESC";
$query = mysqli_query($con,$data);

if(@addslashes($_GET['delete'])){
    $delete = "DELETE FROM products WHERE p_id='".$_GET['delete']."'";
    if(mysqli_query($con,$delete)){
    echo "<meta http-equiv='refresh' content='0.1;view_products.php'>";
    }
}

echo "<div class='row'>";
while($products = mysqli_fetch_array($query)){

    echo    "<div class='column'>";
    echo    "<div class='card'>";
    echo    "<img src='".$products['p_img']."'>";
    echo    "<h1>".$products['p_name']."</h1>";
    echo    "<p class='price'>".$products['p_price']."</p>";
    echo    "<p>".$products['p_desc']."</p>";
    echo    "<p><a href='purchase.php?id=".$products['p_id']."' class='aclass'><button>ซื้อสินค้า</button></a></p>";
    echo    "<p><a href='edit_product.php?id=".$products['p_id']."'>edit</a></p>";
    echo    "<a href='view_products.php?delete=".$products['p_id']."'>ลบ</a>";
    echo    "</div>";
    echo    "</div>";
}
echo "</div>";
?>

</body>
</html>
