<?php
    include("./bbddConex.php");

    if(isset($_GET['code']) && !empty($_GET['code']) AND isset($_GET['mail']) && !empty($_GET['mail']))//falta el tiempo expiry
    {
        $resetCode = $_GET['code'];
        $mail = $_GET['mail'];
    
        $rows = comptarUsuariResetPassword($resetCode, $mail);
    
        if($rows > 0 && $resetCode != NULL && hashExpirat($mail, $resetCode) == false)
        {
            header("Location:http://localhost/formResetPassword.php?code=".$resetCode."&mail=".$mail."");
        }
    }

    if((isset($_POST['password1']) && !empty($_POST['password1'])) AND (isset($_POST['password2']) && !empty($_POST['password2'])) AND ($_POST['password1'] == $_POST['password2'])){
        
        $password = $_POST['password1'];
        $password = password_hash($password, PASSWORD_DEFAULT);

        $resetCode = $_POST['code'];
        $mail = $_POST['mail'];
        
        resetPassword($password, $mail, $resetCode);
        enviarMailResetPasswordSuccesful($mail);
        header('Location: ../index.php');
    }
?>
