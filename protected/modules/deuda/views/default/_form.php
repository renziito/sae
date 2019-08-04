<?php
/* @var $this DefaultController */
/* @var $model Deuda */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', [
        'id'                   => 'deuda-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>

    <div class="row">
        <div class="col-xs-9">
            <?= $form->labelEx($model, 'denominacion'); ?>
            <?= $form->textField($model, 'denominacion', ['class' => 'form-control', 'size' => 60, 'maxlength' => 255]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-5">
            <?= $form->labelEx($model, 'monto'); ?>
            <?= $form->numberField($model, 'monto', ['class' => 'form-control', 'size' => 10, 'maxlength' => 10]); ?>
        </div>
        <div class="col-xs-4">
            <?= $form->labelEx($model, 'fecha_vencimiento'); ?>
            <?= $form->dateField($model, 'fecha_vencimiento', ['class' => 'form-control']); ?>
        </div>
    </div>

    <hr>
    <?= CHtml::submitButton('Continuar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->