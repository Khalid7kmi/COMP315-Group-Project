<?php
include 'config.php';
include 'admin_header.php';

$name = "";
$description = "";
$price = 0;
$image = "";
$errorMessage = "";
$success = "";

$id = $_GET['id']; 

$sql = "SELECT * FROM foods WHERE id = '$id'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $name = $row['item_name'];
    $description = $row['description'];
    $price = $row['price'];
    $image = $row['image'];
} else {
    echo "Item not found!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['item_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // for image
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $target_dir = "uploads/";
        $target_file = $target_dir . time() . "_" . basename($_FILES["image"]["name"]);
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            
            if(!empty($image) && file_exists($image)){
                unlink($image);
            }
            $image = $target_file; 
        } else {
            $errorMessage = "Failed to upload image.";
        }
    }

    do {
        if(empty($name) || empty($description) || empty($price)){
            $errorMessage = "Some fields are not filled";
            break;
        }

        $sql = "UPDATE foods SET item_name='$name', description='$description', price='$price', image='$image' WHERE id='$id'";
        $result = $conn->query($sql);
        if(!$result){
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $success = "Item updated successfully!";
        

    } while(false);
}
?>

<html>
<head>

<title>Update Item</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
<h2>Update Item</h2>

<?php 

if(!empty($errorMessage)){
    echo "
    <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
      <strong>Holy guacamole!</strong> You should check in on some of those fields below.
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
    </div>";
}



if(!empty($success)){
    echo "<div class='alert alert-success' role='alert'>$success
    <a href='items_index.php'>Home Page</a></div>";
    
}


?>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Item Name</label>
        <input type="text" class="form-control" name="item_name" value="<?php echo $name; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="text" class="form-control" name="description" value="<?php echo $description; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" class="form-control" name="price" value="<?php echo $price; ?>" step="0.01">
    </div>

    <div class="mb-3">
        <label class="form-label">Upload Image</label>
        <input type="file" class="form-control" name="image" accept="image/*">
        <?php if(!empty($image) && file_exists($image)){ ?>
            <img src="<?php echo $image; ?>" style="max-width:150px; margin-top:10px;">
        <?php } ?>
    </div>

    <button type="submit" class="btn btn-primary">Update Item</button>
    <a href="items_index.php" class="btn btn-secondary">Back</a>
</form>
</div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
