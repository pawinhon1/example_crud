<?php
require("db.php");
include("auth.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้า</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="form">
<a href="dashboard.php">Dashboard</a>
    <form action="" method="post" name="fAddProduct" enctype="multipart/form-data">
        ชื่อสินค้า : <input type="text" name="p_name" id="p_name"  value="1" required><br>
        คำอธิบายสินค้า : <input type="text" name="p_desc" id="p_desc" required><br>
        ราคา : <input type="text" name="p_price" id="p_price" required><br>
        รูปภาพสินค้า : <input type="file" name="p_img" id="p_img" required><br>
        <button type="submit" name="submit">เพิ่มสินค้า</button><br>

        <?php
            if(isset($_POST["submit"])) {
                $target_dir = "upload_img/";
                $target_file = $target_dir . basename($_FILES["p_img"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if (move_uploaded_file($_FILES["p_img"]["tmp_name"], $target_file)) {
                    $data = "INSERT INTO products (p_name,p_desc,p_price,p_img) VALUES ('".$_POST['p_name']."', '".$_POST['p_desc']."', '".$_POST['p_price']."', '".$target_file."')";
                    if($query = mysqli_query($con,$data)){
                        echo "เพิ่มสินค้าเรียบร้อย<br>";
                        echo "<img src='".$target_file."' width='250px'>";
                    }        
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        ?>
        
    </form>
</div>
</body>
</html>

