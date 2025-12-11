<?php
session_start();
include 'config.php';
include 'header.php';

// Check if user is logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['id'];
?>
<head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"></head>
<div class="container mt-5">
    <h2 class="text-center mb-4">My Orders</h2>
    
    <table class="table table-bordered table-striped shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>Order ID</th>
                <th>Food Item</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Date of Order</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php

        $sql = "
            SELECT orders.*, foods.item_name 
            FROM orders
            JOIN foods ON orders.food_id = foods.id
            WHERE orders.user_id = ?
            ORDER BY orders.created_at DESC
        ";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['item_name']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['total_price']} SR</td>
                        <td>{$row['status']}</td>
                        <td>{$row['created_at']}</td>
                        <td>
                            <a href='delete_order.php?id={$row['id']}' 
                               onclick=\"return confirm('Are you sure you want to cancel this order?');\" 
                               class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'>You have no orders yet. <a href='menu.php'>Order now!</a></td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

