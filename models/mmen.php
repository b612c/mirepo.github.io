<?php
    class Mmen{
        //Atributos  
        private $pgid;
        private $idusu;

        // Metodos GET devuelven el dato
        function getPgid(){
            return $this->pgid;
        }
        function getIdusu(){
            return $this->idusu;
        }

        // Metodos SET guardar el dato
        function setIdusu($idusu){
            $this->idusu = $idusu;
        }  
        function setPgid($pgid){
            $this->pgid = $pgid;
        }

        public function getMen(){
            $sql = "SELECT p.pgid, p.pgnom, p.pgarc, p.pgmos, p.pgord, p.pgmen, p.icono, p.modid FROM pagina AS p INNER JOIN pgxpf AS f ON p.pgid=f.pgid WHERE p.pgmos=5 AND f.pefid='".$_SESSION['pefid']."' ORDER BY p.pgord";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute(); 
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        public function getOneMen(){
            $sql = "SELECT p.pgid, p.pgnom, p.pgarc, p.icono FROM pagina AS p WHERE p.pgid=:pgid ORDER BY p.pgord";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $pgid = $this->getPgid();
            $result->bindParam(':pgid', $pgid);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }
        public function getVal(){
            $sql = "SELECT p.pgid, p.pgnom, p.pgarc, p.icono, p.pgmos FROM pagina AS p INNER JOIN pgxpf AS f ON p.pgid = f.pgid WHERE p.pgid=:pgid AND f.pefid='".$_SESSION['pefid']."'";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $pgid = $this->getPgid();
            $result->bindParam(':pgid', $pgid);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

    }


?>