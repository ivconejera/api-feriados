<ul class="breadcrumb">
  <li><a href="<?php echo URL::to('backend'); ?>">Backend</a> <span class="divider">/</span></li>
  <li><a href="<?php echo URL::to('backend/feriados'); ?>">Feriados</a> <span class="divider">/</span></li>
  <li class="active"><?php echo $feriado->id?'Feriado':'Nuevo Feriado'; ?></li>
</ul>
<div class="form-feriado">
    <?php if ($feriado->errors()): ?>
        <div class="alert alert-danger">
            <?php foreach ($feriado->errors()->all('<p>:message</p>') as $field => $error){ ?>
                <?php echo $error; ?>
            <?php } ?>
        </div>
    <?php endif ?>
    <form action="<?php echo URL::current(); ?>" method="post" class="form-horizontal" id="form-feriado">
        <legend>Feriado <?php echo $feriado->nombre; ?></legend>
        <div class="control-group">
            <div class="control-label">
                <label for="nombre">Nombre</label>
            </div>
            <div class="controls">
                <input type="text" class="input-xxlarge" name="nombre" id="nombre" value="<?php echo $feriado->nombre; ?>">
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <label for="comentarios">Comentarios</label>
            </div>
            <div class="controls">
                <textarea name="comentarios" id="comentarios" class="input-xxlarge" rows="5"><?php echo $feriado->comentarios; ?></textarea>
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <label for="fecha">Fecha</label>
            </div>
            <div class="controls">
                <input type="date" class="input-medium" name="fecha" id="fecha" value="<?php echo $feriado->fecha; ?>">
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <label for="tipo_id">Tipo</label>
            </div>
            <div class="controls">
                <select name="tipo_id" id="tipo_id">
                    <option value="">- Seleccione -</option>
                    <?php foreach ($tipos as $key => $tipo){ ?>
                        <?php $selected = $feriado->tipo() == $tipo; ?>
                        <option <?php echo $selected?'selected="selected"':''; ?> value="<?php echo $tipo->id; ?>"><?php echo $tipo->nombre; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <label for="ley_id">Leyes</label>
            </div>
            <div class="controls">
                <ul class="nav nav-pills tag-list">
                    <?php foreach ($feriado->leyes() as $key => $ley){ ?>
                        <li><?php echo $ley->nombre; ?></li>
                    <?php } ?>
                </ul>
                <?php foreach ($leyes as $key => $ley){ ?>
                    <?php $aLeyes[] = '"'.$ley->nombre.'"'; ?>
                <?php } ?>
                <script>
                    var leyes = [<?php echo implode(',', $aLeyes); ?>];
                </script>
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <label for="irrenunciable">Irrenunciable</label>
            </div>
            <div class="controls">
                <input type="checkbox" name="irrenunciable" id="irrenunciable" <?php echo $feriado->irrenunciable?'checked="checked"':''; ?> value="1">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary">Grabar</button>
                <a href="<?php echo URL::to('backend/feriados'); ?>" class="btn">Cancelar</a>
            </div>
        </div>
    </form>
</div>