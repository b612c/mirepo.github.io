<?php
    require_once ("controllers/cdom.php");

?>

<div class="content">

    <form action="home.php?pg=<?=$pg?>" method="post" >
        <div class="row">
            <div class="col-md-6">
                <label for="nomdom" class="form-label">Nombre del dominio</label>
                <input type="text" id="nomdom" name="nomdom" class="form-control" value="<?php if($datOne) echo $datOne[0]['nomdom']; ?>">
            </div>
            <div class="col-12 text-center">
                <br>
                <input type="submit" value="<?php if($datOne) {echo "Actualizar"; }else{ echo "Guardar"; } ?>" class="col-6 btn btn-principal">
                <input type="hidden" name="ope" value="save">
                <input type="hidden" name="domid" value="<?php if($datOne) echo $datOne[0]['domid'];?>">
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
                                <strong class="nomusu"> <?=$dat['domid']."). ".$dat['nomdom'];?></strong>
                            </p>                          
                        </td>
                        <td class="text-center" style="width: 35%;">
                            <a type="button" class="edit" href="home.php?pg=<?=$pg?>&domid=<?= $dat['domid']?>&ope=edi" title="Editar dominio">
                                <i class="fa-solid fa-pen "></i>
                            </a>
                            <a href="#" type="button" class="eli" data-bs-toggle="modal" data-bs-target="#<?="alert". $dat['domid']?>" title="Alerta antes de eliminar">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <?php 
                                $mdom->setDomid($dat['domid']);
                                $arc = "?pg=".$pg."&domid=".$dat['domid']."&ope=eli";
                                alerta("alert", $dat['domid'], $dat['nomdom'], $arc, "domid");
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
