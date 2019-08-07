<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */

$this->breadcrumbs = array(
    'Departamentos' => [$this->createUrl('index')],
    'Personas'
);

$id        = Yii::app()->request->getQuery('id');
$inquilino = ($actual) ? $actual->usuario_id : '';
$tipo      = ($actual) ? $actual->tipo : '';
$persona   = ($actual) ? $actual->personas : 0;
$mascotas  = ($actual) ? $actual->mascotas : 0;
$desde     = ($actual) ? $actual->desde : date('Y-m-d');
$hasta     = ($actual) ? $actual->hasta : null;
$disabled  = ($actual) ? true : false;
?>
<h1>Personas en los Departamentos
    <a href="<?= $this->createUrl('index') ?>" class="btn btn-danger pull-right">Volver</a>
</h1>

<form method="POST">
    <input type="hidden" value="<?= $id ?>" name="UsuarioDepartamento[departamento_id]" />
    <?php if ($disabled): ?>
        <h3><b>Inquilino : </b><?= QPersonas::getPersonas($inquilino, false)[0]['nombre_completo'] ?></h3>
    <?php else: ?>
        <?php $personas = CHtml::listData(QPersonas::getPersonas(), 'id', 'nombre_completo') ?>
        <?=
        CHtml::dropDownList('UsuarioDepartamento[usuario_id]', $inquilino, $personas, [
            'class'    => 'select2', 'empty'    => 'Seleccione una persona', 'required' => 'required'
        ])
        ?>
    <?php endif; ?>
    <div class="row m-t-10">
        <div class="col-lg-6">
            <label>DESDE:</label>
            <?=
            CHtml::dateField('UsuarioDepartamento[desde]', $desde, [
                'class'    => 'form-control', 'required' => 'required'
            ])
            ?>
        </div>
        <div class="col-lg-6">
            <label>HASTA:</label>
            <?= CHtml::dateField('UsuarioDepartamento[hasta]', $hasta, ['class' => 'form-control']) ?>
        </div>
    </div>
    <div class="row m-t-10">
        <div class="col-lg-4">
            <label>TIPO :</label>
            <?=
            CHtml::dropDownList('UsuarioDepartamento[tipo]', $tipo, ['1' => 'INQUILINO', 'DUEÑO'], [
                'class'    => 'form-control', 'empty'    => 'Seleccione una tipo', 'required' => 'required'
            ])
            ?>
        </div>
        <div class="col-lg-4">
            <label># PERSONAS:</label>
            <?= CHtml::numberField('UsuarioDepartamento[personas]', $persona, ['class' => 'form-control']) ?>
        </div>
        <div class="col-lg-4">
            <label># MASCOTAS:</label>
            <?= CHtml::numberField('UsuarioDepartamento[mascotas]', $mascotas, ['class' => 'form-control']) ?>
        </div>
    </div>
    <button type="Submit" class="btn btn-success m-t-30">Guardar</button>
</form>

<hr>
<?php if ($pasado): ?>
    <div class="table-responsive ">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <td scope="col">Persona</td>
                    <td scope="col">Desde</td>
                    <td scope="col">Hasta</td>
                    <td scope="col">Accion</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pasado as $person): ?>
                    <tr>
                        <td><?= QPersonas::getPersonas($person->usuario_id, false)[0]['nombre_completo'] ?></td>
                        <td><?= date('d-m-Y', strtotime($person->desde)) ?></td>
                        <td><?= date('d-m-Y', strtotime($person->hasta)) ?></td>
                        <td>a</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

