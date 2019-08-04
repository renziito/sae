<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */

$this->breadcrumbs = array(
    'Departamentos' => [$this->createUrl('index')],
    'Crear',
);
?>

<h1>Crear Departamento</h1>

<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>


