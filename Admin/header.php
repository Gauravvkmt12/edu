<?php
include "checksession.php";
$sql = "SELECT * FROM contact";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .dropdown-toggle::after {display: none;}
        .dropdown-item:hover{background-color:#dc3545; color:#ffffe1;}
    </style>
</head>
<body>
<div class="container py-4">
  <div class="row align-items-center">
    <div class="col-6 col-md-3">
      <a href="main.php"><img src="../Assests/logo.png" alt="ELibrary Logo" class="img-fluid" style="max-width:150px;"></a>
    </div>
    <div class="col-6 col-md-9 text-end">
      <div class="dropdown align-items-center">
        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="d-flex align-items-center">
          <img src="<?php echo isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : '../Assests/default.jpeg'; ?>" 
          alt="Profile Picture" 
          style="max-width:40px; border-radius:50%; margin-right:5%;"> 
            <h5> Hi!
            <?php
                if(isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                } else {
                    echo "Username not set";
                } 
            ?>
            </h5>
          </div>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="manageaccount.php">Manage Account</a></li>
          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Modal for logout with animations -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <i class="bi bi-box-arrow-right" style="font-size:2rem;"></i>
          <p class="">Are you sure you want to logout?</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="logout.php" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>