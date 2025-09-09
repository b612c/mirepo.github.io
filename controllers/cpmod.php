<?php 
    require_once ('models/mmod.php');

    $mmod = new Mmod();

    $modid = isset($_POST['modid']) ? $_POST['modid']:NULL;
    $modimg = isset($_POST['modimg']) ? $_POST['modimg']:NULL;
    $idusu = isset($_SESSION['idusu']) ? $_SESSION['idusu']:NULL;

    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    if($ope=="dircc" AND $idusu AND $modid){
        $mmod->setModid($modid);
        $mmod->setModimg($modimg);
        $datPrPfMd = $mmod->getOnePrPfMd();
        if($datPrPfMd){
            $_SESSION['pefid'] = $datPrPfMd[0]['pefid'];
            $_SESSION['pefnm'] = $datPrPfMd[0]['pefnm'];
            echo '<script>window.location=\'home.php?pg='.$datPrPfMd[0]['pgid'].'\';</script>';
        }
    }

    $datAll = $mmod->getAllAct();
    $datPrPf = $mmod->getOnePrPf();
?>