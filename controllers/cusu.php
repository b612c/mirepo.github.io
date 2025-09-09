<?php

    require_once 'models/musu.php';
    include 'models/mpag.php';

    $mmusu = new Musu();
    $mpag = new Mpag();

    $idusu = isset($_REQUEST['idusu']) ? $_REQUEST['idusu'] : NULL;
    $ndoc = isset($_POST['ndoc']) ? $_POST['ndoc'] : NULL;
    $tipo_doc = isset($_POST['tipo_doc']) ? $_POST['tipo_doc'] : NULL;
    $nomusu = isset($_POST['nomusu']) ? $_POST['nomusu'] : NULL;
    $appusu = isset($_POST['appusu']) ? $_POST['appusu'] : NULL;
    $email = isset($_POST['email']) ? $_POST['email'] : NULL;
    $tel = isset($_POST['tel']) ? $_POST['tel'] : NULL;
    $pass = isset($_POST['pass']) ? $_POST['pass'] : NULL;
    $direc = isset($_POST['direc']) ? $_POST['direc'] : NULL;
    $fecnac = isset($_POST['fecnac']) ? $_POST['fecnac'] : NULL;
    $actper = isset($_REQUEST['actper']) ? $_REQUEST['actper'] : NULL;
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : NULL;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : NULL;
    $foto = isset($_FILES['foto']) ? $_FILES['foto'] : NULL;

    $pefid = isset($_POST['pefid']) ? $_POST['pefid']:NULL;

    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;

    $datOne = null;
    $infoUs = null;


    if($foto) {
        $img = opti($foto, "per", "img\profile-photos", $nmfl);
    }
    $mmusu->setIdusu($idusu);
    if($ope == "save"){
        $mmusu->setNdoc($ndoc);
        $mmusu->setTipoDoc($tipo_doc);
        $mmusu->setNomusu($nomusu);
        $mmusu->setAppusu($appusu);
        $mmusu->setEmail($email);
        $mmusu->setTel($tel);
        $mmusu->setPass(sha1(sha1(md5($pass))."Xg5%"));
        $mmusu->setDirec($direc);
        $mmusu->setFecnac($fecnac);
        $mmusu->setActper($actper);
        $mmusu->setSexo($sexo);
        $mmusu->setEstado($estado);
        $mmusu->setFoto($img);
        if($idusu) $mmusu->edit($pg, $pass, $actper);
        else $mmusu->save();
        echo "<script>window.location = 'home.php?pg=".$pg."'</script>";
    }
    
    if ($ope == "eli") $mmusu->del();
    


    if( $idusu && $ope == 'act'){
        $mmusu->setActper($actper);
        $mmusu->edact();
        echo "<script>window.location = 'home.php?pg=".$pg."'</script>";
    }

    if($idusu && $ope == "edi"){
        $datOne = $mmusu->getOne();
    }
    // if($idusu || $_SESSION['idusu'] ){
    //     $datInfo = $mmusu->getOne();
    // }
    // print_r ($_SESSION['idusu']);

    
    if($ope=="savepxf"){
        if($idusu) $mmusu->delPxF();
        if($pefid){ foreach ($pefid as $pf) {
            if($pf){
                $mmusu->setPefid($pf);
                $mmusu->savePxF();
            }
        }}
    }


    $datAll = $mmusu->getAll($pg);
    $datVal = $mmusu->valor();
    $tdoc = []; $sexo = []; $act = []; $estado = [];
    foreach($datVal as $val){
        if($val['domid'] == 1) $tdoc[$val['valid']] = $val['nomval'];
    }
    foreach($datVal as $val){
        if($val['domid'] == 2) $act[$val['valid']] = $val['nomval'];
    }
    foreach($datVal as $val){
        if($val['domid'] == 3) $sexo[$val['valid']] = $val['nomval'];
    }
    foreach($datVal as $val){
        if($val['domid'] == 4) $estado[$val['valid']] = $val['nomval'];
    }
    // print_r($tdoc);
    
    $mod = $mpag->getMod();
    if($datAll[0]['idusu'] == $_SESSION['idusu']){
        $_SESSION['foto'] = $datAll[0]['foto'];
    }



?>