<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
  <title>CRUD APP</title>
</head>
<body>
  <nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="index.php">USER LIST</a>
  </nav>

  <div class="container m-3">
    <div class="d-flex justify-content-end mb-3">
      <a class="btn btn-primary" href="create.php">ADD NEW</a>
    </div>

    <table class="table table-striped-columns table-bordered border-primary">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Joining Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        include "connection.php"; 
        $result = $conn->query("SELECT * FROM crud1"); 
        if (!$result) die("Query Failed");

        while ($row = $result->fetch_assoc()) {
          echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['join_date']}</td>
            <td>
              <a class='btn btn-success btn-sm' href='edit.php?id={$row['id']}'>Edit</a>
              <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id']}'>Delete</a>
            </td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
