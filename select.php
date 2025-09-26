<?php include("db_connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f4f7fb; }
    .card { border-radius: 12px; }
    .table thead { background: #0d6efd; color: white; }
    .btn { border-radius: 20px; }
  </style>
</head>
<body>

<?php include("navbar.php"); ?>

<div class="container py-5">
  <div class="card shadow-lg">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0 text-primary fw-bold">📋 Student Records</h4>
      <a href="insert.php" class="btn btn-success">+ Add Student</a>
    </div>
    <div class="card-body">
      <?php
      $orderBy = isset($_GET['sort']) && in_array($_GET['sort'], ['name','email']) ? $_GET['sort'] : 'id';
      $result = $conn->query("SELECT * FROM students ORDER BY $orderBy ASC");
      ?>
      <table class="table table-hover align-middle text-center">
        <thead>
          <tr>
            <th>ID</th>
            <th><a href="select.php?sort=name" class="text-white text-decoration-none">Name</a></th>
            <th><a href="select.php?sort=email" class="text-white text-decoration-none">Email</a></th>
            <th>Course</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= htmlspecialchars($row['course']) ?></td>
              <td>
                <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id'] ?>">🗑 Delete</button>
                <div class="modal fade" id="deleteModal<?= $row['id'] ?>" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete <strong><?= htmlspecialchars($row['name']) ?></strong>?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="5" class="text-muted">No student records found</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
