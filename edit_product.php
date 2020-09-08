<?php 
require('db.php');
include('auth.php');

$id = $_GET['id'];

$data = "SELECT * FROM products WHERE p_id='$id'";
$query = mysqli_query($con,$data);
$result = mysqli_fetch_array($query);

?>

<link rel="stylesheet" href="style.css">

<div class="form">
<a href="dashboard.php">Dashboard</a>

    <form action="" method="post" name="fEditProduct" enctype="multipart/form-data">
        <img src="<?php echo $result['p_img']; ?>" width="25%"><br>
        ชื่อสินค้า : <input type="text" name="p_name" id="p_name" value="<?php echo $result['p_name']; ?>"><br>
        คำอธิบายสินค้า : <input type="text" name="p_desc" id="p_desc" value="<?php echo $result['p_desc']; ?>"><br>
        ราคา : <input type="text" name="p_price" id="p_price" value="<?php echo $result['p_price']; ?>"><br>
        รูปภาพสินค้า : <input type="file" name="p_img" id="p_img" value="<?php echo $result['p_img']; ?>"><br>
        <input type="hidden" name="p_id" value="<?php echo $result['p_id']; ?>">
        <button type="submit" name="submit">อัพเดท</button><br>

        <?php
            if(isset($_POST["submit"])) {
                if($_FILES['p_img']['name'] != ""){
                    $target_dir = "upload_img/";
                    $target_file = $target_dir . basename($_FILES["p_img"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    if (move_uploaded_file($_FILES["p_img"]["tmp_name"], $target_file)) {
                        $data = "UPDATE products SET p_name='".$_POST['p_name']."' ,p_desc='".$_POST['p_desc']."' ,p_price='".$_POST['p_price']."' ,p_img='".$target_file."' WHERE p_id='".$_POST['p_id']."'";
                        if($query = mysqli_query($con,$data)){
                            echo "<meta http-equiv='refresh' content='0.1'>";
                        }        
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                else{
                    $data = "UPDATE products SET p_name='".$_POST['p_name']."' ,p_desc='".$_POST['p_desc']."' ,p_price='".$_POST['p_price']."' WHERE p_id='".$_POST['p_id']."'";
                    if($query = mysqli_query($con,$data)){
                        echo "<meta http-equiv='refresh' content='0.1'>";
                    }    
                }
                
            }
        ?>
        
    </form>
</div>