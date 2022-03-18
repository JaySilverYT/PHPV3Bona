<?php include_once "Includes/header.php" ?>

<body>

    <div class="container">

        <h2 class="title">Subir Video</h2>
        <form action="./lib/video.php" method="POST" id="forms4" onkeydown="return event.key != 'Enter';" enctype="multipart/form-data">

        <?php
            if (isset($_GET['error']) && $_GET['error'] == true) {
            echo "<div class='alert alert-danger'>" . $_GET['error'] ."</div><br>";
            }?>

            <div class="form-group">
                <label>Titulo (*)</label>
                <input class="form-control" type="text" name="titulo">
            </div>

            <div class="form-group">
                <label>Descripcion (*)</label>
                <textarea class="form-control" name="descripcio" placeholder="Añade una descripcion al video!" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label>Hashtags (*)</label>
                <input type="text" class="form-control" id="hashtags" name="hashtags" autocomplete="off">
                <input type="text" id="hiddenHash" type="hidden" name="hiddenHash">
                <div class="tag-container" name="hashtags">
                </div>

                <div class="form-group centrardiv" style="margin-top:10px;">
                    <label class="btn btn-default">Seleccionar fichero</label>
                    <input type="text" class="form-control" id="filePath" name="filePath" autocomplete="off">
                    <input type="file" onchange="updateList()" name="fitxer" class="btn btn-default" id="videoFile" accept="video/*">
                </div>

                <div class="form-group centrardiv">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
        </form>

        <!-- Jquery JS-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/datepicker/moment.min.js"></script>
        <script src="vendor/datepicker/daterangepicker.js"></script>

        <!-- Main JS-->
        <script src="assets/js/hashtag.js"></script>
</body>

</div>

<?php include "Includes/footer.php" ?>