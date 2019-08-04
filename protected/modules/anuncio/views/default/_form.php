<?php
/* @var $this DefaultController */
/* @var $model Anuncio */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', [
        'id'                   => 'anuncio-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>

    <div class="row">
        <div class="col-xs-9">
            <?= $form->labelEx($model, 'titulo'); ?>
            <?= $form->textField($model, 'titulo', ['class' => 'form-control', 'size' => 60, 'maxlength' => 255]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-9">
            <?= $form->labelEx($model, 'descripcion'); ?><br>
            <?= $form->textArea($model, 'descripcion', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
        </div>
    </div>

    <hr>
    <?= CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->