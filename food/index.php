<?php
include "header.php";
include "config.php";
 

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<?php
/*
        $sql = "SELECT * FROM foods";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
        */
?>

<html>
    <body>
    	<div class="alert alert-success alert-dismissible fade show text-center m-3" role="alert">
    <strong>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

	</body>
</html>

<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=3">
      <link rel="stylesheet" href="style.css">

</head>

<body>




    <section class="hero text-center py-5">
        <div class="hero-content">
            <h1>Taste Our Best Jazan Cuisine</h1>
            <style>
.btn-primary.mt-3 {
  background-color: #BE6741; 
  border-color: #BE6741;
  color: white;
}
</style>
</head>
<body>
<a href="menu.php" class="btn btn-primary mt-3">Browse Menu</a>
        </div>
    </section>

<section class="featured container my-5">
    <h2 class="text-center mb-4">Featured Dishes</h2>
    <div class="row">

        <?php
        $sql = "SELECT * FROM foods LIMIT 3"; 
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <img src="admin/<?= $row['image'] ?>" 
                         class="card-img-top" 
                         alt="<?= $row['item_name'] ?>" 
                         style="height:200px; object-fit:cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $row['item_name'] ?></h5>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
