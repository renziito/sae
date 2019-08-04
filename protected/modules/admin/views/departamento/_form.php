<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', [
        'id'                   => 'departamento-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>

    <div class="row">
        <div class="col-lg-5 col-md-9">
            <?= $form->labelEx($model, 'numero'); ?>
            <?= $form->numberField($model, 'numero', ['class' => 'form-control']); ?>
        </div>
        <div class="col-lg-4 col-md-9">
            <?= $form->labelEx($model, 'torre'); ?>
            <?= $form->dropDownList($model, 'torre', ['A' => 'Torre A', 'B' => 'Torre B'], ['class' => 'form-control', 'style' => 'height:45px;']); ?>
        </div>
    </div>

    <hr>
    <?= CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->