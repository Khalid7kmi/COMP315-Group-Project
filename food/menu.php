<?php 
include "config.php"; 
include "header.php";   
?>
<head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"></head>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Menu</h2>

    <div class="row">

        <?php
        $sql = "SELECT * FROM foods";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
<div class="col-md-4 mb-4">
    <div class="card" style="width: 18rem;">


        <img src="admin/<?= $row['image'] ?>" 
             class="card-img-top" 
             alt="<?= $row['item_name'] ?>"
             style="height:200px; object-fit:cover;">


        <div class="card-body">
            <h5 class="card-title"><?= $row['item_name'] ?></h5>

            <p class="card-text">
                <?= substr($row['description'], 0, 90) ?>
            </p>

            <p class="fw-bold mb-2">Price: <?= $row['price'] ?> SR</p>

            <a href="order.php?food_id=<?= $row['id'] ?>" 
               class="btn btn-primary w-100">
               Order Now
            </a>
        </div>

    </div>
</div>

        <?php
        }
        ?>

    </div>
</div>


