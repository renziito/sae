<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */

$this->breadcrumbs = array(
    'Departamentos' => [$this->createUrl('index')],
    'Personas'
);
$id                = Yii::app()->request->getQuery('id');
$inquilino         = ($actual) ? $actual->usuario_id : '';
$tipo              = ($actual) ? $actual->tipo : '';
?>
<h1>Personas en los Departamentos</h1>

<form method="POST">
    <input value="<?= $id ?>" name="UsuarioDepartamento[departamento_id]" />
    <?php $personas          = CHtml::listData(QPersonas::getPersonas(), 'id', 'nombre_completo') ?>
    <?= CHtml::dropDownList('UsuarioDepartamento[usuario_id]', $inquilino, $personas, ['class' => 'select2']) ?>
    <div class="row m-t-10">
        <div class="col-lg-6">
            <label>DESDE:</label>
            <?= CHtml::dateField('UsuarioDepartamento[desde]', '', ['class' => 'form-control']) ?>
        </div>
        <div class="col-lg-6">
            <label>HASTA:</label>
            <?= CHtml::dateField('UsuarioDepartamento[desde]', '', ['class' => 'form-control']) ?>
        </div>
    </div>
    <div class="row m-t-10">
        <div class="col-lg-4">
            <label>TIPO :</label>
            <?= CHtml::dropDownList('UsuarioDepartamento[tipo]', $tipo, ['1' => 'INQUILINO', 'DUEÑO'], ['class' => 'form-control']) ?>
        </div>
        <div class="col-lg-4">
            <label># PERSONAS:</label>
            <?= CHtml::numberField('UsuarioDepartamento[personas]', '', ['class' => 'form-control']) ?>
        </div>
        <div class="col-lg-4">
            <label># MASCOTAS:</label>
            <?= CHtml::numberField('UsuarioDepartamento[mascotas]', '', ['class' => 'form-control']) ?>
        </div>
    </div>
    <button type="Submit" class="btn btn-success m-t-30">Guardar</button>
</form>

<hr>
<?php if ($pasado): ?>
    <?php Utils::show($pasado); ?>
<?php endif; ?>

