<?php
    require_once "models/seguridad.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
    <div class="wrapper">
        <?php   
            date_default_timezone_set('America/Bogota');
            $nmfl = date('YmdHis');
            $_SESSION['pefid'] = NULL;
            $_SESSION['pefnm'] = "Módulos";
            $pg = isset($_REQUEST['pg']) ? $_REQUEST['pg']:NULL;
            $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
            echo '<div id="contenedor">';
                include 'models/conexion.php';
                include 'controllers/functions.php';
                echo '<aside>';
                    include_once 'views/cabe.php';
                    // include_once 'views/menu.php';
                echo '</aside>';
                echo '<main class="main__content">';
                    include_once 'views/vpmod.php';   
                echo '</main>';
            echo '</div>';
            
        ?>
    </div>
    
    <script src="./js/code.js"></script>
</body>
</html>