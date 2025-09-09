<?php require_once ('controllers/cpmod.php'); ?>

<div class="secmod ">
	<?php if($datAll){foreach ($datAll as $dt){
		$modact = 2;
		if($datPrPf){foreach ($datPrPf as $dtfp){
			if($dt['modid'] == $dtfp['modid']){
				$modact = 1;
			}
		}}
	if($modact == 1){ ?>
        <form action="pmod.php" method="POST" class="">
            <div class="">
                <button type="submit" class="modulo ">
                    <i class="<?=$dt['modimg']?> icon"></i>
                    <p class= "pg-nom"><?= $dt['modnm'];?></p>       
                </button>
                <input type="hidden" name="modid" value="<?=$dt['modid'];?>">
                <input type="hidden" name="ope" value="dircc">
            </div>
        </form>
    <?php }}} ?>
</div>