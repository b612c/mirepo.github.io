<?php
    require_once ('controllers/cshop.php');
?>

<div class="content">


    <form action="home.php?pg=<?=$pg?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <label for="nit" class="form-label">NIT</label>
                <input type="text" id="nit" name="nit" class="form-control" value="<?php if($datOne) echo $datOne[0]['nit']; ?>"  required>
            </div>
            <div class="col-md-6">
                <label for="razsoc" class="form-label">Razón social</label>
                <input type="text" id="razsoc" name="razsoc"  class="form-control" value="<?php if($datOne) echo $datOne[0]['razsoc']; ?>" >
            </div>
            <div class="col-md-6">
                <label for="tel" class="form-label">Número telefonico</label>
                <input type="tel" id="tel" name="tel" class="form-control" value="<?php if($datOne) echo $datOne[0]['tel']; ?>" >
            </div>
            <div class="col-md-6">
                <label for="direc" class="form-label">Dirección</label>
                <input type="text" id="direc" name="direc" class="form-control" value="<?php if($datOne) echo $datOne[0]['direc']; ?>" >
            </div>
            <div class="col-12 text-center">
                <br>
                <input type="submit" value="<?php if($datOne) {echo "Actualizar"; }else{ echo "Guardar"; } ?>" class="col-6 btn btn-principal">
                <input type="hidden" value="save" name="ope">
                <input type="hidden" name="idshop" value="<?php if($datOne) echo $datOne[0]['idshop'];?>">
            </div>
        </div>
    </form>

    <div class="row">
        <table class="table w-full table-striped">
            <thead>
                <tr>
                    <th class="text-center">Datos basicos</th>
                    <th class="text-center">Ubicación</th>
                   <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if($datAll){
                    foreach($datAll as $dat) {?>
                    <tr >
                        <td style="width: 35%;" >
                            <p>
                                <strong class="nomusu"> <?=$dat['razsoc']?></strong> <br> 
                                <strong>NIT: </strong><?=$dat['nit']?> <br>
                                <strong>Tel: </strong> <?=$dat['tel']?> 
                            </p>                          
                        </td>
                        <td style="width: 35%;" >
                            <p>
                                <strong>Dirección: </strong><?=$dat['direc']?> <br>
                                <strong>Ciudad: </strong> Zipaquirá 
                            </p>                          
                        </td>
                        <td class="text-center" style="width: 30%;">
                            <a type="button" class="edit" href="home.php?pg=<?=$pg?>&idshop=<?= $dat['idshop']; ?>&ope=edi" title="Editar tienda">
                                <i class="fa-solid fa-pen "></i>
                            </a>
                            <a href="#" type="button" class="eli" data-bs-toggle="modal" data-bs-target="#<?="alert". $dat['idshop']?>" title="Alerta antes de eliminar">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <?php 
                                $mshp->setIdshop($dat['idshop']);
                                $arc = "?pg=".$pg."&idshop=".$dat['idshop'];
                                alerta("alert", $dat['idshop'], $dat['razsoc'], $arc, "idshop");
                            ?>
                        </td>
                    </tr>
                <?php } }?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">Datos basicos</th>
                    <th class="text-center">Ubicación</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>


</div>
