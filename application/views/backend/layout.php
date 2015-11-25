<!doctype html>
<html lang="es-CL">
<head>
    <meta charset="UTF-8">
    <title>Backend Api: Feriados legales de Chile</title>
    <link rel="stylesheet" href="<?php echo URL::to_asset('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo URL::to_asset('css/bootstrap-responsive.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo URL::to_asset('css/styles.css'); ?>">
</head>
<body>
    <header id="inicio">
        <div class="navbar">
            <div class="navbar-inner">
                <a class="brand" href="<?php echo URL::to('backend/feriados'); ?>">Backend Api: Feriados legales de Chile</a>
                <ul class="nav">
                    <li class="<?php echo URI::segment(2)=='feriados'?'active':''; ?>">
                        <a href="<?php echo URL::to('backend/feriados'); ?>">Feriados</a>
                    </li>
                    <li class="<?php echo URI::segment(2)=='leyes'?'active':''; ?>">
                        <a href="<?php echo URL::to('backend/leyes'); ?>">Leyes</a>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li>
                        <a href="<?php echo URL::to('logout'); ?>">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="content row-fluid">
            <?php echo $content; ?>
        </div>
    </div>
    <footer class="well">
        <div class="container">
        <p>Unidad de Modernización y Gobierno Digital</p>
        <p>Ministerio Secretaría General de la Presidencia</p>
        <p>
            <a class="powered_by" href="http://laravel.com" target="_blank">Powered by: <img src="<?php echo URL::to_asset('img/laravel.png'); ?>" width="32" alt="Laravel"></a>
        </p>
    </div>
   </footer>
    <script type="text/javascript" src="<?php echo URL::to_asset('js/jquery-1.8.3.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo URL::to_asset('js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo URL::to_asset('js/bootbox.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo URL::to_asset('js/bootstrap.overrides.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo URL::to_asset('js/bootstrap.tagit.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo URL::to_asset('js/backend.min.js'); ?>"></script>
</body>
</html>