<?php
    require_once ('models/mshop.php');

    $mshp = new Mshop();

    $idshop = isset($_REQUEST['idshop']) ? $_REQUEST['idshop'] : NULL;
    $nit = isset($_POST['nit']) ? $_POST['nit'] : NULL;
    $direc = isset($_POST['direc']) ? $_POST['direc'] : NULL;
    $razsoc = isset($_POST['razsoc']) ? $_POST['razsoc'] : NULL;
    $tel = isset($_POST['tel']) ? $_POST['tel'] : NULL;

    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;
    $datOne = NULL;

    var_dump ("(".$idshop." - ".$ope." - ".$datOne.")");

    $mshp->setIdshop($idshop);
    if($ope = "save" && $nit && $razsoc){
        $mshp->setNit($nit);
        $mshp->setDirec($direc);
        $mshp->setRazsoc($razsoc);
        $mshp->setTel($tel);
        if($idshop) $mshp->edit();
        else $mshp->save();
        echo "<script>window.location = 'home.php?pg=".$pg."' </script>";
    }

    if($idshop && $ope == "edi"){
        $datOne = $mshp->getOne();
    }
    
    if($idshop && $ope == "eli"){
        $mshp->del();
    }

    $datAll = $mshp->getAll();
?>