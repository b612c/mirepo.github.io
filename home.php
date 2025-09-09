<?php
    require_once "models/seguridad.php"

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/js/dataTables.bootstrap5.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/js/dataTables.bootstrap5.js">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.bootstrap5.js"></script>

    <script src="./js/code.js"></script>

    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="wrapper">

        <?php
            date_default_timezone_set('America/Bogota');
            $nmfl = date('YmdHis');
            
            echo '<div id="contenedor">';
                    include 'controllers/functions.php';
                    include 'models/conexion.php';
                    include 'controllers/optimg.php';
                echo '<aside>';
                    include_once 'views/cabe.php';
                    include_once 'views/menu.php';
                    echo '<label for="toggle__dark" id="dark-mode" onclick="darkMode();"><i class="fa-solid fa-circle-half-stroke"></i></label>';
                    echo '<input type="checkbox" name="toggle__dark" id="toggle__dark">';

                    echo '<i id="toggle__menu" class="mos__form toggle__menu fa-solid fa-ellipsis-vertical"></i>';

                    $pg = isset($_REQUEST['pg']) ? $_REQUEST['pg']:NULL;
                    $rut = valpg($pg);
                    if ($rut) {
                        $pagnom = $rut[0]['pgnom'];
                    } else {
                        $pagnom = '';
                    };
                echo '</aside>';
                echo '<main class="main__content">';
                    if ($rut) {
                        // $mos = $rut[0]['pgmos'];
                        // if ($ope == "edit") $est = 1;
                        titulo($rut[0]['icono'], $rut[0]['pgnom']);
                        echo '<div id="err"></div>';
                        // echo "<script>err();</script>";
                        require_once($rut[0]['pgarc']);
                    } else {
                        echo "<h1>Usted no tiene permisos, para ingresar a esta página. Comuníquese con su administrador</h1>";
                    }

                echo '</main>';
            echo '</div>';
            include_once 'views/pie.php';
        ?>
    </div>
</body>
</html>