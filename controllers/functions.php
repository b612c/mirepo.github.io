<?php
    include ('models/musu.php');

    function titulo($ico, $pgnm){
        $txt = '';
        $txt .= '<div class="titu">';
            $txt .= '<p><i class="'.$ico.'"></i> '.$pgnm.'</p>';
            $txt .= '<hr class="line">';
        $txt .= '</div>';
        echo $txt;
    }

    function alerta($nm, $id, $tit,$arc, $var){

        $txt = '';
        $txt .=  '<div class="modal fade" id="'.$nm.$id.'" tabindex="-1" aria-labelledby="" aria-hidden="true">';
            $txt .=  '<div class="modal-dialog modal-dialog-centered">';
                $txt .=  '<div class="modal-content mi-modal">';
                    $txt .=  '<div class="modal-header">';
                        $txt .=  '<h1 class="modal-title fs-5" id="">Eliminar - '.$tit.' </h1>';
                        $txt .=  '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    $txt .=  '</div>';
                    $txt .=  '<form action="home.php'.$arc.'" method="POST">';
                        $txt .=  '<div class="modal-body">';
                            $txt .= '<input type="hidden" value="' . $id . '" name="'.$var.'">';
                            $txt .=  '<div class="row text-center">';
                                $txt .=  '<div class="col-12 ">';
                                    $txt .= '<i class="fa-solid fa-circle-exclamation icon__alert"></i>';
                                $txt .=  '</div>';
                                $txt .=  '<div class="col-12 text__alert">';
                                    $txt .= '¿Está seguro/a de que desea eliminar este elemento?';
                                $txt .=  '</div>';
                            $txt .=  '</div>';
                        $txt .=  '</div>';
                        $txt .= '<div class="modal-footer">';
                            $txt .= '<div class="row">';
                                $txt .= '<div class="col-6 text-center">';
                                    $txt .= '<button type="button" class="col-12 btn btn_secundario" data-bs-dismiss="modal">Cerrar</button>';
                                $txt .= '</div>';
                                $txt .= '<div class="col-6 text-center">';
                                    $txt .= '<input type="submit" class="col-12 btn btn_eliminar" value="Eliminar">';
                                    $txt .= '<input type="hidden" name="ope" value="eli" >';
                                $txt .= '</div>';
                            $txt .= '</div>';
                        $txt .= '</div>';
                    $txt .=  '</form>';
                $txt .=  '</div>';
            $txt .=  '</div>';
        $txt .=  '</div>';
        echo $txt;
    }
    function Pass($nm, $id,$arc, $var){

        $txt = '';
        $txt .=  '<div class="modal fade" id="'.$nm.$id.'" tabindex="-1" aria-labelledby="" aria-hidden="true">';
            $txt .=  '<div class="modal-dialog modal-dialog-centered">';
                $txt .=  '<div class="modal-content mi-modal">';
                    $txt .=  '<div class="modal-header">';
                        $txt .=  '<h1 class="modal-title fs-5" id="">Cambiar contraseña</h1>';
                        $txt .=  '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    $txt .=  '</div>';
                    $txt .=  '<form action="home.php'.$arc.'" method="POST">';
                        $txt .=  '<div class="modal-body">';
                            $txt .= '<input type="hidden" value="' . $id . '" name="'.$var.'">';
                            $txt .=  '<div class="row">';
                                $txt .=  '<div class="col-12">';
                                    $txt .= '<label for="pass" class="form-label">Nueva contraseña</label>';
                                    $txt .= '<input type="password" id="pass" name="pass" class="form-control" onchange="val();">';
                                $txt .= '</div>';
                                $txt .=  '<div class="col-12">';
                                    $txt .= '<label for="pass2" class="form-label">Confirmar contraseña</label>';
                                    $txt .= '<input type="password" id="pass2" name="pass2" class="form-control" onchange="val();">';
                                $txt .= '</div>';
                                $txt .=  '<div class="col-12" id="pass_ms"></div>';
                            $txt .=  '</div>';
                        $txt .=  '</div>';
                        $txt .= '<div class="modal-footer">';
                            $txt .= '<div class="row">';
                                $txt .= '<div class="col-6 text-center">';
                                    $txt .= '<button type="button" class="col-12 btn btn_secundario" data-bs-dismiss="modal">Cerrar</button>';
                                $txt .= '</div>';
                                $txt .= '<div class="col-6 text-center">';
                                    $txt .= '<input type="submit" class="col-12 btn btn-principal" value="Actualizar" id="updt_pass">';
                                    $txt .= '<input type="hidden" name="ope" value="save" >';
                                $txt .= '</div>';
                            $txt .= '</div>';
                        $txt .= '</div>';
                    $txt .=  '</form>';
                $txt .=  '</div>';
            $txt .=  '</div>';
        $txt .=  '</div>';
        echo $txt;
    }

    function mdl_PGxPF($nm, $id, $tit, $pgAll, $pg, $PfSelFrmt){

        $txt = '';
        $txt .=  '<div class="modal fade" id="'.$nm.$id.'" tabindex="-1" aria-labelledby="" aria-hidden="true">';
            $txt .=  '<div class="modal-dialog">';
                $txt .=  '<div class="modal-content mi-modal">';
                    $txt .=  '<div class="modal-header">';
                        $txt .=  '<h1 class="modal-title fs-5" id="">Paginas - '.$tit.' </h1>';
                        $txt .=  '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    $txt .=  '</div>';
                    $txt .=  '<form action="home.php?pg='.$pg.'" method="POST">';
                        $txt .=  '<div class="modal-body">';
                            $txt .= '<input type="hidden" value="' . $id . '" name="pefid">';
                            $txt .=  '<div class="row ">';
                                if($pgAll){
                                    foreach($pgAll as $pAll){
                                        $txt .=  '<div class="col-md-6 pgchk">';
                                        $pos = strpos($PfSelFrmt, $pAll['pgid']);
                                            $txt .= '<label class="my__check">';
                                                $txt .= '<input class="check" type="checkbox" name="chk[]" value="' . $pAll['pgid'] . '"';
                                                if ($pos > -1) $txt .= ' checked ';
                                                $txt .= '>';
                                                $txt .= '<span class="chk__mark"></span>';
                                                $txt .= ' <i class="'.$pAll['icono'].'"></i> ';
                                                $txt .= "<p>".$pAll['pgnom']."</p>";
                                            $txt .= '</label>';
                                            
                                        $txt .=  '</div>';
                                    }
                                }    
                            $txt .=  '</div>';
                        $txt .=  '</div>';
                        $txt .= '<div class="modal-footer">';
                            $txt .= '<div class="row">';
                                $txt .= '<div class="col-6 text-center">';
                                    $txt .= '<button type="button" class="col-12 btn btn_secundario" data-bs-dismiss="modal">Cerrar</button>';
                                $txt .= '</div>';
                                $txt .= '<div class="col-6 text-center">';
                                    $txt .= '<input type="submit" class="col-12 btn btn-principal" value="Guardar">';
                                $txt .= '</div>';
                            $txt .= '</div>';
                            $txt .= '<input type="hidden" value="savepxp" name="ope">';
                        $txt .= '</div>';
                    $txt .=  '</form>';
                $txt .=  '</div>';
            $txt .=  '</div>';
        $txt .=  '</div>';
        echo $txt;
    }
    
    function mdl_PFxUS($nm, $id, $tit, $mod, $pg, $PgSelFrmt){
        $musu = new Musu();
        $txt = '';
        $txt .=  '<div class="modal fade" id="'.$nm.$id.'" tabindex="-1" aria-labelledby="" aria-hidden="true">';
            $txt .=  '<div class="modal-dialog">';
                $txt .=  '<div class="modal-content mi-modal">';
                    $txt .=  '<div class="modal-header">';
                        $txt .=  '<h1 class="modal-title fs-5" id="">Paginas - '.$tit.' </h1>';
                        $txt .=  '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    $txt .=  '</div>';
                    $txt .=  '<form action="home.php?pg='.$pg.'" method="POST">';
                        $txt .=  '<div class="modal-body">';
                            $txt .= '<input type="hidden" value="' . $id . '" name="idusu">';
                            $txt .=  '<div class="row ">';
                            if ($mod) {
                                foreach ($mod as $dt) {
                                $dtpg = $musu->getOnePef($dt['modid']);
                                $txt .= '<div class="form-group col-md-6">';
                                    $txt .= '<label for="modid" class="form-label">' . $dt['modnm'] . '</label>';
                                    $txt .= '<input type="hidden" name="modid[]" value="' . $dt['modid'] . '">';
                                    $txt .= '<select name="pefid[]" id="pefid" class="form form-select" required>';
                                        $txt .= '<option value="0">Sin perfil</option>';
                                        if ($dtpg) {
                                            foreach ($dtpg as $td) {
                                            $pos = strpos($PgSelFrmt, $td['pefid']);
                                            $txt .= '<option value="' . $td['pefid'] . '" ';
                                            if ($pos > -1) $txt .= 'selected';;
                                            $txt .= '>' . $td['pefnm'] . '</option>';
                                            }
                                        }
                                    $txt .= '</select>';
                                $txt .= '</div>';
                                }
                            }
                            $txt .=  '</div>';
                        $txt .=  '</div>';
                        $txt .= '<div class="modal-footer">';
                            $txt .= '<div class="row">';
                                $txt .= '<div class="col-6 text-center">';
                                    $txt .= '<button type="button" class="col-12 btn btn_secundario" data-bs-dismiss="modal">Cerrar</button>';
                                $txt .= '</div>';
                                $txt .= '<div class="col-6 text-center">';
                                    $txt .= '<input type="submit" class="col-12 btn btn-principal" value="Guardar">';
                                $txt .= '</div>';
                            $txt .= '</div>';
                            $txt .= '<input type="hidden" value="savepxf" name="ope">';
                        $txt .= '</div>';
                    $txt .=  '</form>';
                $txt .=  '</div>';
            $txt .=  '</div>';
        $txt .=  '</div>';
        echo $txt;
    }

    function modal_info($usu){

        $txt = '';
        $txt .=  '<div class="modal fade" id="info'.$usu['idusu'].'" tabindex="-1" aria-labelledby="" aria-hidden="true">';
            $txt .=  '<div class="modal-dialog modal-dialog-scrollable modal__info">';
                $txt .=  '<div class="modal-content mi-modal">';
                    $txt .=  '<div class="modal-header">';
                        $txt .=  '<h1 class="modal-title fs-5" id="">Información de '.$usu['nomusu'].' </h1>';
                        $txt .=  '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    $txt .=  '</div>';
                    $txt .=  '<div class="modal-body">';
                        $txt .=  '<div class="row ">';
                            $txt .=  '<div class="col-md-3  text-center">';
                            if(file_exists($usu['foto'])){ 
                                $txt .=  '<img src="'.$usu['foto'].'" alt="Foto de usuario" class="img_modal">';
                            } else{ 
                                $txt .=  '<img src="img/no-user.jpg" alt="No hay foto de usuario" class="img_modal">';
                            }        
                            $txt .=  '</div>';
                            $txt .=  '<div class="col-md-9 modal-info">';
                                $txt .=  '<div class="row ">';
                                    $txt .=  '<div class="col-md-6">';
                                        $txt .=  '<strong>Nombres: </strong> '.$usu['nomusu'];
                                    $txt .=  '</div>';
                                    $txt .=  '<div class="col-md-6">';
                                        $txt .=  '<strong>Apellidos: </strong> '.$usu['appusu'];
                                    $txt .=  '</div>';
                                    $txt .=  '<div class="col-md-6">';
                                        $txt .=  '<strong>Fecha nacimiento: </strong> '.$usu['fecnac'];
                                    $txt .=  '</div>';
                                    $txt .=  '<div class="col-md-6">';
                                        $txt .=  '<strong>Documento: </strong> '.$usu['tipo_doc']." ".$usu['ndoc'];
                                    $txt .=  '</div>';
                                    $txt .=  '<div class="col-md-6">';
                                        $txt .=  '<strong>Correo: </strong> '.$usu['email'];
                                    $txt .=  '</div>';
                                    $txt .=  '<div class="col-md-6">';
                                        $txt .=  '<strong>Telefono: </strong> '.$usu['tel'];
                                    $txt .=  '</div>';
                                    $txt .=  '<div class="col-md-6">';
                                        $txt .=  '<strong>Sexo: </strong> '.$usu['sexo'];
                                    $txt .=  '</div>';
                                    $txt .=  '<div class="col-md-6">';
                                        $txt .=  '<strong>Usuario Activo: </strong> '.$usu['actper'];
                                    $txt .=  '</div>';
                                    $txt .=  '<div class="col-md-6">';
                                        $txt .=  '<strong>Estado civil: </strong> '.$usu['estado'];
                                    $txt .=  '</div>';
                                $txt .=  '</div>';
                            $txt .=  '</div>';
                            $txt .=  '<div class="col-md-12 modal-info-acces">';
                                $txt .=  '<strong><h3>Tiene acceso a</h3></strong>';
                                $txt .=  '<div class="row">';
                                    $txt .=  '<div class="col-md-12">';
                                        $txt .=  '<strong><h5>Perfiles</h5></strong>';
                                        $txt .=  '<p>';
                                            $txt .=  'No tiene acceso a ninguna pagina por el momento';
                                        $txt .=  '</p>';
                                    $txt .=  '</div>';
                                    $txt .=  '<div class="col-md-12">';
                                        $txt .=  '<strong><h5>Paginas</h5></strong>';
                                        $txt .=  '<p>';
                                            $txt .=  'No tiene acceso a ninguna pagina por el momento';
                                        $txt .=  '</p>';
                                    $txt .=  '</div>';
                                $txt .=  '</div>';
                            $txt .=  '</div>';
                        $txt .=  '</div>';
                    $txt .=  '</div>';
                $txt .=  '</div>';
            $txt .=  '</div>';
        $txt .=  '</div>';
        echo $txt;
    }

    function arrstr($dt){
        $txt = "";
        if ($dt) {
            foreach ($dt as $d) {
            $txt .= $d['pgid'] . ",";
            }
        }
        return $txt;
    }


    function ManejoError($e) {
    if (strpos($e->getMessage(), '1451')) {
        echo '<script>err("No se puede eliminar este registro. Por que se encuentra relacionado en otra opción.");</script>';
    } elseif (strpos($e->getMessage(), '1062')) {
        echo '<script>err("Registro duplicado. Intente nuevamente con otro número de identificación ó comuníquese con el administrador del sistema.");</script>';
    } else {
        echo '<script>err("Se generó un error comuníquese con el administrador del sistema.");</script>';
    }
    }
?>