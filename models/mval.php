<?php
    class Mval{
        private $valid;
        private $nomval;
        private $domid;
        
        public function getValid(){
            return $this->valid;
        }
        public function getNomval(){
            return $this->nomval;
        }
        public function getDomid(){
            return $this->domid;
        }

        public function setValid($valid){
            $this->valid = $valid;
        }
        public function setNomval($nomval){
            $this->nomval = $nomval;
        }
        public function setDomid($domid){
            $this->domid = $domid;
        }

        function getAll(){
            $sql = "SELECT v.valid, v.nomval, v.domid, d.nomdom FROM valor AS v INNER JOIN dominio AS d ON v.domid=d.domid";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }
        
        function getOne(){
            $sql = "SELECT v.valid, v.nomval, v.domid, d.nomdom FROM valor AS v INNER JOIN dominio AS d ON v.domid=d.domid WHERE v.valid=:valid";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $valid = $this->getValid();
            $result->bindParam(":valid", $valid);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }
        
        function save(){
            try{
                $sql = "INSERT INTO valor (nomval, domid) VALUES (:nomval, :domid)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $nomval = $this->getNomval();
                $result->bindParam(":nomval", $nomval);
                $domid = $this->getDomid();
                $result->bindParam(":domid", $domid);
                $result->execute();
                $res = $result->fetchall(PDO::FETCH_ASSOC);
                return $res;
            } catch (Exception $e){
                ManejoError($e);
            }
        }
        
        function edit(){
            try{
                $sql = "UPDATE valor SET nomval=:nomval, domid=:domid WHERE valid=:valid";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $valid = $this->getValid();
                $result->bindParam(":valid", $valid);
                $nomval = $this->getNomval();
                $result->bindParam(":nomval", $nomval);
                $domid = $this->getDomid();
                $result->bindParam(":domid", $domid);
                $result->execute();
                $res = $result->fetchall(PDO::FETCH_ASSOC);
                return $res;
            } catch (Exception $e){
                ManejoError($e);
            }
        }
        
        function del(){
            try{
                $sql = "DELETE FROM valor  WHERE valid=:valid";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $valid = $this->getValid();
                $result->bindParam(":valid", $valid);
                $result->execute();
                $res = $result->fetchall(PDO::FETCH_ASSOC);
                return $res;
            } catch (Exception $e){
                ManejoError($e);
            }
        }


    }



?>