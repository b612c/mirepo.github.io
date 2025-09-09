<?php
    class Mmod{
        private $modid; 
        private $modnm; 
        private $modimg; 
        private $modact; 
        private $pgid;
        
        public function getModid(){
            return $this->modid;
        }
        public function getModnm(){
            return $this->modnm;
        }
        public function getModimg(){
            return $this->modimg;
        }
        public function getModact(){
            return $this->modact;
        }
        public function getPgid(){
            return $this->pgid;
        }

        public function setModid($modid){
            $this->modid = $modid;
        }
        public function setModnm($modnm){
            $this->modnm = $modnm;
        }
        public function setModimg($modimg){
            $this->modimg = $modimg;
        }
        public function setModact($modact){
            $this->modact = $modact;
        }
        public function setPgid($pgid){
            $this->pgid = $pgid;
        }

    	function getAll(){
			$sql = "SELECT m.modid, m.modnm, m.modimg, m.modact, m.pgid, p.pgnom FROM modulo AS m INNER JOIN pagina AS p ON m.pgid=p.pgid";
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$result = $conexion->prepare($sql);
			$result->execute();
			$res = $result->fetchall(PDO::FETCH_ASSOC);
			return $res;
		}
        
    	function getOne(){
            $sql = "SELECT modid, modnm, modimg, modact, pgid FROM modulo WHERE modid=:modid";
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$result = $conexion->prepare($sql);
            $modid = $this->getModid();
            $result->bindParam(":modid",$modid);
			$result->execute();
			$res = $result->fetchall(PDO::FETCH_ASSOC);
			return $res;
		}

        
        function edit(){
            try{
                $sql = "UPDATE modulo SET modnm=:modnm, modimg=:modimg, pgid=:pgid, modact=:modact WHERE modid=:modid";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $modid = $this->getModid();
                $result->bindParam(":modid",$modid);
                $modnm = $this->getModnm();
                $result->bindParam(":modnm",$modnm);
                $modimg = $this->getModimg();
                $result->bindParam(":modimg",$modimg);
                $pgid = $this->getPgid();
                $result->bindParam(":pgid",$pgid);
                $modact = $this->getModact();
                $result->bindParam(":modact",$modact);
                $result->execute();
            } catch (Exception $e){
                ManejoError($e);
            }
        }
        function save(){
            try{
                $sql = "INSERT INTO modulo (modnm, modimg, pgid, modact) VALUES (:modnm, :modimg, :pgid, :modact)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $modnm = $this->getModnm();
                $result->bindParam(":modnm",$modnm);
                $modimg = $this->getModimg();
                $result->bindParam(":modimg",$modimg);
                $pgid = $this->getPgid();
                $result->bindParam(":pgid",$pgid);
                $modact = $this->getModact();
                $result->bindParam(":modact",$modact);
                $result->execute();
            } catch (Exception $e){
                ManejoError($e);
            }
        }
        function del(){
            try{
                $sql = "DELETE FROM modulo WHERE modid=:modid";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $modid = $this->getModid();
                $result->bindParam(":modid",$modid);
                $result->execute();
            } catch (Exception $e){
                ManejoError($e);
            }
        }
        function edact(){
            try{
                $sql = "UPDATE modulo SET modact=:modact WHERE modid=:modid";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $modid = $this->getModid();
                $result->bindParam(":modid",$modid);
                $modact = $this->getModact();
                $result->bindParam(":modact",$modact);
                $result->execute();
            } catch (Exception $e){
                ManejoError($e);
            }
        }
        


        //funciones para el pmod
        function getAllAct(){
            $sql = "SELECT modid, modnm, modimg, modact FROM modulo WHERE modact=1;";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }
        function getOnePrPfMd(){
			$sql = "SELECT m.modid, m.modnm, m.modimg, p.pefid, p.pefnm, p.pgid FROM modulo AS m LEFT JOIN perfil AS p ON m.modid=p.modid RIGHT JOIN pfxus AS f ON p.pefid=f.pefid WHERE f.idusu='".$_SESSION["idusu"]."' AND m.modid=:modid;";
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$result = $conexion->prepare($sql);
			$modid = $this->getModid();
			$result->bindParam(":modid",$modid);
			$result->execute();
			$res = $result->fetchall(PDO::FETCH_ASSOC);
			return $res;
		}
        
        function getOnePrPf(){
			$sql = "SELECT m.modid, m.modnm, m.modimg, p.pefid, p.pefnm, p.pgid FROM modulo AS m LEFT JOIN perfil AS p ON m.modid=p.modid RIGHT JOIN pfxus AS f ON p.pefid=f.pefid WHERE f.idusu='".$_SESSION["idusu"]."';";
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$result = $conexion->prepare($sql);
			$result->execute();
			$res = $result->fetchall(PDO::FETCH_ASSOC);
			return $res;
		}

    }


?>