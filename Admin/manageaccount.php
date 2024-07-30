<?php
include "header.php";
$alert = '';
$username = $_SESSION['username'];
$sql = "SELECT * FROM register WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['Name'];
    $phone = $row['Phone'];
    $email = $row['Email'];
    $profile_picture = isset($row['profile_picture']) ? $row['profile_picture'] : ''; // Default to empty string if not present
} else {
    $alert = "Error retrieving user information: " . mysqli_error($conn);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['remove_profile_picture'])) {
        unset($_SESSION['profile_picture']);
        $update_sql = "UPDATE register SET profile_picture='' WHERE username='$username'";
        $update_result = mysqli_query($conn, $update_sql);
        if ($update_result) {
            $alert = "Profile photo removed successfully!";
        } else {
            $alert = "Error removing profile photo: " . mysqli_error($conn);
        }
    } else {
        if(isset($_FILES['profile_picture'])) {
            $file = $_FILES['profile_picture'];
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];
            $file_error = $file['error'];
            if($file_error === 0) {
                $file_destination = 'uploads/' . $file_name;
                move_uploaded_file($file_tmp, $file_destination);
                $profile_picture = $file_destination;
                $_SESSION['profile_picture'] = $profile_picture;
                $update_sql = "UPDATE register SET profile_picture='$profile_picture' WHERE username='$username'";
                $update_result = mysqli_query($conn, $update_sql);
                if ($update_result) {
                    $alert = "Profile photo uploaded successfully!";
                } else {
                    $alert = "Error updating profile photo: " . mysqli_error($conn);
                }
            } else {
                $alert = "Error uploading file: " . $file_error;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Account</title>
</head>
<body>
<div class="container mt-5">
    <div class="row py-4">
      <div class="col-md-6 offset-md-3 border border-rounded">
        <h2 class="text-center mb-4"><img src="../Assests/logo.png" alt="" class="img-fluid"></h2>
        <?php if(!empty($alert)): ?>
          <div class="alert <?php echo $update_result ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $alert; ?>
          </div>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $username; ?>" readonly>
          </div>
          <div class="form-group">
            <?php if(!empty($profile_picture)): ?>
            <div class="text-center mb-2">
              <img src="<?php echo $profile_picture; ?>" alt="Profile Picture" class="img-fluid" style="width:150px; height:150px; border-radius:50%;">
            </div>
            <?php endif; ?>
            <label for="profile_picture">Upload/Remove Profile Picture</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture">
            <?php if(!empty($profile_picture)): ?>
            <button type="submit" class="btn btn-danger btn-block mt-2" name="remove_profile_picture">Remove Profile Photo</button>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $name; ?>">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $phone; ?>">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary btn-block mt-2 mb-4">Update</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>