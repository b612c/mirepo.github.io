<?php 
    require_once ('models/mmod.php');
    require_once ('models/mpag.php');

    $mmod = new Mmod();
    $mpag = new Mpag();

    $modid = isset($_REQUEST['modid']) ? $_REQUEST['modid']:NULL;
    $modimg = isset($_POST['modimg']) ? $_POST['modimg']:NULL;
    $modnm = isset($_POST['modnm']) ? $_POST['modnm']:NULL;
    $modact = isset($_REQUEST['modact']) ? $_REQUEST['modact']:NULL;
    $pgid = isset($_REQUEST['pgid']) ? $_REQUEST['pgid']:NULL;

    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $datOne = NULL;

    $mmod->setModid($modid);
    if($ope=="save"){
        $mmod->setModnm($modnm);
        $mmod->setModimg($modimg);
        $mmod->setModact($modact);
        $mmod->setPgid($pgid);
        if($modid) $mmod->edit();
        else $mmod->save();
        echo "<script>window.location = 'home.php?pg=".$pg."'</script>";
    }

    if( $modid && $ope == 'act'){
        $mmod->setModact($modact);
        $mmod->edact();
        echo "<script>window.location = 'home.php?pg=".$pg."'</script>";
    }
    if($modid && $ope == "edi") $datOne = $mmod->getOne();
    if($modid && $ope == "eli") $mmod->eli();

    $datAll = $mmod->getAll();
    $datAllPg = $mpag->getAll();
?>