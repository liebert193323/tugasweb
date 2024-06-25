<?php
require 'function.php';
require 'cek.php';

// Get the item ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve item details from the database
    $stmt = $conn->prepare("SELECT * FROM barang WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();

    if (!$item) {
        echo "Item not found!";
        exit();
    }
} else {
    echo "No item ID specified!";
    exit();
}

// Handle form submission for editing the item
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $office = $_POST['office'];
    $age = $_POST['age'];
    $start_date = $_POST['start_date'];
    $salary = $_POST['salary'];

    // Update item details in the database
    $stmt = $conn->prepare("UPDATE barang SET name=?, position=?, office=?, age=?, start_date=?, salary=? WHERE id=?");
    $stmt->bind_param("sssissi", $name, $position, $office, $age, $start_date, $salary, $id);
    $stmt->execute();

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Edit Barang</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" class="form-control" name="position" id="position" value="<?php echo htmlspecialchars($item['position']); ?>" required>
            </div>
            <div class="form-group">
                <label for="office">Office</label>
                <input type="text" class="form-control" name="office" id="office" value="<?php echo htmlspecialchars($item['office']); ?>" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" name="age" id="age" value="<?php echo htmlspecialchars($item['age']); ?>" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo htmlspecialchars($item['start_date']); ?>" required>
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="number" class="form-control" name="salary" id="salary" value="<?php echo htmlspecialchars($item['salary']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
