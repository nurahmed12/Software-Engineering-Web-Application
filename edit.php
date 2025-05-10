<?php 
include "connection.php";

$id = $name = $email = $phone = "";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }

    $id = $_GET["id"];
    $stmt = $conn->prepare("SELECT * FROM crud1 WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result || $result->num_rows === 0) {
        header("Location: index.php");
        exit;
    }

    $row = $result->fetch_assoc();
    $name = $row['Name'];
    $email = $row['Email'];
    $phone = $row['Phone'];
    $stmt->close();
} else {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE crud1 SET Name = ?, Email = ?, Phone = ? WHERE ID = ?");
    $stmt->bind_param("sssi", $name, $email, $phone, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update User</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="index.php">USER LIST</a>
    </nav>
    <div class="container my-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Update Info</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($name) ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($phone) ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                            <a href="index.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
