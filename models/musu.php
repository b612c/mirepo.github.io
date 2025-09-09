<?php
    class Musu {
        private $idusu; 
        private $ndoc;
        private $tipo_doc;
        private $nomusu;
        private $appusu;
        private $email;
        private $tel;
        private $pass;
        private $direc;
        private $fecnac;
        private $actper;
        private $sexo;
        private $estado;
        private $foto;

        private $pefid;


        // getters
        public function getIdusu() {
            return $this->idusu;
        }
        public function getNdoc() {
            return $this->ndoc;
        }
        public function getTipo_doc() {
            return $this->tipo_doc;
        }       
        public function getNomusu() {
            return $this->nomusu;
        }
        public function getAppusu() {
            return $this->appusu;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getTel() {
            return $this->tel;
        }
        public function getPass() {
            return $this->pass;
        }
        public function getDirec() {
            return $this->direc;
        }
        public function getFecnac() {
            return $this->fecnac;
        }
        public function getActper() {
            return $this->actper;
        }
        public function getSexo() {
            return $this->sexo;
        }
        public function getEstado(){
            return $this->estado;
        }
        public function getFoto(){
            return $this->foto;
        }

        function getPefid(){
            return $this->pefid;
        }

        // Setters
        public function setIdusu($idusu) {
            $this->idusu = $idusu;
        }   
        public function setNdoc($ndoc) {
            $this->ndoc = $ndoc;
        }
        public function setTipoDoc($tipo_doc) {
            $this->tipo_doc = $tipo_doc;
        }
        public function setNomusu($nomusu) {
            $this->nomusu = $nomusu;
        }
        public function setAppusu($appusu) {
            $this->appusu = $appusu;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function setTel($tel) {
            $this->tel = $tel;
        }
        public function setPass($pass) {
            $this->pass = $pass;
        }
        public function setDirec($direc) {
            $this->direc = $direc;
        }
        public function setFecnac($fecnac) {
            $this->fecnac = $fecnac;
        }
        public function setActper($actper) {
            $this->actper = $actper;
        }
        public function setSexo($sexo) {
            $this->sexo = $sexo;
        }
        public function setEstado($estado){
            $this->estado = $estado;
        }
        public function setFoto($foto){
            $this->foto = $foto;
        }

        function setPefid($pefid){
            $this->pefid = $pefid;
        }


        function getAll($pg){
            $sql ="SELECT idusu, ndoc, tipo_doc, nomusu, appusu, email, tel, pass, direc, fecnac, actper, sexo, estado, foto FROM usuario";
            if($pg == 20011) $sql .= " WHERE idusu = '".$_SESSION['idusu']."'";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        function getOne(){
            $sql ="SELECT idusu, ndoc, tipo_doc, nomusu, appusu, email, tel, pass, direc, fecnac, actper, sexo, estado, foto FROM usuario WHERE idusu=:idusu";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idusu = $this->getIdusu();
            $result->bindParam(":idusu",$idusu);
            $result->execute();
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        function save(){
            try{
                $sql = "INSERT INTO usuario (ndoc, tipo_doc, nomusu, appusu, email, tel, pass, direc, fecnac, actper, sexo, estado, foto) VALUES (:ndoc, :tipo_doc, :nomusu, :appusu, :email, :tel, :pass, :direc, :fecnac, :actper, :sexo, :estado, :foto)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                // $idusu = $this->getIdusu();
                // $result->bindParam(":idusu",$idusu);
                $actper = $this->getActper();
                $result->bindParam(":actper",$actper);
                $ndoc = $this->getNdoc();
                $result->bindParam(":ndoc", $ndoc); 
                $tipo_doc = $this->getTipo_doc();
                $result->bindParam(":tipo_doc", $tipo_doc);
                $nomusu = $this->getNomusu();
                $result->bindParam(":nomusu", $nomusu);
                $appusu = $this->getAppusu();
                $result->bindParam(":appusu", $appusu);
                $email = $this->getEmail();
                $result->bindParam(":email", $email);
                $tel = $this->getTel();
                $result->bindParam(":tel", $tel); 
                $pass = $this->getPass();
                $result->bindParam(":pass", $pass);
                $direc = $this->getDirec();
                $result->bindParam(":direc", $direc);
                $fecnac = $this->getFecnac();
                $result->bindParam(":fecnac", $fecnac);
                $sexo = $this->getSexo();
                $result->bindParam(":sexo", $sexo); 
                $estado = $this->getEstado();
                $result->bindParam(":estado", $estado);
                $foto = $this->getFoto();
                $result->bindParam(":foto", $foto);
                $result->execute();
                $res = $result->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            } catch (Exception $e) {
                ManejoError($e);
            }
        }

        function savePxF(){
            try{
                $sql = "INSERT INTO pfxus (idusu,pefid) VALUES (:idusu,:pefid)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idusu = $this->getIdusu();
                $result->bindParam(":idusu",$idusu);
                $pefid = $this->getPefid();
                $result->bindParam(":pefid",$pefid);
                $result->execute();
                $res = $result->fetchall(PDO::FETCH_ASSOC);
                return $res; 
            }catch(Exception $e){
                ManejoError($e);
            }
        }

        function delPxF(){
            try{
                $sql = "DELETE FROM pfxus WHERE idusu=:idusu";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idusu = $this->getIdusu();
                $result->bindParam(":idusu",$idusu);
                $result->execute();
                $res = $result->fetchall(PDO::FETCH_ASSOC);
                return $res; 
            }catch(Exception $e){
                ManejoError($e);
            }
        }

        function edit($pg, $pas, $actp){
            try{
                $sql = "UPDATE usuario SET ndoc=:ndoc, tipo_doc=:tipo_doc, nomusu=:nomusu, appusu=:appusu, email=:email, tel=:tel,  direc=:direc, fecnac=:fecnac, ";
                if($this->getFoto()) $sql .= "foto=:foto, ";
                if($pg = 20011 && $pas != null) $sql .= "pass=:pass, ";
                if($pg = 2001 && $actp != null) $sql .= "actper=:actper, ";
                $sql .= "sexo=:sexo, estado=:estado WHERE idusu=:idusu";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);

                $idusu = $this->getIdusu();
                $result->bindParam(":idusu",$idusu);

                if($pg = 2001 && $actp != null){
                    $actper = $this->getActper();
                    $result->bindParam(":actper",$actper);
                }

                $ndoc = $this->getNdoc();
                $result->bindParam(":ndoc", $ndoc); 

                $tipo_doc = $this->getTipo_doc();
                $result->bindParam(":tipo_doc", $tipo_doc);

                $nomusu = $this->getNomusu();
                $result->bindParam(":nomusu", $nomusu);

                $appusu = $this->getAppusu();
                $result->bindParam(":appusu", $appusu);

                $email = $this->getEmail();
                $result->bindParam(":email", $email);

                $tel = $this->getTel();
                $result->bindParam(":tel", $tel); 

                
                $direc = $this->getDirec();
                $result->bindParam(":direc", $direc);
                
                $fecnac = $this->getFecnac();
                $result->bindParam(":fecnac", $fecnac);
                
                $sexo = $this->getSexo();
                $result->bindParam(":sexo", $sexo); 
                
                $estado = $this->getEstado();
                $result->bindParam(":estado", $estado);
                if($pg = 20011 && $pas != null){
                    $pass = $this->getPass();
                    $result->bindParam(":pass", $pass);
                }
                
                if($this->getFoto()){
                    $foto = $this->getFoto();
                    $result->bindParam(":foto", $foto);
                }
                
                $result->execute();
                $res = $result->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            } catch (Exception $e) {
                ManejoError($e);
            }
        }
        function del(){
            try{
                $sql = "DELETE FROM usuario WHERE idusu=:idusu";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idusu = $this->getIdusu();
                $result->bindParam(":idusu",$idusu);
                $result->execute();
                $res = $result->fetchall(PDO::FETCH_ASSOC);
                return $res; 
            }catch(Exception $e){
                ManejoError($e);
            }
        }

        
        function edact(){
            $sql = "UPDATE usuario SET actper=:actper WHERE idusu=:idusu";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idusu = $this->getIdusu();
            $result->bindParam(":idusu",$idusu);
            $actper = $this->getActper();
            $result->bindParam(":actper",$actper);
            $result->execute();
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
        function getOnePef($modid){
            $sql = "SELECT pefid, pefnm, modid, pgid FROM perfil WHERE modid=:modid";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result -> bindParam(":modid",$modid);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function getOnePfxUs(){
        $sql = "SELECT pefid AS pgid FROM pfxus WHERE idusu=:idusu";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idusu = $this->getIdusu();
        $result -> bindParam(":idusu",$idusu);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
        }

    }
?>