<?php
    class Mdom{

        private $domid;
        private $nomdom;

        public function getDomid(){
            return $this->domid;
        }
        public function getNomdom(){
            return $this->nomdom;
        }

        public function setDomid($domid){
            $this->domid = $domid;
        }
        public function setNomdom($nomdom){
            $this->nomdom = $nomdom;
        }

        function getAll(){
            $sql = "SELECT domid, nomdom FROM dominio";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        function getOne(){
            $sql = "SELECT domid, nomdom FROM dominio WHERE domid=:domid";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $domid = $this->getDomid();
            $result->bindParam(":domid", $domid);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }
        
        function save(){
            try{
                $sql = "INSERT INTO dominio (nomdom) VALUES (:nomdom)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $nomdom = $this->getNomdom();
                $result->bindParam(":nomdom", $nomdom);
                $result->execute();
                $res = $result->fetchall(PDO::FETCH_ASSOC);
                return $res;
            } catch (Exception $e){
                ManejoError($e);
            }
        }
        function edit(){
            try{
                $sql = "UPDATE dominio SET nomdom=:nomdom WHERE domid=:domid";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $domid = $this->getDomid();
                $result->bindParam(":domid", $domid);
                $nomdom = $this->getNomdom();
                $result->bindParam(":nomdom", $nomdom);
                $result->execute();
                $res = $result->fetchall(PDO::FETCH_ASSOC);
                return $res;
            } catch (Exception $e){
                ManejoError($e);
            }
        }
        function del(){
            try{
                $sql = "DELETE FROM dominio WHERE domid=:domid";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $domid = $this->getDomid();
                $result->bindParam(":domid", $domid);
                $result->execute();
                $res = $result->fetchall(PDO::FETCH_ASSOC);
                return $res;
            } catch (Exception $e){
                ManejoError($e);
            }
        }

    }


?>