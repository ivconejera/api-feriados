<ul class="breadcrumb">
  <li><a href="<?php echo URL::to('backend'); ?>">Backend</a> <span class="divider">/</span></li>
  <li class="active">Leyes</li>
</ul>
<div class="lista-leyes">
    <form action="<?php echo URL::to('backend/leyes'); ?>" method="get" class="form-horizontal">
        <?php if (Session::get('message')): ?>
            <div class="alert alert-info">
                <?php echo Session::get('message'); ?>
            </div>
        <?php endif ?>
    </form>
    <div class="row-fluid">
        <a href="<?php echo URL::to('backend/leyes/add'); ?>" class="btn btn-primary">Nueva Ley</a>
        <hr>
    </div>
    <table class="table table-striped" id="tabla-leyes">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Url</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($leyes): ?>
            <?php foreach ($leyes as $key => $ley){ ?>
                <tr>
                    <td><?php echo $ley->nombre; ?></td>
                    <td><a href="<?php echo $ley->url; ?>" target="_blank"><?php echo $ley->url; ?></a></td>
                    <td nowrap>
                        <a href="<?php echo URL::to('backend/leyes/edit/'.$ley->id); ?>" class="btn btn-mini btn-success"><i class="icon-edit"></i> Editar</a>
                        <a href="<?php echo URL::to('backend/leyes/delete/'.$ley->id); ?>" class="btn btn-mini btn-danger btn-eliminar-ley" data-ley="<?php echo $ley->nombre; ?>"><i class="icon-remove"></i> Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No se han encontrado leyes.</td>
            </tr>
        <?php endif ?>
        </tbody>
    </table>
    <hr>
</div>