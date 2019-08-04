<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */

$this->breadcrumbs = array(
    'Departamentos' => [$this->createUrl('index')],
    'Actualizar'
);
?>
<h1>Actualizar Departamento <?php echo $model->id; ?></h1>
<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>