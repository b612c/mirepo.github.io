<?php
    require_once 'controllers/cpag.php';
?>

<div class="content">

    <form action="home.php?pg=<?=$pg?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <label for="pgid" class="form-label">ID de la página</label>
                <input type="number" id="pgid" name="pgid" class="form-control" value="<?php if($datOne) echo $datOne[0]['pgid']; ?>">
            </div>
            <div class="col-md-6">
                <label for="pgnom" class="form-label">Nombre de la página</label>
                <input type="text" id="pgnom" name="pgnom" class="form-control" value="<?php if($datOne) echo $datOne[0]['pgnom']; ?>">
            </div>
            <div class="col-md-6">
                <label for="pgarc" class="form-label">Ruta de la página</label>
                <input type="text" id="pgarc" name="pgarc"  class="form-control" value="<?php if($datOne) echo $datOne[0]['pgarc']; ?>">
            </div>
            <div class="col-md-6">
                <label for="pgmos" class="form-label">Mostrar</label>
                <select name="pgmos" id="pgmos" class="form-select">
                    <option value=""></option>
                <?php 
                    if($datVal){  foreach($datVal as $dtv){ if($dtv['domid'] == 2){ ?>
                        <option value="<?=$dtv['valid']?>" <?php if($datOne && $dtv['valid'] == $datOne[0]['pgmos']) echo 'selected'; ?>>
                            <?=$dtv['nomval']?>
                        </option>
                <?php }}}?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="modid" class="form-label">Modulo</label>
                <select name="modid" id="modid" class="form-select">
                    <option value=""></option>
                    <?php 
                    if($datMod){  foreach($datMod as $dtm){ ?>
                        <option value="<?=$dtm['modid']?>" <?php if($datOne && $dtm['modid'] == $datOne[0]['modid']) echo 'selected'; ?>>
                            <?=$dtm['modnm']?>
                        </option>
                <?php }}?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="pgord" class="form-label">Orden</label>
                <input type="number" id="pgord" name="pgord" class="form-control" value="<?php if($datOne) echo $datOne[0]['pgord']; ?>">
            </div>
            <div class="col-md-6">
                <label for="icono" class="form-label">Icono</label>
                <input type="text" id="icono" name="icono" class="form-control" value="<?php if($datOne) echo $datOne[0]['icono']; ?>">
            </div>
            <div class="col-md-6">
                <label for="pgmen" class="form-label">Menú</label>
                <input type="text" id="pgmen" name="pgmen" class="form-control" value="home.php">
            </div>
            <div class="col-12 text-center">
                <br>
                <input type="submit" value="<?= $ope == "edi" ? "Actualizar" : "Guardar" ?>" class="col-6 btn btn-principal">
                <input type="hidden" value="save" name="ope">
                <input type="hidden" name="editpagid" value="<?php if($datOne) echo $datOne[0]['pgid'];?>">
              
            </div>
        </div>
    </form>

    <div class="row">
        <table class="table w-full table-striped">
            <thead>
                <tr>
                    <th class="text-center">Icono</th>
                   <th class="text-center">Datos basicos</th>
                   <th class="text-center d-none d-md-flex">Mostrar</th>
                   <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if($datAll){
                    foreach($datAll as $dat) {?>
                    <tr >
                        <td class="text-center col-md-3">
                            <i class="pg__icon <?=$dat['icono']?>"></i>
                        </td>
                        <td class="col-md-5">
                            <p>
                                <strong class="nomusu"> <?=$dat['pgid']." - ".$dat['pgnom']?></strong> <br> 
                                <strong>Ruta: </strong><?=$dat['pgarc']?> <br>
                                <strong>Modulo: </strong> <?=$dat['modnm']?> 
                            </p>                          
                        </td>
                        <td class="text-center col-md-1">
                            <div class="d-none d-md-flex">
                                <?php if($dat['pgmos'] == 5) {?>
                                <a type="button" href="home.php?pg=<?=$pg?>&pgid=<?=$dat['pgid'];?>&ope=act&pgmos=6" title="Activo" class="activo">
                                    <i class="fa-solid fa-circle-check"></i>
                                </a>
                                <?php } else {?>
                                    <a type="button" href="home.php?pg=<?=$pg?>&pgid=<?=$dat['pgid'];?>&ope=act&pgmos=5" title="Inactivo" class="in__activo">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </a>
                                <?php }?>
                            </div>
                        </td>
                        <td class="text-center col-md-3">
                            <div class="d-none d-md-flex gap-2 justify-content-center">      
                                <a type="button" class="edit" href="home.php?pg=<?=$pg?>&editpagid=<?= $dat['pgid']; ?>&ope=edi" title="Editar pagina">
                                    <i class="fa-solid fa-pen "></i>
                                </a>
                                <a href="#" type="button" class="eli" data-bs-toggle="modal" data-bs-target="#<?="alert". $dat['pgid']?>" title="Alerta antes de eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <?php 
                                    $mpg->setPgid($dat['pgid']);
                                    $arc = "?pg=".$pg."&pgid=".$dat['pgid'];
                                    alerta("alert", $dat['pgid'], $dat['pgnom'], $arc, "pgid");
                                ?>
                            </div>

                            <div class="dropdown d-md-none">
                                <button class="btn btn-principal btn-sm dropdown-toggle rounded" type="button" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a type="button" class="edit dropdown-item" href="home.php?pg=<?=$pg?>&editpagid=<?= $dat['pgid']; ?>&ope=edi" title="Editar pagina">
                                            <i class="fa-solid fa-pen "></i> Editar
                                        </a>
                                    </li>
                                    <li>
                                        <?php if($dat['pgmos'] == 5) {?>
                                        <a type="button" href="home.php?pg=<?=$pg?>&pgid=<?=$dat['pgid'];?>&ope=act&pgmos=6" title="Activo" class="activo dropdown-item">
                                            <i class="fa-solid fa-circle-check"></i> Visible
                                        </a>
                                        <?php } else {?>
                                            <a type="button" href="home.php?pg=<?=$pg?>&pgid=<?=$dat['pgid'];?>&ope=act&pgmos=5" title="Inactivo" class="in__activo dropdown-item">
                                                <i class="fa-solid fa-circle-xmark"></i> Oculto
                                            </a>
                                        <?php }?>
                                    </li>
                                    <li>
                                        <a href="#" type="button" class="eli dropdown-item" data-bs-toggle="modal" data-bs-target="#<?="alert". $dat['pgid']?>" title="Alerta antes de eliminar">
                                            <i class="fa-solid fa-trash"></i> Eliminar
                                        </a>
                                        <?php 
                                            $mpg->setPgid($dat['pgid']);
                                            $arc = "?pg=".$pg."&pgid=".$dat['pgid'];
                                            alerta("alert", $dat['pgid'], $dat['pgnom'], $arc, "pgid");
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
                   <th class="text-center d-none d-md-flex">Mostrar</th>
                   <th class="text-center">Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>


</div>
