<!DOCTYPE html>
<html lang="es">

<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<?php 
    $code = $_GET['code'];
    $mail = $_GET['mail'];  
?>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Change Password</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <p class="text-center">Use the form below to change your pºassword. Your password cannot be the same as your username.</p>
            <form method="POST" action="./lib/resetPassword.php">
            
                <input type="password" class="input-lg form-control" name="password1" placeholder="New Password" autocomplete="off">
                <div class="row">
                </div>
                <br>
                <input type="password" class="input-lg form-control" name="password2" placeholder="Repeat Password" autocomplete="off">
                <div class="row">
                </div>
                <br>
                <input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
                <input type="hidden" name="code" value='<?php echo $code; ?>'>
                <input type="hidden" name="mail" value='<?php echo $mail; ?>'>
            </form>
        </div>
        <!--/col-sm-6-->
    </div>
    <!--/row-->
</div>

</body>
</html>
