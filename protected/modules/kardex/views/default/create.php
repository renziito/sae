<?php
/* @var $this DefaultController */
/* @var $model Kardex */

$this->breadcrumbs=array(
	'Kardexes'=>array('index'),
	'Crear',
);

?>

<h1>Crear Kardex</h1>

<div class="container">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>


