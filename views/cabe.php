
<header class="">
    <div class="main_info__usu ">
        <div class="foto__usu">
            <img src="<?=$_SESSION['foto']?>" alt="Foto de perfil">
        </div>
        <div class="info__usu ">
            <span><?=$_SESSION['nomusu']." ".$_SESSION['appusu'];?></span>
             <!-- <span>Brayan</span> -->
            <small>~ <?=$_SESSION['pefnm']?> ~</small>
        </div>
        <div class="">
            <a href="views/vsal.php" class="icon_exit"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>
</header>