<?php
    require_once ('conexion.php');

    $usuario = isset($_POST['user']) ? $_POST['user'] : null;
    $password = isset($_POST['pass']) ? $_POST['pass'] : null;

    if($usuario && $password){
        validar($usuario, $password);
    }else{
        echo "<script>window.location.href = '../index.php';</script>";
    }

    function validar($usu,$pas){
        $res = validat($usu, $pas);
        $res = isset($res) ? $res : null;
        if($res){
            session_start();
            $_SESSION["idusu"] = $res[0]['idusu'];
            $_SESSION["nomusu"] = $res[0]['nomusu'];
            $_SESSION["appusu"] = $res[0]['appusu'];
            $_SESSION["foto"] = $res[0]['foto'];
            $_SESSION['pefid'] = NULL;
            $_SESSION['pefnm'] = 'Módulos';
    		$_SESSION["aut"] = "jdTjd=hd342517gs@";
            echo "<script>window.location.href = '../pmod.php';</script>";
        } else {
            echo "<script>window.location.href = '../index.php?err-s';</script>";
        }
    }
    function validat($usu, $pas){
        $res = null;
        $pas = sha1(sha1(md5($pas))."Xg5%");
        $sql = "SELECT idusu, ndoc, nomusu, appusu, email, tel, direc, fecnac, actper, pass, foto FROM usuario WHERE email=:email AND pass=:pass AND actper=5";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(':email', $usu);
        $result->bindParam(':pass', $pas);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }


?>