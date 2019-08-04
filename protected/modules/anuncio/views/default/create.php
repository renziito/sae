<?php
/* @var $this DefaultController */
/* @var $model Anuncio */

$this->breadcrumbs=array(
	'Anuncios'=>array('index'),
	'Crear',
);

?>

<h1>Crear Anuncio</h1>

<div class="container">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>


