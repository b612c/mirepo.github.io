<?php
    require_once 'controllers/cmod.php';
    ?>

<div class="content">
    
    <form action="home.php?pg=<?=$pg?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <label for="modnm" class="form-label">Nombre del modulo</label>
                <input type="text" id="modnm" name="modnm" class="form-control" value="<?php if($datOne) echo $datOne[0]['modnm']; ?>">
            </div>
            <div class="col-md-6">
                <label for="modimg" class="form-label">Icono</label>
                <input type="text" id="modimg" name="modimg" class="form-control" value="<?php if($datOne) echo $datOne[0]['modimg']; ?>">
            </div>
            <div class="col-md-6">
                <label for="modact" class="form-label">Activo</label>
                <select name="modact" id="modact" class="form form-select" value="<?php if ($datOne && $datOne['modact'] == 1) echo 'Si'; elseif ($datOne && $datOn['modact'] == 2) echo 'No'; ?>" required>
                    <option value=""></option>
						<option value="1" <?php if($datOne && $datOne[0]['modact']==1)
							echo ' selected '; ?>>Si</option>
						<option value="2" <?php if(!$datOne || ($datOne && $datOne[0]['modact']!=1))
							echo ' selected '; ?>>No</option>
				</select> 
            </div>
            <div class="col-md-6">
                <label for="pgid" class="form-label">Pagina inicial</label>
                <select name="pgid" id="pgid" class="form-select">
                    <option value=""></option>
                    <?php 
                    if($datAllPg){  foreach($datAllPg as $dtpg){ ?>
                        <option value="<?=$dtpg['pgid']?>" <?php if($datOne && $dtpg['pgid'] == $datOne[0]['pgid']) echo 'selected'; ?>>
                            <?=$dtpg['pgnom']?>
                        </option>
                <?php }}?>
                </select>
            </div>
            <div class="col-12 text-center">
                <br>
                <input type="submit" value="<?= $ope == "edi" ? "Actualizar" : "Guardar" ?>" class="col-6 btn btn-principal">
                <input type="hidden" value="save" name="ope">
                <input type="hidden" name="modid" value="<?php if($datOne) echo $datOne[0]['modid'];?>">
              
            </div>
        </div>
    </form>

    <div class="row">
        <table class="table w-full table-striped">
            <thead>
                <tr>
                    <th class="text-center">Icono</th>
                   <th class="text-center">Datos basicos</th>
                   <th class="text-center d-none d-md-flex">Activo</th>
                   <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if($datAll){
                    foreach($datAll as $dat) {?>
                    <tr >
                        <td class="text-center col-md-3">
                            <i class="pg__icon <?=$dat['modimg']?>"></i>
                        </td>
                        <td class="col-md-5">
                            <p>
                                <strong class="nomusu"> <?=$dat['modid']." - ".$dat['modnm']?></strong> <br> 
                                <strong>Pagina inicial: </strong><?=$dat['pgnom']?>
                            </p>                          
                        </td>
                        <td class="text-center col-md-1">
                            <div class="d-none d-md-flex">
                                <?php if($dat['modact'] == 1) {?>
                                 <a type="button" href="home.php?pg=<?=$pg?>&modid=<?=$dat['modid'];?>&ope=act&modact=2" title="Activo" class="activo">
                                     <i class="fa-solid fa-circle-check"></i>
                                 </a>
                                <?php } else {?>
                                    <a type="button" href="home.php?pg=<?=$pg?>&modid=<?=$dat['modid'];?>&ope=act&modact=1" title="Inactivo" class="in__activo">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </a>
                                <?php }?>
                            </div>
                        </td>
                        <td class="text-center col-md-3">
                            <div class="d-none d-md-flex gap-2 justify-content-center">
                                <a type="button" class="edit" href="home.php?pg=<?=$pg?>&modid=<?= $dat['modid']; ?>&ope=edi" title="Editar modulo">
                                    <i class="fa-solid fa-pen "></i>
                                </a>
                                <a href="#" type="button" class="eli" data-bs-toggle="modal" data-bs-target="#<?="alert". $dat['modid']?>" title="Alerta antes de eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <?php 
                                    $mmod->setModid($dat['modid']);
                                    $arc = "?pg=".$pg."&modid=".$dat['modid'];
                                    alerta("alert", $dat['modid'], $dat['modnm'], $arc, "modid");
                                ?>
                            </div>

                            <div class="dropdown d-md-none">
                                <button class="btn btn-secondary btn-sm dropdown-toggle rounded" type="button" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a type="button" class="edit dropdown-item" href="home.php?pg=<?=$pg?>&modid=<?= $dat['modid']; ?>&ope=edi" title="Editar modulo">
                                            <i class="fa-solid fa-pen "></i> Editar
                                        </a>
                                    </li>
                                    <li>
                                        <?php if($dat['modact'] == 1) {?>
                                            <a type="button" href="home.php?pg=<?=$pg?>&modid=<?=$dat['modid'];?>&ope=act&modact=2" title="Activo" class="activo dropdown-item">
                                                <i class="fa-solid fa-circle-check"></i> Activo
                                            </a>
                                        <?php } else {?>
                                            <a type="button" href="home.php?pg=<?=$pg?>&modid=<?=$dat['modid'];?>&ope=act&modact=1" title="Inactivo" class="in__activo dropdown-item">
                                                <i class="fa-solid fa-circle-xmark"></i> Inactivo
                                            </a>
                                        <?php }?>
                                    </li>
                                    <li>
                                         <a href="#" type="button" class="eli dropdown-item" data-bs-toggle="modal" data-bs-target="#<?="alert". $dat['modid']?>" title="Alerta antes de eliminar">
                                            <i class="fa-solid fa-trash"></i> Eliminar
                                        </a>
                                        <?php 
                                            $mmod->setModid($dat['modid']);
                                            $arc = "?pg=".$pg."&modid=".$dat['modid'];
                                            alerta("alert", $dat['modid'], $dat['modnm'], $arc, "modid");
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
                    <th class="text-center">Icono</th>
                    <th class="text-center">Datos basicos</th>
                   <th class="text-center d-none d-md-flex">Activo</th>
                   <th class="text-center">Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>


</div>
