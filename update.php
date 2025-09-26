<?php include("db_connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include("navbar.php"); ?>

<div class="container py-5">
  <div class="card shadow-lg rounded-3">
    <div class="card-header bg-warning">
      <h4 class="mb-0">Edit Student</h4>
    </div>
    <div class="card-body">
      <?php
      $id = $_GET['id'];
      $result = $conn->query("SELECT * FROM students WHERE id=$id");
      $row = $result->fetch_assoc();
      ?>
      <form action="" method="POST" class="needs-validation" novalidate>
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="name" value="<?= htmlspecialchars($row['name']); ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="<?= htmlspecialchars($row['email']); ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Course</label>
          <input type="text" name="course" value="<?= htmlspecialchars($row['course']); ?>" class="form-control" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
      </form>
      <?php
      if (isset($_POST['update'])) {
          $stmt = $conn->prepare("UPDATE students SET name=?, email=?, course=? WHERE id=?");
          $stmt->bind_param("sssi", $_POST['name'], $_POST['email'], $_POST['course'], $id);
          if ($stmt->execute()) {
              echo "<div class='alert alert-success mt-3'>Record updated successfully!</div>";
          } else {
              echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
          }
      }
      ?>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
