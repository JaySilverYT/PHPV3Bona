<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
  Cinetics• by David & Sergio
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>
<!------ Include the above in your HEAD tag ---------->




<body class="register-page">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="./index.php" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
          <span>Cinetics•</span> Design System
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a>
              Cinetics•
              </a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
              <i class="fab fa-twitter"></i>
              <p class="d-lg-none d-xl-none">Twitter</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
              <i class="fab fa-facebook-square"></i>
              <p class="d-lg-none d-xl-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
              <i class="fab fa-instagram"></i>
              <p class="d-lg-none d-xl-none">Instagram</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.html">Back to Kit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://github.com/creativetimofficial/blk-design-system/issues">Have an issue?</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header">
      <div class="page-header-image"></div>
      <div class="content">
        <div class="container">
            
        <div class="container contact-form">
    <div class="contact-image">
        <a href="./index.php"><img src="assets/img/logoPeque.png" alt="logo" /></a>
    </div>
    <form method="POST" action="./lib/verificarPOST.php">
        <h3>Registrate Ahora</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Enter a username *" value="" />
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter your email *" value="" />
                    <?php
                    if (isset($_GET['error']) && $_GET['error'] == true) {
                      echo "<div class='alert alert-danger'>" . $_GET['error'] ."</div><br>";
                    }?>
                </div>
                <div class="form-group">
                    <input type="text" name="firstname" class="form-control" placeholder="Enter your first name " value="" />
                </div>
            </div>

            <div class="col-md-6">

                <div class="form-group">
                    <input type="text" name="lastname" class="form-control" placeholder="Enter your last name " value="" />
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter a password *" value="" />
                </div>

                <div class="form-group">
                    <input type="password" name="verifypassword" class="form-control" placeholder="Repeat password *" value="" />
                    <?php
                    if (isset($_GET['errorPsw']) && $_GET['errorPsw'] == true) {
                      echo "<div class='alert alert-danger'>" . $_GET['errorPsw'] ."</div><br>";
                    }?>
                </div>

            </div>
            <div class="col-md-12">
                <div class="">         
                    <input type="submit" class="btn btn-primary btn-sm" name="submit" class="btnContact" value="Submit" />
                </div>
            </div>
        </div>
    </form>
</div>

        </form>
        
          <div class="register-bg" style="z-index: -100000;"></div>
          <div id="square1" class="square square-1" style="z-index: -100000;"></div>
          <div id="square2" class="square square-2" style="z-index: -100000;"></div>
          <div id="square3" class="square square-3" style="z-index: -100000;"></div>
          <div id="square4" class="square square-4" style="z-index: -100000;"></div>
          <div id="square5" class="square square-5" style="z-index: -100000;"></div>
          <div id="square6" class="square square-6" style="z-index: -100000;"></div>
        </div>
      </div>
    </div>

<?php Include "Includes/footer.php"?>;

</body>
</html>



