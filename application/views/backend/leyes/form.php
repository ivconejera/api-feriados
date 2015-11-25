<ul class="breadcrumb">
  <li><a href="<?php echo URL::to('backend'); ?>">Backend</a> <span class="divider">/</span></li>
  <li><a href="<?php echo URL::to('backend/leyes'); ?>">Leyes</a> <span class="divider">/</span></li>
  <li class="active"><?php echo $ley->id?'Ley':'Nueva Ley'; ?></li>
</ul>
<div class="form-ley">
    <?php if ($ley->errors()): ?>
        <div class="alert alert-danger">
            <?php foreach ($ley->errors()->all('<p>:message</p>') as $field => $error){ ?>
                <?php echo $error; ?>
            <?php } ?>
        </div>
    <?php endif ?>
    <form action="<?php echo URL::current(); ?>" method="post" class="form-horizontal">
        <legend>Ley <?php echo $ley->nombre; ?></legend>
        <div class="control-group">
            <div class="control-label">
                <label for="nombre">Nombre</label>
            </div>
            <div class="controls">
                <input type="text" class="input-large" name="nombre" id="nombre" value="<?php echo $ley->nombre; ?>">
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <label for="url">Url</label>
            </div>
            <div class="controls">
                <input type="text" class="input-xlarge" name="url" id="url" value="<?php echo $ley->url; ?>">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary">Grabar</button>
                <a href="<?php echo URL::to('backend/leyes'); ?>" class="btn">Cancelar</a>
            </div>
        </div>
    </form>
</div>