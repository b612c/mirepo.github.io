<?php
    class Mshop{

        private $idshop;
        private $nit;
        private $direc;
        private $razsoc;
        private $tel;

        public function getIdshop(){
            return $this->idshop;
        }
        public function getNit(){
            return $this->nit;
        }
        public function getDirec(){
            return $this->direc;
        }
        public function getRazsoc(){
            return $this->razsoc;
        }
        public function getTel(){
            return $this->tel;
        }

        public function setIdshop($idshop){
            $this->idshop = $idshop;
        }
        public function setNit($nit){
            $this->nit = $nit;
        }
        public function setDirec($direc){
            $this->direc = $direc;
        }
        public function setRazsoc($razsoc){
            $this->razsoc = $razsoc;
        }
        public function setTel($tel){
            $this->tel = $tel;
        }

        function getAll(){
            $sql = "SELECT idshop, nit, direc, razsoc, tel FROM tienda";
           $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        
        function getOne(){
            $sql = "SELECT idshop, nit, direc, razsoc, tel FROM tienda WHERE idshop=:idshop";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idshop = $this->getIdshop();
            $result->bindParam(":idshop", $idshop);
            $result->execute();
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        function save(){
            try{
                $sql = "INSERT INTO tienda (nit, direc, razsoc, tel) VALUES (:nit, :direc, :razsoc, :tel)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $nit = $this->getNit();
                $result->bindParam(":nit", $nit);
                $direc = $this->getDirec();
                $result->bindParam(":direc", $direc);
                $razsoc = $this->getRazsoc();
                $result->bindParam(":razsoc", $razsoc);
                $tel = $this->getTel();
                $result->bindParam(":tel", $tel);
                $result->execute();
                $res = $result->fetchall(PDO::FETCH_ASSOC);
                return $res;
            } catch (Exception $e){
                ManejoError($e);
            }
        }
        function edit(){
            try{
                $sql = "UPDATE tienda SET nit=:nit, direc=:direc, razsoc=:razsoc, tel=:tel WHERE idshop=:idshop";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idshop = $this->getIdshop();
                $result->bindParam(":idshop", $idshop);
                $nit = $this->getNit();
                $result->bindParam(":nit", $nit);
                $direc = $this->getDirec();
                $result->bindParam(":direc", $direc);
                $razsoc = $this->getRazsoc();
                $result->bindParam(":razsoc", $razsoc);
                $tel = $this->getTel();
                $result->bindParam(":tel", $tel);
                $result->execute();
                $res = $result->fetchall(PDO::FETCH_ASSOC);
                return $res;
            } catch (Exception $e){
                ManejoError($e);
            }
        }
        function del(){
            try{
                $sql = "DELETE FROM tienda WHERE idshop=:idshop";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idshop = $this->getIdshop();
                $result->bindParam(":idshop", $idshop);
                $result->execute();
                $res = $result->fetchall(PDO::FETCH_ASSOC);
                return $res;
            } catch (Exception $e){
                ManejoError($e);
            }
        }





    }
?>