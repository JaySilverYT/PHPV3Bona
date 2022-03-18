<?php
$idVideoAntic=null;
if (!isset($_COOKIE[session_name()])) {
  header("Location: ./index.php");
  exit;
} else {
  session_start();
  if (!isset($_SESSION['username']) && !isset($_SESSION['mail'])) {
    header("Location: ./lib/log-out.php");
    exit;
  } else {
    include "Includes/header.php";
    include "lib/bbddConex.php";
?>

    <body class="register-page col-12 col-lg-12">

      <div class="d-flex justify-content-center col-12 col-lg-12">
        <div class="squares square1"></div>
        <div class="squares square2"></div>
        <div class="squares square3"></div>
        <div class="squares square5"></div>
        <div class="squares square6"></div>
        <div class="squares square7"></div>

        <div class="content-center brand">
          <!--<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">-->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <?php
              $row = null;
              $likeDislike = false;
              if (isset($_GET['rand']) == true && $_GET['rand'] == true) {
                //viene por la función de videoRandom.php
                $row = unserialize($_GET['video']);
                $idVideoAntic= $row['idVideo'];
              } else {
                $row = getLastVideo();
                $idVideoAntic= $row['idVideo'];
              }
              $rowHashtags = getHashtagsVideo($row['idVideo']);
              echo "<h1 class='titulo-video col-12 col-lg-12 centrardiv'>" . $row['titulo'] . "</h1>"; ?>

              <div class="text-center">
                <fieldset class="rating"> <input type="radio" id="star5" name="rating" value="0" />
                  <label class="full" for="star5"></label>

                  <input type="radio" id="star4half" name="rating" value="4.5" />
                  <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>

                  <input type="radio" id="star4" name="rating" value="4" />
                  <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                  <input type="radio" id="star3half" name="rating" value="3.5" />
                  <label class="half" for="star3half" title="Meh - 3.5 stars">

                  </label> <input type="radio" id="star3" name="rating" value="3" />
                  <label class="full" for="star3" title="Meh - 3 stars"></label>

                  <input type="radio" id="star2half" name="rating" value="2.5" />
                  <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>

                  <input type="radio" id="star2" name="rating" value="2" />
                  <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                  <input type="radio" id="star1half" name="rating" value="1.5" />
                  <label class="half" for="star1half" title="Meh - 1.5 stars"></label>

                  <input type="radio" id="star1" name="rating" value="1" />
                  <label class="full" for="star1" title="Sucks big time - 1 star"></label>

                  <input type="radio" id="starhalf" name="rating" value="0.5" />
                  <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>

                  <input type="radio" class="reset-option" name="rating" value="reset" />
                </fieldset>
              </div>

              <div class="">
                <?php echo "<video class='video-home col-12 col-lg-12' style='height: auto; width: auto;' src='videos/" . $row['path'] . "'controls autoplay> </video>"; ?>
              </div>

              <div class='col-12 col-lg-12 centrardiv'>

              </div>
              
              <div class="col-12 col-lg-12 centrardiv" style="margin-top: 2%">
                <?php echo "<a class='col-4 col-lg-6 centrardiv' href='./lib/videoRandom.php?random=true&idVideoAntic=$idVideoAntic'>"?>
                  <i onclick="myFunction(this)" class="fa fa-thumbs-up fa-2x"></i>
                  <span aria-hidden="true" role="button" data-slide="prev"></span>
                  <span class="sr-only">Previous</span>
                <?php echo "</a>"?>

                <?php echo "<p class='dataPenjat col-5' style='text-align:center;'>" . $row['date'] . ' by ' . $_SESSION["username"] . "</p>"; ?>

                <?php echo "<a class='col-4 col-lg-6 centrardiv' href='./lib/videoRandom.php?random=true&idVideoAntic=$idVideoAntic'>"?>
                  <i onclick="myFunction(this)" class="fas fa-thumbs-down fa-2x"></i>
                  <span aria-hidden="true" role="button" data-slide="next"></span>
                  <span class="sr-only">Next</span>
                <?php echo "</a>"?>
              </div>

              <?php
              echo "<br>";
              echo "<div class='col-12 col-lg-12 centrardiv'>";
              foreach ($rowHashtags as $rowHashtag) {
                echo "<span class='badge-home badge-default-home centrardiv'>"  . $rowHashtag . "  </span>";
              }
              echo "</div>";
              ?>

              <div class="centrardiv" style="margin: 2%">
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" ?>Información</button>
              </div>

            </div>
          </div>
        </div>
      </div>


      <?php
      $activated = isset($_GET['activated']) ? $_GET['activated'] : false;

      if (isset($activated) && $activated == true) {
        echo "<script>alert('Your account has been activated');</script>";
      }
      include "./Includes/footer.php"; ?>


  <?php
  }
} ?>
    </body>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <?php echo "<h2 style='color:violet'>" . $row['titulo'] . "</h2>"; ?>
          </div>
          <div class="modal-body">
            <h4 style="color: violet;">Descripcion</h4>
            <?php echo "<area class='descripcio-home'>" . $row['descripcio'] . "</area>";
            echo "<hr>";
            foreach ($rowHashtags as $rowHashtag) {
              echo "<span class='badge-home badge-default-home'>" . $rowHashtag . " </span>";
            }?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary"  data-dismiss="modal" aria-label="Close">Close</button>
          </div>
        </div>
      </div>
    </div>