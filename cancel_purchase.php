<?php
require('db.php');
include('auth.php');

$data = "UPDATE purchasing SET status='".$_GET['stt']."' WHERE pc_id='".$_GET['pc_id']."'";
if(mysqli_query($con,$data)){
    echo "<meta http-equiv='refresh' content='0.1;view_purchase.php'>";
}
else{
    echo "<div class='form'><p><a href='dashboard.php'>Dashboard.php</a></p></div>";
}

?>