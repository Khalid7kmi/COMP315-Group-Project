<?php
include 'config.php';
include 'admin_header.php';

$name = "";
$description = "";
$price = "";
$image = "";
$errorMessage = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['item_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if (!empty($_FILES['image']['name'])) {

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        } else {
            $errorMessage = "Failed to upload image.";
        }

    } else {
        $errorMessage = "Please select an image.";
    }

    if (empty($errorMessage)) {

        if (empty($name) || empty($description) || empty($price) || empty($image)) {
            $errorMessage = "All fields are required.";
        } 
        else {
            $sql = "INSERT INTO foods (item_name, description, price, image)
                    VALUES ('$name', '$description', '$price', '$image')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: items_index.php");
                exit;
            } else {
                $errorMessage = "Database error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<html>
<head>
<title>Add Item</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
<h2>Add Item</h2>

<?php 
if(!empty($errorMessage)){
    echo "<div class='alert alert-danger'>$errorMessage</div>";
}
?>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Item Name</label>
        <input type="text" class="form-control" name="item_name" value="<?= $name ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="text" class="form-control" name="description" value="<?= $description ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" class="form-control" name="price" value="<?= $price ?>" step="0.01">
    </div>

    <div class="mb-3">
        <label class="form-label">Upload Image</label>
        <input type="file" class="form-control" name="image" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Add Item</button>
    <a href="items_index.php" class="btn btn-secondary">Back</a>
</form>

</div>

</body>
</html>
