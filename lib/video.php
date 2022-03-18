<?php
include "./bbddConex.php";
$titol = null;
$hashtagArray = null;
$descripcio = null;
$path = null;
$idUsuari = null;
$maxSize = 104857600;
$filenameHash = null;
$videoErr = null;

if (isset($_POST["titulo"]) && strlen($_POST["titulo"]) > 0) {
    $titol = filter_input(INPUT_POST, "titulo");
}

if (isset($_POST["hiddenHash"]) && strlen($_POST["hiddenHash"]) > 0) {
    $hashtagArray = filter_input(INPUT_POST, "hiddenHash");
    $hashtagArray = json_decode($hashtagArray); 
}

if (isset($_POST["descripcio"]) && strlen($_POST["descripcio"]) > 0) {
    $descripcio = filter_input(INPUT_POST, "descripcio");
}

if ((isset($_FILES['fitxer']['name']) && !is_null($_FILES['fitxer']['name'])) && ($_FILES['fitxer']['size'] <= $maxSize) && ($_FILES["fitxer"]["size"] != 0)) {

    $filename = $_FILES['fitxer']['name'];
    $filenameHash = hash('sha256', "'$filename' + 'rand()'");

    $size = $_FILES['fitxer']['size'];
    $tempPath = $_FILES['fitxer']['tmp_name'];

    $res = move_uploaded_file($tempPath, "../videos/" . $filenameHash);
}
else if(($_FILES['fitxer']['size'] > $maxSize) || ($_FILES["fitxer"]["size"] == 0))
{
    $errVideo = "¡El tamaño del video es demasiado grande!";
    header("Location: ../videoFORM.php?error=$errVideo");
    exit;
}

if (!is_null($titol) && !is_null($hashtagArray) && !is_null($descripcio)) {

    $path = $filenameHash;
    session_start();
    $idUsuari = $_SESSION["idUser"];

    insertarVideo($titol, $hashtagArray, $descripcio, $path, $idUsuari); //Crea el usuario en la BBDD.

    header("Location: ../home.php"); //Et retorna al Login
} 
else{
    $errVideo = "¡Faltan datos por rellenar!";
    header("Location: ../videoFORM.php?error=$errVideo"); //Et retorna al formulari de registre
}