<?php
    class Mpag{

        private $pgid; 
        private $editpagid;
        private $pgnom;
        private $pgarc;
        private $pgmos;
        private $pgord;
        private $pgmen;
        private $icono;
        private $modid;

        public function getPgid(){
            return $this->pgid;
        } 
        public function getEditpagid(){
            return $this->editpagid;
        } 
        public function getPgnom(){
            return $this->pgnom;
        }
        public function getPgarc(){
            return $this->pgarc;
        }
        public function getPgmos(){
            return $this->pgmos;
        }
        public function getPgord(){
            return $this->pgord;
        }
        public function getPgmen(){
            return $this->pgmen;
        }
        public function getIcono(){
            return $this->icono;
        }
        public function getModid(){
            return $this->modid;
        }
        
        public function setPgid($pgid){
            $this->pgid = $pgid;
        } 
        public function setEditpagid($editpagid){
            $this->editpagid = $editpagid;
        } 
        public function setPgnom($pgnom){
            $this->pgnom = $pgnom;
        }
        public function setPgarc($pgarc){
            $this->pgarc = $pgarc;
        }
        public function setPgmos($pgmos){
            $this->pgmos = $pgmos;
        }
        public function setPgord($pgord){
            $this->pgord = $pgord;
        }
        public function setPgmen($pgmen){
            $this->pgmen = $pgmen;
        }
        public function setIcono($icono){
            $this->icono = $icono;
        }
        public function setModid($modid){
            $this->modid = $modid;
        }

        function getAll(){
            $sql = "SELECT p.pgid, p.pgnom, p.pgarc, p.pgmos, p.pgord, p.pgmen, p.icono, p.modid, m.modnm FROM pagina AS p INNER JOIN modulo AS m ON m.modid=p.modid";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        function getOne(){
            $sql = "SELECT p.pgid, p.pgnom, p.pgarc, p.pgmos, p.pgord, p.pgmen, p.icono, p.modid, m.modnm FROM pagina AS p INNER JOIN modulo AS m ON m.modid=p.modid WHERE p.pgid=:pgid";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $pgid = $this->getPgid();
            $result->bindParam(":pgid", $pgid);
            $result->execute();
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        function save(){
            try{
                $sql = "INSERT INTO pagina (pgid, pgnom, pgarc, pgmos, pgord, pgmen, icono, modid) 
                VALUES (:pgid, :pgnom, :pgarc, :pgmos, :pgord, :pgmen, :icono, :modid)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);

                $pgid = $this->getPgid();
                $result->bindParam(":pgid", $pgid);
                $pgnom = $this->getPgnom();
                $result->bindParam(":pgnom", $pgnom);
                $pgarc = $this->getPgarc();
                $result->bindParam(":pgarc", $pgarc);
                $pgmos = $this->getPgmos();
                $result->bindParam(":pgmos", $pgmos);
                $pgord = $this->getPgord();
                $result->bindParam(":pgord", $pgord);
                $pgmen = $this->getPgmen();
                $result->bindParam(":pgmen", $pgmen);
                $icono = $this->getIcono();
                $result->bindParam(":icono", $icono);
                $modid = $this->getModid();
                $result->bindParam(":modid", $modid);

                $result->execute();
                $res = $result->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            } catch(Exception $e){
                ManejoError($e);
            }
        }
        function edit(){
            try{
                $sql = "UPDATE pagina SET pgid=:pgid, pgnom=:pgnom, pgarc=:pgarc, pgmos=:pgmos, pgord=:pgord, pgmen=:pgmen, icono=:icono, modid=:modid WHERE pgid=:editpagid";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);

                $pgid = $this->getPgid();
                $result->bindParam(":pgid", $pgid);
                $editpagid = $this->getEditpagid();
                $result->bindParam(":editpagid", $editpagid);
                $pgnom = $this->getPgnom();
                $result->bindParam(":pgnom", $pgnom);
                $pgarc = $this->getPgarc();
                $result->bindParam(":pgarc", $pgarc);
                $pgmos = $this->getPgmos();
                $result->bindParam(":pgmos", $pgmos);
                $pgord = $this->getPgord();
                $result->bindParam(":pgord", $pgord);
                $pgmen = $this->getPgmen();
                $result->bindParam(":pgmen", $pgmen);
                $icono = $this->getIcono();
                $result->bindParam(":icono", $icono);
                $modid = $this->getModid();
                $result->bindParam(":modid", $modid);

                $result->execute();
                $res = $result->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            } catch(Exception $e){
                ManejoError($e);
            }
        }
        
        function del(){
            try{
                $sql = "DELETE FROM pagina WHERE pgid=:pgid";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);

                $pgid = $this->getPgid();
                $result->bindParam(":pgid", $pgid);

                $result->execute();
                $res = $result->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            } catch(Exception $e){
                ManejoError($e);
            }
        }


    	function getMod(){
			$sql = "SELECT modid, modnm, modimg, modact FROM modulo";
			$modelo = new conexion();
			$conexion = $modelo->get_conexion();
			$result = $conexion->prepare($sql);
			$result->execute();
			$res = $result->fetchall(PDO::FETCH_ASSOC);
			return $res;
		}

        function valor(){
            $sql = "SELECT valid, nomval, domid FROM valor";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        function edact(){
            $sql = "UPDATE pagina SET pgmos=:pgmos WHERE pgid=:pgid";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $pgid = $this->getPgid();
            $result->bindParam(":pgid",$pgid);
            $pgmos = $this->getPgmos();
            $result->bindParam(":pgmos",$pgmos);
            $result->execute();
        }
        
    }

?>