<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs = array(
    'Usuarios' => [$this->createUrl('index')],
    'Crear',
);
?>

<h1>Crear Usuario</h1>

<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>


