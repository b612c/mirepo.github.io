<?php
    include 'controllers/cusu.php';
?>

<div class="content">

    <!-- informacion de usuario para perfil usuario -->
    
    <?php if ($datAll) { 
        foreach($datAll as $dif) {?>
        <div class="row">
            <div class="col-md-3 col-12 img__2">
                <?php if(file_exists($dif['foto'])){ ?>
                    <img src="<?=$dif['foto'];?>" alt="Foto de usuario">
                <?php } else{ ?>
                    <img src="img/no-user.jpg" alt="No hay foto de usuario" >
                <?php } ?>
            </div>
            <div class="col-md-9 col-12 opt_usu">
                <a type="button" class="col-md-4  col-12 edit" href="home.php?pg=<?=$pg?>&idusu=<?= $dif['idusu']; ?>&ope=edit" title="Editar usuario">
                    Editar infromación <i class="fa-solid fa-pen "></i>
                </a>
                <a type="button" class="col-md-4 col-12 btn_list" href="#" data-bs-toggle="modal" data-bs-target="#<?="Pass". $dif['idusu']?>" title="Asignación de perfiles" onclick="val();">
                    Cambiar contraseña <i class="fa-solid fa-lock "></i>
                </a>
                <?php 
                    $mmusu->setIdusu($dif['idusu']);
                    $arc = "?pg=".$pg."&idusu=".$dif['idusu'];
                    Pass("Pass", $dif['idusu'], $arc, "idusu");
                ?>
            </div>
        </div>
        <div class="">
            <form action="home.php?pg=<?=$pg?>" method="post" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-md-6">
                        <label for="ndoc" class="form-label">Número de documento</label>
                        <input type="text" id="ndoc" name="ndoc" class="form-control" value="<?php if($dif) echo $dif['ndoc']; ?>" <?php if($ope != "edit") echo "disabled"?> required>
                    </div>
                    <div class="col-md-6">
                        <label for="tipo_doc" class="form-label">Tipo de documento</label>
                        <select name="tipo_doc" id="tipo_doc" class="form-select" <?php if($ope != "edit") echo "disabled"?>>
                            <option value=""></option>
                        <?php 
                            if($datVal){  foreach($datVal as $dtv){ if($dtv['domid'] == 1){ ?>
                                <option value="<?=$dtv['valid']?>" <?php if($dif && $dtv['valid'] == $dif['tipo_doc']) echo 'selected'; ?>>
                                    <?=$dtv['nomval']?>
                                </option>
                        <?php }}}?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="nomusu" class="form-label">Nombres</label>
                        <input type="text" id="nomusu" name="nomusu"  class="form-control" value="<?php if($dif) echo $dif['nomusu']; ?>" <?php if($ope != "edit") echo "disabled"?>>
                    </div>
                    <div class="col-md-6">
                        <label for="appusu" class="form-label">Apellidos</label>
                        <input type="text" id="appusu" name="appusu"  class="form-control" value="<?php if($dif) echo $dif['appusu']; ?>" <?php if($ope != "edit") echo "disabled"?>>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php if($dif) echo $dif['email']; ?>" <?php if($ope != "edit") echo "disabled"?>>
                    </div>
                    <div class="col-md-6">
                        <label for="tel" class="form-label">Número telefonico</label>
                        <input type="tel" id="tel" name="tel" class="form-control" value="<?php if($dif) echo $dif['tel']; ?>" <?php if($ope != "edit") echo "disabled"?>>
                    </div>
                    <div class="col-md-6">
                        <label for="direc" class="form-label">Dirección</label>
                        <input type="text" id="direc" name="direc" class="form-control" value="<?php if($dif) echo $dif['direc']; ?>" <?php if($ope != "edit") echo "disabled"?>>
                    </div>
                    <div class="col-md-6">
                        <label for="fecnac" class="form-label">Fecha de nacimiento</label>
                        <input type="date" id="fecnac" name="fecnac" class="form-control" value="<?php if($dif) echo $dif['fecnac']; ?>" <?php if($ope != "edit") echo "disabled"?>>
                    </div>
                    <div class="col-md-6">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select name="sexo" id="sexo" class="form-select" <?php if($ope != "edit") echo "disabled"?>>
                            <option value=""></option>
                            <?php 
                            if($datVal){  foreach($datVal as $dtv){ if($dtv['domid'] == 3){ ?>
                                <option value="<?=$dtv['valid']?>" <?php if($dif && $dtv['valid'] == $dif['sexo']) echo 'selected'; ?>>
                                    <?=$dtv['nomval']?>
                                </option>
                        <?php }}}?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="estado" class="form-label">Estado civil</label>
                        <select name="estado" id="estado" class="form-select" <?php if($ope != "edit") echo "disabled"?>>
                            <option value=""></option>
                            <?php 
                            if($datVal){  foreach($datVal as $dtv){ if($dtv['domid'] == 4){ ?>
                                <option value="<?=$dtv['valid']?>" <?php if($dif && $dtv['valid'] == $dif['estado']) echo 'selected'; ?>>
                                    <?=$dtv['nomval']?>
                                </option>
                        <?php }}}?>
                        </select>
                    </div>
                    <div class="col-md-6 <?php if($ope != "edit") echo "ocult__form"?>">
                        <label for="foto" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="foto" name="foto" accept="image/jpeg, image/jpg, image/avif, image/png, image/gif" >
                    </div>
                    <div class="col-12 text-center <?php if($ope != "edit") echo "ocult__form"?>">
                        <br>
                        <input type="submit" value="Actualizar" class="col-6 btn btn-principal">
                        <input type="hidden" value="save" name="ope">
                        <input type="hidden" name="idusu" value="<?php if($dif) echo $dif['idusu'];?>">
                    </div>
                </div>
            </form>
        </div>
    <?php } }?>

