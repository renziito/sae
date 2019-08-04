<?php
/* @var $this DefaultController */
/* @var $model Anuncio */

$this->breadcrumbs=array(
	'Anuncios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);
?>
<h1>Actualizar Anuncio <?php echo $model->id; ?></h1>
<div class="container">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>