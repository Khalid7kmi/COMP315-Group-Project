<style>
.navbar-custom {
    background-color: #BE6741;
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm navbar-custom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">Our Restaurant</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="orders.php">My Orders</a></li>
                    <li class="nav-item"><a class="nav-link text-warning" href="logout.php">Logout</a></li>
                    <li class="nav-item ms-2 text-white small">Welcome, <?php echo $_SESSION['user_name'] ?? ''; ?></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login/Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
            <a href="orders.php" class="btn btn-light text-brown fw-bold">Your Orders</a>
        </div>
    </div>
</nav>
