<?php
require_once "config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

function enviarMailActivacio($email, $activationCode)
{
    //$db->query($sql);
    $mail = new PHPMailer();
    $mail->IsSMTP();

    //Configuració del servidor de Correu
    //Modificar a 0 per eliminar msg error
    $mail->SMTPDebug = SMTPDEBUG;
    $mail->SMTPAuth = SMTPAUTH;
    $mail->SMTPSecure = SMTPSECURE;
    $mail->Host = HOST;
    $mail->Port = PORT;
    
    //Credencials del compte GMAIL
    $mail->Username = TUCORREO;
    $mail->Password = TUPSWCORREO;

    //Dades del correu electrònic
    $mail->SetFrom(TUCORREO, 'Cinetics - David Delgado (Administrador)');
    $mail->Subject = 'Verification / Activate Account';
    $mail->isHTML(true);
    $message = '
    <html>
        <body>
            <head>
                <title>Validacion de cuenta</title>
            </head>
        
            <p>Gracias por registrarte!</p>
            <p>Tu cuenta ha sido creada  ahora puedes registrarte cuando hayas activado tu cuenta en el link de abajo</p>
            </hr>
            <strong>Por favor haz clic en el enlace para activar la cuenta:</strong>
            <br>
            <a href="http://localhost/lib/mailCheckAccount.php?code='.$activationCode.'&mail='.$email.'">Active your account Now!</a>
            <hr>
            <img src="https://www.pngplay.com/wp-content/uploads/13/Money-Heist-Mask-Free-PNG.png" width="75" height="75">
        </body>
    </html>';
    $mail->MsgHTML($message);
    
    //Destinatari
    //$address = 'hervashf137@gmail.com';
    $address = $email;

    $mail->AddAddress($address, 'Active User');
    

    //Enviament
    $result = $mail->Send();
    if(!$result){
        echo 'Error: ' . $mail->ErrorInfo;
    }else echo "Correu enviat";
    echo '<script type="text/javascript">window.location.assign("../index.php?error=true");</script>';
}

function enviarMailResetPassword($email, $resetPassCode)
{

    $mail = new PHPMailer();
    $mail->IsSMTP();

    //Configuració del servidor de Correu
    //Modificar a 0 per eliminar msg error
    $mail->SMTPDebug = SMTPDEBUG;
    $mail->SMTPAuth = SMTPAUTH;
    $mail->SMTPSecure = SMTPSECURE;
    $mail->Host = HOST;
    $mail->Port = PORT;
    
    //Credencials del compte GMAIL
    $mail->Username = TUCORREO;
    $mail->Password = TUPSWCORREO;

    //Dades del correu electrònic
    $mail->SetFrom(TUCORREO, 'Cinetics - David Delgado (Administrador)');
    $mail->Subject = 'Reset Password';
    $mail->isHTML(true);
    $message = '
    <html>
        <body>
            <head>
                <title>Reset Pasword</title>
            </head>
        
            <p>Reset your password</p>
            </hr>
            <strong>Por favor haz clic en el enlace para cambiar la contraseña de la cuenta:</strong>
            <br>
            <a href="http://localhost/lib/resetPassword.php?code='.$resetPassCode.'&mail='.$email.'">I want to Reset My Password</a>
            <hr>
            <img src="https://www.pngplay.com/wp-content/uploads/13/Money-Heist-Mask-Free-PNG.png" width="75" height="75">
        </body>
    </html>';
    $mail->MsgHTML($message);
    //Destinatari
    //$address = 'hervashf137@gmail.com';
    $address = $email;
    $mail->AddAddress($address, 'Reset Pass User');

    //Enviament
    $result = $mail->Send();
    if(!$result){
        echo 'Error: ' . $mail->ErrorInfo;
    }else echo "Correu enviat";
    echo '<script type="text/javascript">window.location.assign("../home.php");</script>';  
}

function enviarMailResetPasswordSuccesful($email)
{

    $mail = new PHPMailer();
    $mail->IsSMTP();

    //Configuració del servidor de Correu
    //Modificar a 0 per eliminar msg error
    $mail->SMTPDebug = SMTPDEBUG;
    $mail->SMTPAuth = SMTPAUTH;
    $mail->SMTPSecure = SMTPSECURE;
    $mail->Host = HOST;
    $mail->Port = PORT;
    
    //Credencials del compte GMAIL
    $mail->Username = TUCORREO;
    $mail->Password = TUPSWCORREO;

    //Dades del correu electrònic
    $mail->SetFrom(TUCORREO, 'Cinetics - David Delgado (Administrador)');
    $mail->Subject = 'Reset Password';
    $mail->isHTML(true);
    $message = '
    <html>
        <body>
            <head>
                <title>Reset Pasword</title>
            </head>
            </hr>
            <strong>Your password has been modified succesfuly!!!</strong>
            <br>
            <hr>
            <img src="https://www.pngplay.com/wp-content/uploads/13/Money-Heist-Mask-Free-PNG.png" width="75" height="75">
        </body>
    </html>';
    $mail->MsgHTML($message);
    //Destinatari
    $address = 'hervashf137@gmail.com';
    //$address = $email;
    $mail->AddAddress($address, 'Reset Pass User');

    //Enviament
    $result = $mail->Send();
    if(!$result){
        echo 'Error: ' . $mail->ErrorInfo;
    }else echo "Correu enviat";
    echo '<script type="text/javascript">window.location.assign("../home.php");</script>';  
}
?>
