<?php
include "./bbddConex.php";

if((isset($_GET['random']) && $_GET['random'] == true) && isset($_GET['idVideoAntic'])){
    $idVideoNoRepetir = $_GET['idVideoAntic'];
    $row = getRandomVideo($idVideoNoRepetir);
    //porque es un vector se hace esto
    $row = serialize($row);
    $row = urlencode($row);
    header("Location: ../home.php?rand=true&video=$row"); //Et retorna al Login
}
?>