<?php
require("connection.php");
error_reporting(0);

$img=$_GET['img'];
$query = "DELETE FROM products WHERE img = '$img'";
$data = mysqli_query($con,$query);

if($data){
    ?>
    <script type="text/javascript">
                alert("Deleted Succesfully");
                window.location = "userprofile.php";
            </script>
    <?php
}else{
    echo "Failed to delete";
}
?>