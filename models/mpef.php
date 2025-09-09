<?php
    class Mpef {
        private $pefid;
        private $pefnm;
        private $modid;
        private $pgid;


        public function getPefid() {
            return $this->pefid;
        }
        public function getPefnm() {
            return $this->pefnm;
        }
        public function getModid() {
            return $this->modid;
        }
        public function getPgid() {
            return $this->pgid;
        }

        public function setPefid($pefid) {
            $this->pefid = $pefid;
        }
        public function setPefnm($pefnm) {
            $this->pefnm = $pefnm;
        }
        public function setModid($modid) {
            $this->modid = $modid;
        }
        public function setPgid($pgid) {
            $this->pgid = $pgid;
        }

        function getAll(){
            $sql = "SELECT f.pefid, f.pefnm, f.modid, f.pgid, m.modnm, p.pgnom FROM perfil AS f INNER JOIN modulo AS m ON f.modid=m.modid INNER JOIN pagina AS p ON f.pgid=p.pgid";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        function getOne(){
            $sql = "SELECT pefid, pefnm, modid, pgid FROM perfil  WHERE pefid=:pefid";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $pefid = $this->getPefid();
    		$result->bindParam(':pefid',$pefid);
            $result->execute();
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        function save(){
            $sql = "INSERT INTO perfil (pefnm, modid, pgid) VALUES (:pefnm, :modid, :pgid)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $pefnm = $this->getPefnm();
    		$result->bindParam(':pefnm',$pefnm);
            $modid = $this->getModid();
            $result->bindParam(':modid',$modid);
            $pgid = $this->getPgid();
            $result->bindParam(':pgid',$pgid);
            $result->execute();
            // $res = $result->fetchAll(PDO::FETCH_ASSOC);
            // return $res;

        }

        function edit(){
            $sql = "UPDATE perfil SET pefnm=:pefnm, modid=:modid, pgid=:pgid WHERE pefid=:pefid";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $pefid = $this->getPefid();
    		$result->bindParam(':pefid',$pefid);
            $pefnm = $this->getPefnm();
    		$result->bindParam(':pefnm',$pefnm);
            $modid = $this->getModid();
            $result->bindParam(':modid',$modid);
            $pgid = $this->getPgid();
            $result->bindParam(':pgid',$pgid);
            $result->execute();
            // $res = $result->fetchAll(PDO::FETCH_ASSOC);
            // return $res;
            
        }
        
        function del(){
            try{
                $sql = "DELETE FROM perfil WHERE pefid=:pefid";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $pefid = $this->getPefid();
                $result->bindParam(':pefid',$pefid);
                $result->execute();
                // $res = $result->fetchAll(PDO::FETCH_ASSOC);
                // return $res;
            } catch (Exception $e){
                ManejoError($e);
            }
            
        }
        
    	public function savePxP(){
            $sql = "INSERT INTO pgxpf (pgid,pefid) VALUES (:pgid,:pefid)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $pefid = $this->getPefid();
            $result->bindParam(":pefid",$pefid);
            $pgid = $this->getPgid();
            $result->bindParam(":pgid",$pgid);
            $result->execute();
        }
        
        
        public function delPXP(){
            try {
                $sql = "DELETE FROM pgxpf WHERE pefid=:pefid";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $pefid = $this->getPefid(); 
                $result->bindParam(":pefid", $pefid);
                $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }
    
    function getPagina(){
        $sql = "SELECT pgid, pgnom, pgarc, pgmos, pgord, pgmen, icono, modid FROM pagina WHERE modid=:modid";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $modid = $this->getModid();
        $result->bindParam(':modid',$modid);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    
    function selPxP(){
        $sql = "SELECT pgid FROM pgxpf WHERE pefid=:pefid";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $pefid = $this->getPefid();
        $result->bindParam(":pefid", $pefid);
        $result->execute();
        $res = $result-> fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    
    









    }
?>