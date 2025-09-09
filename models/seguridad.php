<?php
//inicia sesion o reanuda si ya existe
    session_start();
    //verifica si existe una variable de sesion aut y si trae un valor, se lo asigna a $aut, si no le asigna un null
    $aut = isset($_SESSION['aut']) ? $_SESSION['aut'] : NULL;
    //si la sesion no esta activa o aut no coincide, significa que el usuario no esta autenticado o la sesion no es valida
    if(session_status() != 2 || $aut != "jdTjd=hd342517gs@"){
        //destruye las variables de sesion
        session_destroy();
        //redirige al index
        header("Location: index.php");
        //detiene la ejecucion de la funcion
        exit();
    }
?>