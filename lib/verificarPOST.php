<?php
//require_once("afegeixUsuariBBDD.php");
require_once("./bbddConex.php");
$username = null;
$email = null;
$firstName = null;
$lastName= null;
$password = null;
$verifyPassword = null;
$activationDate = null;
$activationCode = null;
$emailErr = null;
$errPsw = null;

if (isset($_POST["username"]) && ctype_alnum($_POST["username"]))
{
    $username = filter_input(INPUT_POST, "username");
}

if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    header("Location: ../register.php?error=$emailErr");
    exit;
  } else {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      header("Location: ../register.php?error=$emailErr");
      exit;
    }else{
        $email = filter_input(INPUT_POST, "email");
    }
  }


if (isset($_POST["firstname"]) && !is_numeric($_POST["firstname"]))
{
    $firstName = filter_input(INPUT_POST, "firstname");
}

if (isset($_POST["lastname"]) && !is_numeric($_POST["lastname"]))
{
    $lastName = filter_input(INPUT_POST, "lastname"); 
}


if (isset($_POST["password"]) && ctype_space($_POST["password"]) == false)
{
    $password = filter_input(INPUT_POST, "password");

    if (isset($_POST["verifypassword"]) && ctype_space($_POST["verifypassword"]) == false)
    {
        $verifyPassword = filter_input(INPUT_POST, "verifypassword"); 
    }
}

if (!is_null($username) && !is_null($email) && !is_null($firstName) && !is_null($lastName) && !is_null($password) && !is_null($verifyPassword))
{
    if ($password != $verifyPassword)
    {
        $errPsw = "Las passwords no coinciden o no están introducidas";
        header("Location: ../register.php?errorPsw=$errPsw");
        exit;
    }
    else 
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $activationCode = hash('sha256', rand());

        crearUsuario($email, $username, $password, $firstName, $lastName, $activationCode); //Crea el usuario en la BBDD.

        header("Location: ../index.php?registroOK=true"); //Et retorna al Login
    }
}
else
{
    header("Location: ../register.php"); //Et retorna al formulari de registre
}

?>
