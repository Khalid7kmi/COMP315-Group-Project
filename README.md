# COMP315-Group-Projuct
<h1>A simple food Service System</h1>

<h2>Students</h2>
<table>
  <tr>
    <th>Name</th>
    <th>ID</th>
    <th>TBD</th>
  </tr>
  <tr>
    <td>Khalid Hakami</td>
    <td>TBD</td>
    <td>TBD</td>
    <td>TBD</td>

  </tr>
  <tr>
    <td>202412133</td>
    <td>TBD</td>
    <td>TBD</td>
    <td>TBD</td>

  </tr>
</table>





<h1>📌 Requirements & Proofs</h1>

<p>
Below are all required project criteria with that was mentioned in the Mini Project Grading Rubric file.

</p>

<hr>

<h2>✅ 1. SELECT Query (Fetching Data)</h2>

<p><strong>Requirement:</strong> The project must include a working SQL SELECT query to fetch data from MySQL.</p>

<h3>Proof (Screenshot + Code)</h3>

<p><em>📸 Insert screenshot of menu or orders page showing database results.</em></p>

<pre>
<code>
-- SELECT Query Example
$sql = "SELECT * FROM foods";
$result = mysqli_query($conn, $sql);
</code>
</pre>

<hr>

<h2>✅ 2. INSERT Query (Adding Data)</h2>

<p><strong>Requirement:</strong> System must allow adding records (e.g., registration, add food) using INSERT.</p>

<h3>Proof</h3>

<p><em>📸 Insert screenshot of a successful "Add Food" or "Register" action.</em></p>

<pre>
<code>
-- INSERT Query Example
$insert = "INSERT INTO foods (title, description, price, image)
           VALUES ('$title', '$description', '$price', '$image')";
mysqli_query($conn, $insert);
</code>
</pre>

<hr>

<h2>✅ 3. UPDATE / DELETE Queries</h2>

<p><strong>Requirement:</strong> Admin must be able to update or delete records.</p>

<h3>Proof</h3>

<p><em>📸 Insert screenshot of admin editing or deleting a food item.</em></p>

<pre>
<code>
-- UPDATE Query
$update = "UPDATE foods SET title='$title', price='$price' WHERE id=$id";
mysqli_query($conn, $update);

-- DELETE Query
$delete = "DELETE FROM foods WHERE id = $id";
mysqli_query($conn, $delete);
</code>
</pre>

<hr>

<h2>✅ 4. Authentication (Login / Logout with Sessions)</h2>

<p><strong>Requirement:</strong> Working login and logout system using PHP sessions.</p>

<h3>Proof</h3>

<p><em>📸 Insert GIF or screenshot of login -> dashboard -> logout.</em></p>

<pre>
<code>
-- Login Session
session_start();
$_SESSION['user_id'] = $user['id'];

-- Logout
session_destroy();
</code>
</pre>

<hr>

<h2>✅ 5. Form Handling (At Least One Form)</h2>

<p><strong>Requirement:</strong> A working form that processes user input (order form, register form, etc).</p>

<h3>Proof</h3>

<p><em>📸 Insert screenshot of any working form (order, login, register).</em></p>

<pre>
<code>
-- Form Processing Example
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantity = $_POST['quantity'];
}
</code>
</pre>

<hr>

<h2>✅ 6. Bootstrap & UI/UX Design (2 Marks)</h2>

<p><strong>Requirement:</strong> The project must use Bootstrap for a responsive and clean UI.</p>

<h3>Proof</h3>

<p><em>📸 Insert screenshots of menu, homepage, navbar, admin dashboard.</em></p>

<pre>
<code>
-- Example Bootstrap Component
<nav class="navbar navbar-expand-lg navbar-light bg-light">
</nav>
</code>
</pre>

<hr>

<h2>✅ 7. File Upload & Storage (File Handling)</h2>

<p><strong>Requirement:</strong> Upload files (images) and store the file path in the database.</p>

<h3>Proof</h3>

<p><em>📸 Insert screenshot of admin upload page and uploads/ folder.</em></p>

<pre>
<code>
-- File Upload Example
$image_name = $_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], "admin/uploads/" . $image_name);
</code>
</pre>

<hr>

<h2>✅ 8. Code Reusability (include/require)</h2>

<p><strong>Requirement:</strong> Use include/require for header, footer, and database config.</p>

<h3>Proof</h3>

<p><em>📸 Insert screenshot of the includes/ folder structure.</em></p>

<pre>
<code>
-- Example Include Usage
include "includes/header.php";
include "config.php";
</code>
</pre>

<hr>

<h2>✅ 9. Hosting & Accessibility</h2>

<p><strong>Requirement:</strong> The project must be hosted online (InfinityFree, 000webhost, etc.).</p>

<h3>Proof</h3>

<p><strong>🔗 Live Website Link:</strong></p>
<p><em>Paste your URL here</em></p>

<p><em>📸 Insert screenshot of the website running online.</em></p>

<pre>
<code>
-- Optional: Write your hosting setup steps here
</code>
</pre>

<hr>



