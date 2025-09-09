<?php
    require_once ("models/mval.php");
    require_once ("models/mdom.php");

    $mval = new Mval();
    $mdom = new Mdom();

    $valid = isset($_REQUEST['valid']) ? $_REQUEST['valid'] : NULL;  
    $nomval = isset($_POST['nomval']) ? $_POST['nomval'] : NULL;  
    $domid = isset($_REQUEST['domid']) ? $_REQUEST['domid'] : NULL; 

    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL; 

    $datOne = NULL;

    $mval->setValid($valid);
    if($ope == "save"){
        $mval->setNomval($nomval);
        $mval->setDomid($domid);
        if($valid) $mval->edit();
        else $mval->save();
        // echo "<script>window.location = 'home.php?pg=".$pg."' <script>";
        echo '<script>window.location = "home.php?pg='.$pg.'"</script>';

    }
    if($valid && $ope == "edi") $datOne = $mval->getOne();
    if($valid && $ope == "eli") $mval->del();


    $datAll = $mval->getAll();
    $datDom = $mdom->getAll();


?>