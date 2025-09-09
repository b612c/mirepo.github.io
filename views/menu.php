<?php
    include 'controllers/cmen.php';
?>

<div class="" id="menu">
    <i id="toggle__menu_cerrar" class="toggle__menu ocult__form fa-solid fa-xmark"></i>

    <nav class="">
        <a href="pmod.php" class="btn__menu"><i class="fa-solid fa-house"></i> Inicio</a>
        <?php if($dat){
            $pagina = isset($_GET['pg']) ? $_GET['pg'] : null;
            
            foreach($dat as $dt){ ?>

            <a href="home.php?pg=<?= $dt['pgid']; ?>" class="btn__menu <?php echo ($pagina == $dt['pgid']) ? 'activ' : ''; ?>">
                <i class="<?= $dt['icono']; ?>"></i> <?= $dt['pgnom']; ?>
            </a>
        <?php }} ?>
    </nav>
</div>