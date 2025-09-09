<?php
    require_once "models/mdom.php";

    $mdom = new Mdom();

    $domid = isset($_REQUEST['domid']) ? $_REQUEST['domid'] : NULL;
    $nomdom = isset($_REQUEST['nomdom']) ? $_REQUEST['nomdom'] : NULL;
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;

    $datOne = NULL;

    $mdom->setDomid($domid);

    if($nomdom && $ope = "save"){
        // $mdom->setDomid($domid);
        $mdom->setNomdom($nomdom);
        if($domid) $mdom->edit();
        else $mdom->save();
        echo "<script>window.location = 'home.php?pg=".$pg."' </script>";
    }
    if($domid && $ope == "edi") {
        $datOne = $mdom->getOne();
    }
    
    if($domid && $ope == "eli") {
        // echo "<script>window.location = 'home.php?pg=".$pg."' </script>";
        $mdom->del(); 
    }

    $datAll = $mdom->getAll();


?>