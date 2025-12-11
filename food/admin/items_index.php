<?php
   session_start();
   include 'config.php';
   include 'admin_header.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check user
    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check password (assuming plain text for now, better to hash!)
        if ($password == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: orders.php"); // redirect to your page
            exit;
        } else {
            $error = "Incorrect password";
        }
    } else {
        $error = "User not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script>
function myFunction() {
  let text = "Press a button!\nEither OK or Cancel.";
  if (confirm(text) == true) {
    text = "You pressed OK!";
  } else {
    text = "You canceled!";
  }
  document.getElementById("demo").innerHTML = text;
}
</script>
    <meta charset="UTF-8">
    <title>Item List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.0/dist/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<div class="container m-5">
    <h1>Item List</h1>
    <a class="btn btn-primary mb-3" href="create.php" role="button">New item</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Description	</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
        <?php
  

        $sql = "SELECT * FROM foods";
        $result = $conn->query($sql);

        if (!$result) {
            die("Invalid query: " . $conn->error);
        }

       while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['item_name']}</td>
            <td>{$row['description']}</td>
            <td>{$row['price']}</td>
            <td>";
           //for image
           if (!empty($row['image']) && file_exists($row['image'])) {
        echo "<img src='{$row['image']}' alt='Item Image' style='max-width:100px;'>";
    } else {
        echo "No image";
    }

    echo "</td>
          <td>";
    
    // Update button
    echo "<a class='btn btn-warning btn-sm' href='update.php?id={$row['id']}' role='button'>Update</a> ";

    // Delete button
echo "<a class='btn btn-danger btn-sm' 
         href='delete.php?id=" . $row['id'] . "' 
         onclick=\"return confirm('Are you sure you want to delete this item?');\">
         Delete
      </a>";

    echo "</td></tr>";
}

        ?>
        </tbody>
    </table>
</div>

</body>
</html>
