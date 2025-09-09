<?php
    include 'models/mpef.php';
    include 'models/mpag.php';

    $mpef = new Mpef();
    $mpg = new Mpag();

    $pefid = isset($_REQUEST['pefid']) ? $_REQUEST['pefid'] : NULL;
    $pefnm = isset($_POST['pefnm']) ? $_POST['pefnm'] : NULL;
    $modid = isset($_REQUEST['modid']) ? $_REQUEST['modid'] : NULL;
    $pgid = isset($_POST['pgid']) ? $_POST['pgid'] : NULL;
    $chk = isset($_POST['chk']) ? $_POST['chk']: NULL;
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;

    $datOne = null;

    $mpef->setPefid($pefid);
    if($ope=="savepxp"){
        if($pefid) $mpef->delPxP();
        if($chk){ 
            foreach($chk AS $ck){
                $mpef->setPgid ($ck);
                $mpef->savePxP();
            }
        }
        echo '<script>window.location = "home.php?pg='.$pg.'"</script>';

    }
    if($ope == "save"){
        $mpef->setPefnm($pefnm);
        $mpef->setModid($modid);
        $mpef->setPgid($pgid);
        if($pefid) $mpef->edit();
        else $mpef->save();
        echo '<script>window.location = "home.php?pg='.$pg.'"</script>';
        
    }
    if($ope == "eli") {
        $mpef->del();
        echo '<script>window.location = "home.php?pg='.$pg.'"</script>';
    }

    if($ope = "edi") $datOne = $mpef->getOne();

    $datAll = $mpef->getAll();
    $datPg = $mpg->getAll();
    $datMod = $mpg->getMod();


?>