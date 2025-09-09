<?php

require_once 'models/mpag.php';

$mpg = new Mpag();

$pgid = isset($_REQUEST['pgid']) ? $_REQUEST['pgid'] : NULL;
$editpagid = isset($_REQUEST['editpagid']) ? $_REQUEST['editpagid'] : NULL;
$pgnom = isset($_POST['pgnom']) ? $_POST['pgnom'] : NULL;
$pgarc = isset($_POST['pgarc']) ? $_POST['pgarc'] : NULL;
$pgmos = isset($_REQUEST['pgmos']) ? $_REQUEST['pgmos'] : NULL;
$pgord = isset($_POST['pgord']) ? $_POST['pgord'] : NULL;
$pgmen = isset($_POST['pgmen']) ? $_POST['pgmen'] : NULL;
$icono = isset($_POST['icono']) ? $_POST['icono'] : NULL;
$modid = isset($_POST['modid']) ? $_POST['modid'] : NULL;

$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;
$datOne = null;

// echo "Mi variable: ".$editpagid; 

$mpg->setPgid($pgid);

if($pgid && $ope == "save"){
    $mpg->setPgnom($pgnom);
    $mpg->setPgarc($pgarc);
    $mpg->setPgmos($pgmos);
    $mpg->setPgord($pgord);
    $mpg->setPgmen($pgmen);
    $mpg->setIcono($icono); 
    $mpg->setModid($modid);
    $mpg->setEditpagid($editpagid);
    if(!$editpagid) $mpg->save();
    else $mpg->edit();
    // $mpg->save();
    // echo "<script>window.location =  </script>"
}

if($editpagid && $ope =="edi"){
    $mpg->setPgid($editpagid);
    $datOne = $mpg->getOne();
}

if( $pgid && $ope == 'act'){
     $mpg->setPgmos($pgmos);
     $mpg->edact();
     echo "<script>window.location = 'home.php?pg=".$pg."'</script>";
}

if($pgid && $ope =="eli") $mpg->del();


$datAll = $mpg->getAll();
$datVal = $mpg->valor();
$datMod = $mpg->getMod();




?>