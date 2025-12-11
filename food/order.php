<?php
session_start();
include "config.php";
include "header.php";


if (!isset($_SESSION['username'])) {
    die("<h3 style='text-align:center; margin-top:40px;'>You must be logged in to place an order.</h3>");
}


if (!isset($_GET['food_id'])) {
    die("Food not found.");
}

$food_id = intval($_GET['food_id']);

// Fetch selected food
$food_sql = "SELECT * FROM foods WHERE id = $food_id";
$food_result = mysqli_query($conn, $food_sql);
$food = mysqli_fetch_assoc($food_result);

if (!$food) {
    die("Food item does not exist.");
}


if (isset($_POST['place_order'])) {

    $quantity = intval($_POST['quantity']);
    if ($quantity < 1) $quantity = 1;

    $price = $food['price'];
    $total = $price * $quantity;


$user_id = $_SESSION['id'];

$insert = "
    INSERT INTO orders (user_id, food_id, quantity, total_price, status)
    VALUES ($user_id, $food_id, $quantity, $total, 'pending')
";
mysqli_query($conn, $insert);



    echo "<script>alert('Order placed successfully!'); 
          window.location='orders.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order <?= $food['title'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">
                
                <img src="admin/<?= $food['image'] ?>" 
                     class="card-img-top" 
                     style="height:250px; object-fit:cover;">

                <div class="card-body">

                    <h3><?= $food['title'] ?></h3>
                    <p><?= $food['description'] ?></p>

                    <h5 class="text-primary">Price: <?= $food['price'] ?> SR</h5>


                    <form method="POST" class="mt-3">

                        <label class="form-label">Quantity:</label>
                        <input type="number" name="quantity" value="1" min="1" class="form-control mb-3" style="max-width:150px;">

                        <button type="submit" name="place_order" class="btn btn-success w-100">
                             Order
                        </button>
                    </form>

                </div>
            </div>

        </div>

    </div>
</div>

</body>
</html>
