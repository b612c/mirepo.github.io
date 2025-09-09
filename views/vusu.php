<?php
    include 'controllers/cusu.php';
?>

<div class="content">


    <form action="home.php?pg=<?=$pg?>" method="post" enctype="multipart/form-data" class="<?php if($pg == 20011 && $ope != "edi") echo "ocult__form";?>">
        <div class="row">
            <div class="col-md-6">
                <label for="ndoc" class="form-label">Número de documento</label>
                <input type="text" id="ndoc" name="ndoc" class="form-control" value="<?php if($datOne) echo $datOne[0]['ndoc']; ?>"  required>
            </div>
            <div class="col-md-6">
                <label for="tipo_doc" class="form-label">Tipo de documento</label>
                <select name="tipo_doc" id="tipo_doc" class="form-select" >
                    <option value=""></option>
                <?php 
                    if($datVal){  foreach($datVal as $dtv){ if($dtv['domid'] == 1){ ?>
                        <option value="<?=$dtv['valid']?>" <?php if($datOne && $dtv['valid'] == $datOne[0]['tipo_doc']) echo 'selected'; ?>>
                            <?=$dtv['nomval']?>
                        </option>
                <?php }}}?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="nomusu" class="form-label">Nombres</label>
                <input type="text" id="nomusu" name="nomusu"  class="form-control" value="<?php if($datOne) echo $datOne[0]['nomusu']; ?>" >
            </div>
            <div class="col-md-6">
                <label for="appusu" class="form-label">Apellidos</label>
                <input type="text" id="appusu" name="appusu"  class="form-control" value="<?php if($datOne) echo $datOne[0]['appusu']; ?>" >
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php if($datOne) echo $datOne[0]['email']; ?>" >
            </div>
            <div class="col-md-6">
                <label for="tel" class="form-label">Número telefonico</label>
                <input type="tel" id="tel" name="tel" class="form-control" value="<?php if($datOne) echo $datOne[0]['tel']; ?>" >
            </div>
            <div class="col-md-6">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" id="pass" name="pass" class="form-control" <?php if ($pg != 20011 && $ope == "edi") echo "disabled" ?> placeholder="<?php if($datOne && $pg != 20011) echo "solo el usuario puede modificar su contraseña" ?>">
            </div>
            <div class="col-md-6">
                <label for="direc" class="form-label">Dirección</label>
                <input type="text" id="direc" name="direc" class="form-control" value="<?php if($datOne) echo $datOne[0]['direc']; ?>" >
            </div>
            <div class="col-md-6">
                <label for="fecnac" class="form-label">Fecha de nacimiento</label>
                <input type="date" id="fecnac" name="fecnac" class="form-control" value="<?php if($datOne) echo $datOne[0]['fecnac']; ?>" >
            </div>
            <div class="col-md-6">
                <label for="actper" class="form-label">Activo</label>
                <select name="actper" id="actper" class="form-select" >
                    <option value=""></option>
                    <?php 
                    if($datVal){  foreach($datVal as $dtv){ if($dtv['domid'] == 2){ ?>
                        <option value="<?=$dtv['valid']?>" <?php if($datOne && $dtv['valid'] == $datOne[0]['actper']) echo 'selected'; ?>>
                            <?=$dtv['nomval']?>
                        </option>
                <?php }}}?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-select" >
                    <option value=""></option>
                    <?php 
                    if($datVal){  foreach($datVal as $dtv){ if($dtv['domid'] == 3){ ?>
                        <option value="<?=$dtv['valid']?>" <?php if($datOne && $dtv['valid'] == $datOne[0]['sexo']) echo 'selected'; ?>>
                            <?=$dtv['nomval']?>
                        </option>
                <?php }}}?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="estado" class="form-label">Estado civil</label>
                   <select name="estado" id="estado" class="form-select" >
                    <option value=""></option>
                    <?php 
                    if($datVal){  foreach($datVal as $dtv){ if($dtv['domid'] == 4){ ?>
                        <option value="<?=$dtv['valid']?>" <?php if($datOne && $dtv['valid'] == $datOne[0]['estado']) echo 'selected'; ?>>
                            <?=$dtv['nomval']?>
                        </option>
                <?php }}}?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="foto" class="form-label">Foto</label>
                <input class="form-control" type="file" id="foto" name="foto" accept="image/jpeg, image/jpg, image/avif, image/png, image/gif" >
            </div>
            <div class="col-12 text-center">
                <br>
                <input type="submit" value="<?php if($datOne) {echo "Actualizar"; }else{ echo "Guardar"; } ?>" class="col-6 btn btn-principal">
                <input type="hidden" value="save" name="ope">
                <input type="hidden" name="idusu" value="<?php if($datOne) echo $datOne[0]['idusu'];?>">
            </div>
        </div>
    </form>

    <div class="row" >
        <table class="table w-full table-striped">
            <thead>
                <tr>
                    <th class="text-center d-none d-md-flex">Foto</th>
                    <th class="text-center col-md-5 col-8">Datos basicos</th>
                    <th class="text-center d-none d-md-flex"> Activo </th>
                    <th class="text-center col-4">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if($datAll){
                    foreach($datAll as $dat) {?>
                    <tr class="">   
                        <td class="text-center">
                            <div class="">
                                <?php if(file_exists($dat['foto'])){ ?>
                                    <img src="<?=$dat['foto'];?>" alt="Foto de usuario" class="img">
                                <?php } else{ ?>
                                    <img src="img/no-user.jpg" alt="No hay foto de usuario" class="img">
                                <?php } ?>
                            </div>
                        </td>
                        <td class="col-md-5 col-8">
                            <p class="tb__info-usu">
                                <strong class="nomusu"> <?=$dat['nomusu']." ".$dat['appusu']?></strong> <br> 
                                <strong>Documento: </strong><?=$tdoc[$dat['tipo_doc']]." ".$dat['ndoc'];?> <br>
                                <strong>Email: </strong> <?=$dat['email']?> 
                            </p>                          
                        </td>
                        <td class="text-center " >
                            <div class="d-none d-md-flex">
                                <?php if($dat['actper'] == 5) {?>
                                <a type="button" href="home.php?pg=<?=$pg?>&idusu=<?=$dat['idusu'];?>&ope=act&actper=6" title="Activo" class="activo">
                                    <i class="fa-solid fa-circle-check"></i>
                                </a>
                                <?php } else {?>
                                    <a type="button" href="home.php?pg=<?=$pg?>&idusu=<?=$dat['idusu'];?>&ope=act&actper=5" title="Inactivo" class="in__activo">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </a>
                                <?php }?>
                            </div>
                        </td>
                        <td class="text-center col-4" >
                            <div class="d-none d-md-flex gap-2 justify-content-center">
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
                                <a href="#" type="button" class="btn_list" data-bs-toggle="modal" data-bs-target="#<?="mdl_PFxUS". $dat['idusu']?>" title="Asignación de perfiles">
                                    <i class="fa-solid fa-list"></i>
                                </a>
                                <?php 
                                    $mmusu->setIdusu($dat['idusu']);
                                    $pgxus = $mmusu->getOnePfxUs();
                                    $PgSelFrmt = arrstr($pgxus);
                                    mdl_PFxUS("mdl_PFxUS", $dat['idusu'], $dat['nomusu']." ".$dat['appusu'], $mod, $pg, $PgSelFrmt);
                                ?>   
                                <a href="#" type="button" class="eli" data-bs-toggle="modal" data-bs-target="#<?="alert". $dat['idusu']?>" title="Alerta antes de eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <?php 
                                    $mmusu->setIdusu($dat['idusu']);
                                    $arc = "?pg=".$pg."&idusu=".$dat['idusu'];
                                    alerta("alert", $dat['idusu'], $dat['nomusu']." ".$dat['appusu'], $arc, "idusu");
                                ?>
                            </div>
                            <div class="dropdown d-md-none">
                                <button class="btn btn-principal btn-sm dropdown-toggle rounded" type="button" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" type="button" class="info dropdown-item" data-bs-toggle="modal" data-bs-target="#<?="info". $dat['idusu']?>" title="Información de usuario">
                                            <i class="fa-solid fa-circle-info"></i> Información
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
                                    </li>
                                    <li>
                                        <?php if($dat['actper'] == 5) {?>
                                        <a type="button" href="home.php?pg=<?=$pg?>&idusu=<?=$dat['idusu'];?>&ope=act&actper=6" title="Activo" class="activo dropdown-item">
                                            <i class="fa-solid fa-circle-check"></i> Activo
                                        </a>
                                        <?php } else {?>
                                            <a type="button" href="home.php?pg=<?=$pg?>&idusu=<?=$dat['idusu'];?>&ope=act&actper=5" title="Inactivo" class="in__activo dropdown-item">
                                                <i class="fa-solid fa-circle-xmark"></i> Inactivo
                                            </a>
                                        <?php }?>
                                    </li>
                                    <li>
                                        <a type="button" class="edit dropdown-item" href="home.php?pg=<?=$pg?>&idusu=<?= $dat['idusu']; ?>&ope=edi" title="Editar usuario">
                                            <i class="fa-solid fa-pen "></i> Editar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" type="button" class="btn_list dropdown-item" data-bs-toggle="modal" data-bs-target="#<?="mdl_PFxUS". $dat['idusu']?>" title="Asignación de perfiles">
                                            <i class="fa-solid fa-list"></i> Perfiles
                                        </a>
                                        <?php 
                                            $mmusu->setIdusu($dat['idusu']);
                                            $pgxus = $mmusu->getOnePfxUs();
                                            $PgSelFrmt = arrstr($pgxus);
                                            mdl_PFxUS("mdl_PFxUS", $dat['idusu'], $dat['nomusu']." ".$dat['appusu'], $mod, $pg, $PgSelFrmt);
                                        ?> 
                                    </li>
                                    <li>
                                        <a href="#" type="button" class="eli dropdown-item" data-bs-toggle="modal" data-bs-target="#<?="alert". $dat['idusu']?>" title="Alerta antes de eliminar">
                                            <i class="fa-solid fa-trash"></i> Eliminar
                                        </a>
                                        <?php 
                                            $mmusu->setIdusu($dat['idusu']);
                                            $arc = "?pg=".$pg."&idusu=".$dat['idusu'];
                                            alerta("alert", $dat['idusu'], $dat['nomusu']." ".$dat['appusu'], $arc, "idusu");
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } }?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center d-none d-md-flex">Foto</th>
                    <th class="text-center col-md-5 col-8">Datos basicos</th>
                    <th class="text-center col-md-1 d-none d-md-flex "> Activo </th>
                    <th class="text-center col-4">Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>

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
