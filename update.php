<!-- <?php
require("connection.php");
error_reporting(0);

$img = $_GET['img'];
$cat = $_GET['category'];
$pri = $_GET['price'];
$desc = $_GET['description'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<ul class="sell">Edit Product</ul>
<center>
    <div class="container">
    <form method = "post" action = "userprofile.php" id ="form_design" enctype="multipart/form-data">
    <div class="file_upload">
    <input type="file" name="image" value="$img" accept="image/png, image/gif, image/jpeg">
    </div>
    <div class="sell_design">
    <label class="category "for="category">Select a category</label><br><br>
    <select class="prod" name="categories" id="product">
       <optgroup label="Electronics">
           <option value="Cellphone Accesories">Cellphone Gadgets</option>
        </optgroup> 
        <optgroup label="Clothing">
            <option value="Mens Wear">Mens Wear</option>
            <option value="Womens Wear">Womens Wear</option>
        </optgroup>
        <optgroup label="Accesories">
            <option value="Ring">Rings</option>
            <option value="Necklace">Necklace</option>
            <option value="Beauty Products">Beauty Products</option>
        </optgroup>
        <optgroup label="Parts">
            <option value="Household">Household</option>
            <option value="Car Parts">Car Parts</option>
            <option value="Computer Parts">Computer Parts</option>
        </optgroup>
    </select><br><br>
    <label class="desc" for="desc">Description</label><br><br>
    <textarea name="product_desc" id="" cols="30" rows="10" 
    placeholder="Describe what you are selling and include any details a buyer might be interested in. People love items with stories!"></textarea><br><br>
    <label class="price" for="price">Price</label><br><br>
    <textarea name="price" placeholder="Price for your listing"></textarea><br><br>
    <input class="list_item" type="submit" name="submit" value="List Now">
    <div class="notif">
    <?php echo $msg ?>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
</center>
</body>
</html> -->