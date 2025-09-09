<?php
    include 'controllers/cpef.php';
?>

<div class="content">


    <form action="home.php?pg=<?=$pg?>" method="post" >
        <div class="row">
            <div class="col-md-6">
                <label for="pefnm" class="form-label">Nombre del perfil</label>
                <input type="text" id="pefnm" name="pefnm" class="form-control" value="<?php if($datOne) echo $datOne[0]['pefnm']; ?>">
            </div>
            <div class="col-md-6">
                <label for="modid" class="form-label">Módulo</label>
                <select name="modid" id="modid" class="form-select">
                    <option value=""></option>
                <?php 
                    if($datMod){  foreach($datMod as $dtm){ ?>
                        <option value="<?=$dtm['modid']?>" <?php if($datOne && $dtm['modid'] == $datOne[0]['modid']) echo 'selected'; ?>>
                            <?=$dtm['modnm']?>
                        </option>
                <?php }} ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="pgid" class="form-label">Pagina inicial</label>
                <select name="pgid" id="pgid" class="form-select">
                    <option value=""></option>
                    <?php 
                    if($datPg){  foreach($datPg as $dpg){ ?>
                        <option value="<?=$dpg['pgid']?>" <?php if($datOne && $dpg['pgid'] == $datOne[0]['pgid']) echo 'selected'; ?>>
                            <?=$dpg['pgnom']?>
                        </option>
                <?php }} ?>
                </select>
            </div>
            <div class="col-12 text-center">
                <br>
                <input type="submit" value="<?php if($datOne) {echo "Actualizar"; }else{ echo "Guardar"; } ?>" class="col-6 btn btn-principal">
                <input type="hidden" value="save" name="ope">
                <input type="hidden" name="pefid" value="<?php if($datOne) echo $datOne[0]['pefid'];?>">
            </div>
        </div>
    </form>

    <div class="row">
        <table class="table w-full table-striped">
            <thead>
                <tr>
                   <th class="text-center">Datos basicos</th>
                   <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if($datAll){
                    foreach($datAll as $dat) {?>
                    <tr >
                        <td style="width: 40%;" >
                            <p>
                                <strong class="nomusu"> <?=$dat['pefid']."). ".$dat['pefnm'];?></strong> <br> 
                                <strong>Pagina: </strong><?=$dat['pgnom'];?> <br>
                                <strong>Modulo: </strong><?=$dat['modnm'];?> <br>
                            </p>                          
                        </td>
                        <td class="text-center" style="width: 35%;">
                            <div class="d-none d-md-flex gap-2 justify-content-center">
                                <a type="button" class="edit" href="home.php?pg=<?=$pg?>&pefid=<?= $dat['pefid']; ?>&ope=edi" title="Editar perfil">
                                    <i class="fa-solid fa-pen "></i>
                                </a>
                                <a href="#" type="button" class="btn_list" data-bs-toggle="modal" data-bs-target="#<?="mdl_PGxPF". $dat['pefid']?>" title="Asignación de paginas">
                                    <i class="fa-solid fa-list"></i>
                                </a>
                                <?php
                                
                                $mpef->setModid($dat['modid']);
                                $pgAll = $mpef->getPagina();
                                $mpef->setPefid($dat['pefid']);
                                $pgSelPf = $mpef->selPXP();
                                $PfSelFrmt = arrstr($pgSelPf);
                                mdl_PGxPF("mdl_PGxPF", $dat['pefid'], $dat['pefnm'], $pgAll, $pg, $PfSelFrmt);
                                
                                
                                ?>
                                <a href="#" type="button" class="eli" data-bs-toggle="modal" data-bs-target="#<?="alert". $dat['pefid']?>" title="Alerta antes de eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <?php 
                                    $mpef->setPefid($dat['pefid']);
                                    $arc = "?pg=".$pg."&pefid=".$dat['pefid'];
                                    alerta("alert", $dat['pefid'], $dat['pefnm'], $arc, "pefid");

                                ?>
                            </div>
                            <div class="dropdown d-md-none">
                                <button class="btn btn-secondary btn-sm dropdown-toggle rounded" type="button" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a type="button" class="dropdown-item edit" href="home.php?pg=<?=$pg?>&pefid=<?= $dat['pefid']; ?>&ope=edi" title="Editar perfil">
                                            <i class="fa-solid fa-pen "></i> Editar
                                        </a>
                                    </li> 
                                    <li>
                                        <a href="#" type="button" class="dropdown-item btn_list" data-bs-toggle="modal" data-bs-target="#<?="mdl_PGxPF". $dat['pefid']?>" title="Asignación de paginas">
                                            <i class="fa-solid fa-list"></i> Paginas
                                        </a>
                                        <?php
                                        
                                            $mpef->setModid($dat['modid']);
                                            $pgAll = $mpef->getPagina();
                                            $mpef->setPefid($dat['pefid']);
                                            $pgSelPf = $mpef->selPXP();
                                            $PfSelFrmt = arrstr($pgSelPf);
                                            mdl_PGxPF("mdl_PGxPF", $dat['pefid'], $dat['pefnm'], $pgAll, $pg, $PfSelFrmt);
                                            
                                        
                                        ?>
                                    </li>
                                    <li>
                                        <a href="#" type="button" class="dropdown-item eli" data-bs-toggle="modal" data-bs-target="#<?="alert". $dat['pefid']?>" title="Alerta antes de eliminar">
                                            <i class="fa-solid fa-trash"></i> Eliminar
                                        </a>
                                        <?php 
                                            $mpef->setPefid($dat['pefid']);
                                            $arc = "?pg=".$pg."&pefid=".$dat['pefid'];
                                            alerta("alert", $dat['pefid'], $dat['pefnm'], $arc, "pefid");

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
                    <th>Datos basicos</th>
                   <th class="text-center">Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div> 

</div>
