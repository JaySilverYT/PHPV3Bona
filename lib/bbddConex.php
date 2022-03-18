<?php 
    include "mail.php";
    require_once "config.php";

    function openDB(){
        $cadenaConnexio = CADENABD;
        $usuari = USUARIOBD;
        $passwd = PASSWDBD;
        $db = false;
        try{
            //Ens connectem a la BDs
            $db = new PDO($cadenaConnexio, $usuari, $passwd);
            //Tallem la connexió a la BDs
            //$db = null;
        }catch(PDOException $e){
            echo 'Error amb la BDs: ' . $e->getMessage();
        }
        return $db;
    }
    ///////////////////////////********************************************////////////////////////////
    ///////////////////////////FUNCIONES USUARIO////////////////////////////
    ///////////////////////////********************************************////////////////////////////
    ///////////////////////////********************************************////////////////////////////
    function crearUsuario($email, $username, $password, $firstName, $lastName, $activationCode){
        $db = openDB();
    
        ///Con esta sintaxis el orden da igual
        $sql = 'INSERT INTO `users`(mail,username,passHash,userFirstName,userLastName,creationDate,removeDate,lastSignIn, 
        activationDate,activationCode,resetPassExpiry,resetPassCode,active) 
        VALUES(:email,:username,:passwordx,:firstname,:lastname, NOW(), null, null,null,:activationcode,null,null, 0)';
            $usuaris = $db->prepare($sql);
            $usuaris->execute(array(':email'=>$email, ':username'=>$username, ':passwordx'=>$password, 
            ':firstname'=>$firstName, ':lastname'=>$lastName, ':activationcode'=>$activationCode));
    
            enviarMailActivacio($email, $activationCode);
    }

    //no funciona
    function insertResetPassCode($resetPassCode, $email){
        $db = openDB();
        $sql = "UPDATE `users` SET resetPassCode = '$resetPassCode' WHERE mail = ?";
        $result = $db->prepare($sql);
        $result->execute(array($email));
    }

    function obtenirUsuari($username){
        $db = openDB();
        $sql = 'SELECT id, username, mail, passHash FROM `users` WHERE (`username` = ? OR `mail` = ?) and active = 1';
        $usuaris = $db->prepare($sql);
        $usuaris->execute(array($username, $username));

        return $usuaris;
    }

    function comptarUsuariNoActiu($activacionCode, $mail){
        
    $db = openDB(); 
    $sql = "SELECT count(*) FROM users WHERE mail = ?  AND activationCode = ? AND active = 0";
    $result = $db->prepare($sql);
    $result->execute(array($mail, $activacionCode));
    $rows = $result->fetchColumn();

    return $rows;
    }

    function comptarUsuariResetPassword($resetCode, $mail){
        
        $db = openDB(); 
        $sql = "SELECT count(*) FROM users WHERE mail = ?  AND resetPassCode = ?";
        $result = $db->prepare($sql);
        $result->execute(array($mail, $resetCode));
        $rows = $result->fetchColumn();
    
        return $rows;
    }

    function activarUsuari($mail){

        $db = openDB();
        $sql = "UPDATE users SET active = 1, activationCode = null, activationDate = now() WHERE mail = ?";
        $result = $db->prepare($sql);
        $result->execute(array($mail));
    }

    function updateLastSingIn($xUsername){
    $db = openDB();
    $sql = "UPDATE `users` SET lastSignIn = now() WHERE `username` = ?";
    $result = $db->prepare($sql);
    $result->execute(array($xUsername));
    }

    ///////////////////////////********************************************////////////////////////////
    ///////////////////////////FUNCIONES RESET PASSWORD////////////////////////////
    ///////////////////////////********************************************////////////////////////////
    ///////////////////////////********************************************////////////////////////////
    function resetPassword($password, $mail, $resetCode){
        $db = openDB();
        $sql = "UPDATE `users` SET passHash = '$password', resetPassExpiry = null, resetPassCode = null WHERE `mail` = ? and resetPassCode = ?";
        $result = $db->prepare($sql);
        $result->execute(array($mail, $resetCode));
    }

    function validacioPasswordTempsExpirat($email, $passCodeReset){
        $db = openDB(); //Abre la BBDD;
        $sql = "UPDATE `users` SET resetPassExpiry = ADDTIME(now(), 3000) WHERE mail = ? and resetPassCode = ?";
        $result = $db->prepare($sql);
        $result->execute(array($email, $passCodeReset));
    }

    function hashExpirat($email, $passCodeReset){
        $expirat = false;

        $db = openDB();

        $fechaActual = getdate();
        $fechaExpiracio = "SELECT resetPassExpiry FROM `users` WHERE mail = ? and resetPassCode = ?";
        $result = $db->prepare($fechaExpiracio);
        $result->execute(array($email, $passCodeReset));

        if($fechaActual >= $result)
        {
            $expirat = true;
        }

        return $expirat;
    }

    ///////////////////////////********************************************////////////////////////////
    ///////////////////////////FUNCIONES VIDEOS////////////////////////////
    ///////////////////////////********************************************////////////////////////////
    ///////////////////////////********************************************////////////////////////////
        
    function insertarVideo($titol, $hashtagArray, $descripcio, $path, $idUsuari){
        $db = openDB();
        $etiquetaVideo= null;
        ///Con esta sintaxis el orden da igual
        //INSERT ETIQUETA
        for($i = 0; $i < count($hashtagArray); $i++){
            $sql = 'INSERT INTO `etiqueta`(nombre)
            VALUES(:nombre)';
                $usuaris = $db->prepare($sql);
                $usuaris->execute(array(':nombre'=>$hashtagArray[$i]));
        }
        //INSERT VIDEO
        $sql = 'INSERT INTO `video`(titulo,descripcio,likes,dislikes,`path`,`date`,idUsuari) 
                    VALUES(:titulo,:descripcio,0,0, :path, CURRENT_DATE(), :idUsuari)';
            $usuaris = $db->prepare($sql);
            $usuaris->execute(array(':titulo'=>$titol, ':descripcio'=>$descripcio, ':path'=>$path, ':idUsuari'=>$idUsuari));
            $idVideo = $db->lastInsertId();
        //INSERTVIDEOETIQUETA

            for($i = 0; $i < count($hashtagArray); $i++){

                $idEtiquetas = obtenirIdBe($hashtagArray[$i]);
                
                foreach ($idEtiquetas as $fila) {
                    $etiquetaVideo = $fila['idEtiqueta'];
                }
                
                $sql = 'INSERT INTO `videoetiqueta`(idEtiqueta, idVideo) VALUES(:idEtiqueta, :idVideo)';
                    $usuaris = $db->prepare($sql);
                    $usuaris->execute(array(':idEtiqueta'=>$etiquetaVideo, ':idVideo'=>$idVideo));
            }
    }

    function obtenirIdBe($hashtagArrayParaula){
        $db = openDB();
        
        $sql = 'SELECT idEtiqueta FROM `etiqueta` WHERE nombre = ?';
        $usuaris = $db->prepare($sql);
        $usuaris->execute(array($hashtagArrayParaula));

        return $usuaris;
    }

    function getLastVideo(){
        $db = openDB();
        
        $sql = 'SELECT * FROM `video` ORDER BY idVideo DESC LIMIT 1';
        $video = $db->prepare($sql);
        $video->execute();
        //$result = $video->fetchColumn();

        $data = $video;
        foreach ($data as $row) :
            return $row;
        endforeach; 
    }

    ///esta vale para los dos
    function getHashtagsVideo($xlastIdVideo)
    {
        $db = openDB();
        $hastag=null;
        $sql = 'SELECT e.nombre FROM `etiqueta` as `e` INNER JOIN `videoetiqueta` as `ve` ON e.idEtiqueta = ve.idEtiqueta WHERE ve.idVideo = ?';
        $video = $db->prepare($sql);
        $video->execute(array($xlastIdVideo));
        $data = $video;
        $i = 0;

        foreach($data as $row) :
            $hastag[$i] = $row['nombre'];
            $i++;
        endforeach;

        return $hastag;
    }

    function getRandomVideo($idVideoNoRepetir)
{
    $db = openDB();
    $totalCountVideos = getTotalqttVideos();
    $random = rand(92, 91 + $totalCountVideos);

    while($random == $idVideoNoRepetir){
        $random = rand(92, 91 + $totalCountVideos);
    }
    
    $sql = 'SELECT * FROM `video` WHERE idVideo = ?';
    $video = $db->prepare($sql);
    $video->execute(array($random));

    $data = $video;
    foreach ($data as $row) :
        return $row;
    endforeach; 
}

function getTotalqttVideos(){

    $db = openDB();
    $sql = "SELECT count(*) FROM `video`";
    $qttVideos = $db->prepare($sql);
    $qttVideos->execute();
    $rows = $qttVideos->fetchColumn();

    return $rows;
}
?>