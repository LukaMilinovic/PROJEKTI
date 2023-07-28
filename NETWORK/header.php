
<!DOCTYPE html>
<html>
<head>
  <title>My Website</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav>
  <div class="container">
        <div class="row">
            <div class="col-md-6">
    <div class="nav-bar">
      <button><a href="index.php">Home</a></button>
      <?php
      //session_start();
      if (isset($_SESSION['username'])) {
        // Prikaz menija za logovane korisnike
        echo '<button><a href="profile.php">Profile</a></button>';
        echo '<button><a href="followers.php">Connections</a></button>';
        echo '<button><a href="logout.php">Logout</a></button>';
      } else {
        // Prikaz menija za nelogovane korisnike
        echo '<button><a href="register.php">Register</a></button>';
        echo '<button><a href="login.php">Login</a></button>';
      }
      ?>
    </div>
    </div>
    </div>
    </div>
  </nav>
</body>
</html>