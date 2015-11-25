<ul class="breadcrumb">
  <li><a href="<?php echo URL::to('backend'); ?>">Backend</a> <span class="divider">/</span></li>
  <li class="active">Feriados</li>
</ul>
<div class="lista-feriados">
    <form action="<?php echo URL::to('backend/feriados'); ?>" method="get" class="form-horizontal">
        <?php if (Session::get('message')): ?>
            <div class="alert alert-info">
                <?php echo Session::get('message'); ?>
            </div>
        <?php endif ?>
        <div class="control-group">
            <div class="control-label">
                <label for="ano">Año</label>
            </div>
            <div class="controls">
                <select class="input-large" name="ano" id="ano">
                    <option value="">- Seleccione -</option>
                    <?php foreach ($anos as $key => $a){ ?>
                        <?php $selected = $a->ano == $ano; ?>
                        <option <?php echo $selected?'selected="selected"':''; ?> value="<?php echo $a->ano; ?>"><?php echo $a->ano; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <label for="tipo_id">Tipo</label>
            </div>
            <div class="controls">
                <select class="input-large" name="tipo_id" id="tipo_id">
                    <option value="">- Seleccione -</option>
                    <?php foreach ($tipos as $key => $tipo){ ?>
                        <?php $selected = $tipo->id == $tipo_id; ?>
                        <option <?php echo $selected?'selected="selected"':''; ?> value="<?php echo $tipo->id; ?>"><?php echo $tipo->nombre; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>
    <div class="row-fluid">
        <a href="<?php echo URL::to('backend/feriados/add'); ?>" class="btn btn-primary">Nuevo Feriado</a>
        <hr>
    </div>
    <table class="table table-striped" id="tabla-feriados">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Leyes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($feriados): ?>
            <?php foreach ($feriados as $key => $feriado){ ?>
                <tr>
                    <td><?php echo $feriado->fecha; ?></td>
                    <td><?php echo $feriado->nombre; ?><?php echo $feriado->irrenunciable?' <span class="label label-important">Irrenunciable</span>':''; ?></td>
                    <td><?php echo $feriado->tipo()->nombre; ?></td>
                    <td>
                        <?php if ($feriado->leyes()): ?>
                            <?php foreach ($feriado->leyes() as $key => $ley){ ?>
                                <a href="<?php echo $ley->url; ?>" target="_blank" class="label label-info"><?php echo $ley->nombre; ?></a>
                            <?php } ?>
                        <?php else: ?>
                            Sin leyes asociada.
                        <?php endif ?>
                    </td>
                    <td nowrap>
                        <a href="<?php echo URL::to('backend/feriados/edit/'.$feriado->id); ?>" class="btn btn-mini btn-success"><i class="icon-edit"></i> Editar</a>
                        <a href="<?php echo URL::to('backend/feriados/delete/'.$feriado->id); ?>" class="btn btn-mini btn-danger btn-eliminar-feriado" data-feriado="<?php echo $feriado->nombre; ?>"><i class="icon-remove"></i> Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No se han encontrado feriados.</td>
            </tr>
        <?php endif ?>
        </tbody>
    </table>
    <?php echo $paginacion->appends(array('ano' => $ano, 'tipo_id' => $tipo_id))->links(); ?>
    <hr>
</div>