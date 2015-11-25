<!doctype html>
<html lang="es-CL">
<head>
    <meta charset="UTF-8">
    <title>Api: Feriados legales de Chile</title>
    <link rel="stylesheet" href="<?php echo URL::to_asset('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo URL::to_asset('css/bootstrap-responsive.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo URL::to_asset('css/styles.css'); ?>">
</head>
<body>
    <div class="row-fluid">
        <div class="span6 offset3">
            <div class="well">
                <form action="<?php echo URL::to('login'); ?>" method="post" class="form-horizontal">
                    <legend>Accesos Backend Feriados</legend>
                    <?php if (Session::has('login_errors')): ?>
                        <div class="alert alert-error">
                            Nombre de usuario o clave incorrecta.
                        </div>
                    <?php endif ?>
                    <div class="control-group">
                        <div class="control-label">
                            <label for="username">Usuario</label>
                        </div>
                        <div class="controls">
                            <input type="text" class="input-large" name="username" id="username" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label for="password">Clave</label>
                        </div>
                        <div class="controls">
                            <input type="password" class="input-large" name="password" id="password" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label class="checkbox" for="remember">
                                <input type="checkbox" id="remember" name="remember" value="1"> Recuerdame
                            </label>
                            <button type="submit" class="btn btn-primary">Acceder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo URL::to_asset('js/jquery-1.8.3.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo URL::to_asset('js/bootstrap.min.js'); ?>"></script>
</body>
</html>