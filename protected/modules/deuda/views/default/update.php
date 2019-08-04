<?php
/* @var $this DefaultController */
/* @var $model Deuda */

$this->breadcrumbs = array(
    'Deudas' => [$this->createUrl('index')],
    'Actualizar',
);
?>
<h1>Pagos Deuda <?php echo $model->id; ?></h1>
<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>