</div>








<!-- tabla antes de modificar -->

<!-- 
    <div class="row">
        <table class="table w-full table-striped">
            <thead>
                <tr>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Datos basicos</th>
                    <th class="text-center">
                        <?php if($pg == 2001){?>
                            Activo
                        <?php }?>
                    </th>
                   <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if($datAll){
                    foreach($datAll as $dat) {?>
                    <tr >
                        <td style="width: 15%;" class="text-center">
                            <?php if(file_exists($dat['foto'])){ ?>
                                <img src="<?=$dat['foto'];?>" alt="Foto de usuario" class="img">
                            <?php } else{ ?>
                                <img src="img/no-user.jpg" alt="No hay foto de usuario" class="img">
                            <?php } ?>
                        </td>
                        <td style="width: 40%;" >
                            <p>
                                <strong class="nomusu"> <?=$dat['nomusu']." ".$dat['appusu']?></strong> <br> 
                                <strong>Documento: </strong><?=$tdoc[$dat['tipo_doc']]." ".$dat['ndoc'];?> <br>
                                <strong>Email: </strong> <?=$dat['email']?> 
                            </p>                          
                        </td>
                        <td class="text-center" style="width: 10%;">
                            <?php if($pg == 2001){ if($dat['actper'] == 5) {?>
                             <a type="button" href="home.php?pg=<?=$pg?>&idusu=<?=$dat['idusu'];?>&ope=act&actper=6" title="Activo" class="activo">
                                 <i class="fa-solid fa-circle-check"></i>
                             </a>
                            <?php } else {?>
                                <a type="button" href="home.php?pg=<?=$pg?>&idusu=<?=$dat['idusu'];?>&ope=act&actper=5" title="Inactivo" class="in__activo">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </a>
                            <?php }}?>
                        </td>
                        <td class="text-center" style="width: 35%;">
                            
                            <a href="#" type="button" class="info" data-bs-toggle="modal" data-bs-target="#<?="info". $dat['idusu']?>" title="Información de usuario">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            <?php
                                $mmusu->setIdusu($dat['idusu']);
                                $infoUs = $mmusu->getOne();
                                $usuario = $infoUs[0];
                                
                                $usuario['tipo_doc'] = $tdoc[$usuario['tipo_doc']];
                                $usuario['sexo'] = $sexo[$usuario['sexo']];
                                $usuario['actper'] = $act[$usuario['actper']];
                                $usuario['estado'] = $estado[$usuario['estado']];
                                
                                modal_info($usuario)
                                ?> 
                            <a type="button" class="edit" href="home.php?pg=<?=$pg?>&idusu=<?= $dat['idusu']; ?>&ope=edi" title="Editar usuario">
                                <i class="fa-solid fa-pen "></i>
                            </a>
                            <?php if($pg == 2001) {?>
                                <a href="#" type="button" class="btn_list" data-bs-toggle="modal" data-bs-target="#<?="mdl_PFxUS". $dat['idusu']?>" title="Asignación de perfiles">
                                    <i class="fa-solid fa-list"></i>
                                </a>
                                <?php 
                                    $mmusu->setIdusu($dat['idusu']);
                                    $pgxus = $mmusu->getOnePfxUs();
                                    $PgSelFrmt = arrstr($pgxus);
                                    mdl_PFxUS("mdl_PFxUS", $dat['idusu'], $dat['nomusu']." ".$dat['appusu'], $mod, $pg, $PgSelFrmt);
                                ?>
                            <?php }?>
                            
                            <?php if($pg == 2001){ ?>
                                <a href="#" type="button" class="eli" data-bs-toggle="modal" data-bs-target="#<?="alert". $dat['idusu']?>" title="Alerta antes de eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <?php 
                                    $mmusu->setIdusu($dat['idusu']);
                                    $arc = "?pg=".$pg."&idusu=".$dat['idusu'];
                                    alerta("alert", $dat['idusu'], $dat['nomusu']." ".$dat['appusu'], $arc, "idusu");
                                ?>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } }?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Foto</th>
                    <th>Datos basicos</th>
                    <th class="text-center">
                        <?php if($pg == 2001){?>
                            Activo
                        <?php }?>
                    </th>
                   <th class="text-center">Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div> -->
