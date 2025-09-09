<?php
    include('models/mmen.php');

    $mmen = new Mmen();
    $dat = $mmen->getMen();

    function valpg($pgid){
        $mmen = new Mmen();
        $mmen->setPgid($pgid);
        $dat = $mmen->getVal();    
        return $dat;
    }

?>