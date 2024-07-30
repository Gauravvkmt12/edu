<?php
include "connection.php";

$alert = "";
$regi = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'], $_POST['Name'], $_POST['password'], $_POST['email'], $_POST['phone'])) {
        $username = $_POST['username'];
        $name = $_POST['Name'];
        $pass = $_POST['password'];
        $password = md5($pass);
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Validation
        if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
            $alert = "Only letters and white space allowed for username";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $alert = "Only letters and white space allowed for name";
        } elseif (!preg_match("/^\d{10}$/", $phone)) {
            $alert = "Phone number should be 10 digits long and contain only digits";
        } else {
            // Check if username exists
            $stmt = $conn->prepare("SELECT * FROM register WHERE Username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $alert = "This username already exists";
            } else {
                // Insert data
                $stmt_insert = $conn->prepare("INSERT INTO register (Username, Name, Password, Email, Phone) VALUES (?, ?, ?, ?, ?)");
                $stmt_insert->bind_param("sssss", $username, $name, $password, $email, $phone);
                if ($stmt_insert->execute()) {
                    $regi = "Registered successfully";
                    header("Location: index.php");
                    exit();
                } else {
                    $alert = "Error: " . $stmt_insert->error;
                }
            }

            $stmt->close();
            $stmt_insert->close();
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="./css/rge.css">
</head>
<body>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h2 class="text-center mb-4"><img src="../Assests/logo.png" alt="" class="img-fluid"></h2>
          <?php if (!empty($alert)): ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $alert; ?>
            </div>
          <?php endif; ?>
          <?php if (!empty($regi)): ?>
            <div class="alert alert-success" role="alert">
              <?php echo $regi; ?>
            </div>
          <?php endif; ?>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username" required>
            </div>
            <div class="form-group">
              <label for="Name">Name</label>
              <input type="text" class="form-control" placeholder="Enter your name" name="Name" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
            </div>
            <div class="form-group">
              <label for="Email">Email</label>
              <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
            </div>
            <div class="form-group">
              <label for="phone">Phone no</label>
              <input type="text" class="form-control" placeholder="Enter your phone no" name="phone" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block w-100">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
