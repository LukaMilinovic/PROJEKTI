
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
 
</head>
<body>
<?php
    $uk=10;
    for($i=1;$i<=3;$i++) {
        $b = rand(1,$uk);
        $pos[$i]="slike/slika$b.jpg";
    }

    date_default_timezone_set ('Europe/Belgrade');
    $sat = date ("h:i:s");
    $dani = date("d.m.Y");

   
    // $filename = __DIR__."/tekstovi/posao.txt";
    // $file = fopen($filename, "r");
    // $lines = file($filename);
    // $random_line = $lines[array_rand($lines)];
    // echo $random_line;
    // fclose($file);
   
    function ispisSve($sve){
      $filenames =[
          __DIR__."/tekstovi/ljubav.txt",
          __DIR__."/tekstovi/motivacija.txt",
          __DIR__."/tekstovi/posao.txt",
          __DIR__."/tekstovi/zdravlje.txt",
          ];
      $filename = $filenames[array_rand($filenames)];    
      $file = fopen($filename, "r");
      $lines = file($filename);
      $x = array_rand($lines);
      if($x%2!=0)
      {
        $citat = $lines[$x-1];
        $autor = $lines[$x];
      } else {
      $citat = $lines[$x];
      $autor = $lines[$x+1];
      }
      fclose($file);
      return "<p>$citat</p>" . "<p>$autor</p>";  
    }


    function ispis($tip){
      $filename = __DIR__."/tekstovi/$tip.txt";
      $file = fopen($filename, "r");
      $lines = file($filename);
      $x = array_rand($lines);
      if($x%2!=0)
      {
        $citat = $lines[$x-1];
        $autor = $lines[$x];
      } else {
      $citat = $lines[$x];
      $autor = $lines[$x+1];
      }
      fclose($file);
      return "<p>$citat</p>" . "<p>$autor</p>"; 
    }
?>

  <div class="row">
    <div class="col-12">
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
            <img src="<?php echo $pos[1]?>" alt="Slika1">
        </div>
        <div class="carousel-item">
          <img src="<?php echo $pos[2]?>" alt="Slika2">
        </div>
        <div class="carousel-item">
          <img src="<?php echo $pos[3]?>" alt="Slika3">
      </div>
           
          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span></a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span></a>
        </div>            
      </header>
    </div>
  </div>
    
  <div class="btn navItem" id="ljubavNav">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#ljubav"         aria-expanded="false" aria-controls="ljubav">
          Ljubav
        </button>
    </div>
    <div class="btn navItem" id="motivacijaNav">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#motivacija" aria-expanded="false" aria-controls="motivacija">
          Motivacija
        </button>
    </div>
    <div class="btn navItem" id="posaoNav">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#posao" aria-expanded="false" aria-controls="posao">
          Posao
        </button>
    </div>
    <div class="btn navItem" id="zdravljeNav">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#zdravlje" aria-expanded="false" aria-controls="zdravlje">
          Zdravlje
        </button>
    </div> 
<section>
<div id="accordion">
  <div class="card">  
    <div id="random" class="collapse show" aria-labelledby="random" data-parent="#accordion">
      <div class="card-body">
        <?php echo ispisSve("");?>
      </div>
    </div>
  </div>
  <div class="card">   
    <div id="motivacija" class="collapse" aria-labelledby="motivacija" data-parent="#accordion">
      <div class="card-body">
      <?php
          echo ispis("motivacija");
      ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div id="ljubav" class="collapse" aria-labelledby="ljubav" data-parent="#accordion">
      <div class="card-body">
      <?php
          echo ispis("ljubav");
      ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div id="posao" class="collapse" aria-labelledby="posao" data-parent="#accordion">
      <div class="card-body">
      <?php
          echo ispis("posao");
      ?>
      </div>
    </div>
  </div>
  
  <div class="card">
    <div id="zdravlje" class="collapse" aria-labelledby="zdravlje" data-parent="#accordion">
      <div class="card-body">
      <?php
          echo ispis("zdravlje");
      ?>
      </div>
    </div>
  </div>
</div>
</section>

<div class="row">
  <div class="col-12">
    <footer>
      <p><?php echo $sat?></p>
      <p><?php echo $dani?></p>
    </footer>
  </div>
</div>

</body>
</html>
