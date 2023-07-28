<?php 
    session_start();
    require_once "connection.php";
    require_once "validation.php";
    require_once "header.php";

    $poruka = "";
    if (isset($_GET["p"]) && $_GET["p"] == "ok")
    {
        $poruka = "You have successfully registered, please login to continue";
    } 

    $username = "anonymus";
    if (isset($_SESSION["username"])) // da li je logovan korisnik
    {
        $username = $_SESSION["username"];
        $id = $_SESSION["id"]; // id logovanog korisnika
        $row = profileExists($id, $conn);
        $m = "";
        if ($row === false)
        {
            // Logovani korisnik nema profil
            $m = "Create";
        }
        else
        {
            // Logovani korisnik ima profil
            $m = "Edit";
            $username = $row["first_name"] . " " . $row["last_name"];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Network</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .carousel-item img {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="alert alert-success" role="alert">
        <?php echo $poruka; ?>
    </div>


    <!-- slider, pozadinska slika, ... -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
              <header>
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                      <li data-target="#demo" data-slide-to="0" class="active"></li>
                      <li data-target="#demo" data-slide-to="1"></li>
                      <li data-target="#demo" data-slide-to="2"></li>
                    </ul>                    
                              <!-- The slideshow -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="pictures/slika1.jpg" alt="Slika1">
                    </div>
                    <div class="carousel-item">
                      <img src="pictures/slika2.jpg" alt="Slika2">
                    </div>
                    <div class="carousel-item">
                      <img src="pictures/slika3.jpg" alt="Slika3">
                    </div>
                  </div>
           
          <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span></a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span></a>
              </div>            
            </header>
          </div>

          <div class="col-md-6">
            <h1>Welcome, <?php echo $username ?>, to our Social Network!</h1>
            <?php if (!isset($_SESSION["username"])) { ?>
                <p>New to our site? <a href="register.php">Register here</a> to access our site!</p>
                <p>Already have the account? <a href="login.php">Login here</a> to continue to our site!</p>
            <?php } else { ?>
                <p><?php echo $m ?> a <a href="profile.php">profile</a>.</p>
                <p>See other members <a href="followers.php">here</a>.</p>
                <p><a href="logout.php">Logout</a> from our site.</p>
            <?php } ?>

          </div>
        </div>
    </div>
</body>
</html>