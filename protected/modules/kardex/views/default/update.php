<?php
/* @var $this DefaultController */
/* @var $model Kardex */

$this->breadcrumbs = array(
    'Kardex' => [$this->createUrl('index')],
    'Actualizar',
);
?>
<h1>Actualizar Kardex <?php echo $model->id; ?></h1>
<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>