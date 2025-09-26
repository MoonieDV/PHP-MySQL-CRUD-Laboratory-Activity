<?php include("db_connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f4f7fb; }
    .card { border-radius: 12px; }
    .btn { border-radius: 20px; }
  </style>
</head>
<body>

<?php include("navbar.php"); ?>

<div class="container py-5">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">➕ Add Student</h4>
    </div>
    <div class="card-body">
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $course = $_POST['course'];
        $sql = "INSERT INTO students (name, email, course) VALUES ('$name', '$email', '$course')";
        if ($conn->query($sql)) {
          echo "<div class='alert alert-success'>Student added successfully!</div>";
        } else {
          echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
      }
      ?>
      <form method="POST">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Course</label>
          <input type="text" name="course" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="select.php" class="btn btn-secondary">Back</a>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
