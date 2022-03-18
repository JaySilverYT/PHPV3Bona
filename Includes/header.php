<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
      Cinetics• by David & Sergio
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body class="index-page">
  <!-- Navbar -->
  <header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
      <div class="container">
        <div class="navbar-translate">
          <a class="navbar-brand" href="../home.php" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom">
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
              <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                <i class="fab fa-instagram"></i>
                <p class="d-lg-none d-xl-none">Instagram</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../home.php">
                <i class="fas fa-home"></i> Home
              </a>
            </li>
            <li class="nav-item">
              <!--navlink sale en movil pero sin estilo del boton, nav-link btn btn-default d-none d-lg-block sale el btn -->
              <!--cambiar que pongas los botones con estilo y salgas tmb en el modo movil-->
              <a class="btnNav" href="../videoFORM.php" onclick="scrollToDownload()">
                <i class="tim-icons icon-cloud-upload-94"></i> Upload Video
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../lib/log-out.php" onclick="scrollToDownload()">
                <i class="tim-icons icon-single-02"></i> Log Out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>