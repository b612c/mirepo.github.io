<?php
    include 'controllers/cval.php';
?>

<div class="content">


    <form action="home.php?pg=<?=$pg?>" method="post" >
        <div class="row">
            <div class="col-md-6">
                <label for="nomval" class="form-label">Nombre del valor</label>
                <input type="text" id="nomval" name="nomval" class="form-control" value="<?php if($datOne) echo $datOne[0]['nomval']; ?>">
            </div>
            <div class="col-md-6">
                <label for="domid" class="form-label">Dominio</label>
                <select name="domid" id="domid" class="form-select">
                    <option value=""></option>
                <?php 
                    if($datDom){  foreach($datDom as $dtm){ ?>
                        <option value="<?=$dtm['domid']?>" <?php if($datOne && $dtm['domid'] == $datOne[0]['domid']) echo 'selected'; ?>>
                            <?=$dtm['domid']?> - <?=$dtm['nomdom']?>
                        </option>
                <?php }} ?>
                </select>
            </div>

            <div class="col-12 text-center">
                <br>
                <input type="submit" value="<?php if($datOne) {echo "Actualizar"; }else{ echo "Guardar"; } ?>" class="col-6 btn btn-principal">
                <input type="hidden" value="save" name="ope">
                <input type="hidden" name="valid" value="<?php if($datOne) echo $datOne[0]['valid'];?>">
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
                                <strong class="nomusu"> <?=$dat['valid']."). ".$dat['nomval'];?></strong> <br> 
                                <strong>Dominio: </strong><?=$dat['nomdom'];?>
                            </p>                          
                        </td>
                        <td class="text-center" style="width: 35%;">
                            <a type="button" class="edit" href="home.php?pg=<?=$pg?>&valid=<?= $dat['valid']; ?>&ope=edi" title="Editar valor">
                                <i class="fa-solid fa-pen "></i>
                            </a>
                          
                            <a href="#" type="button" class="eli" data-bs-toggle="modal" data-bs-target="#<?="alert". $dat['valid']?>" title="Alerta antes de eliminar">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <?php 
                                $mval->setValid($dat['valid']);
                                $arc = "?pg=".$pg."&valid=".$dat['valid'];
                                alerta("alert", $dat['valid'], $dat['nomval'], $arc, "valid");

                            ?>
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
