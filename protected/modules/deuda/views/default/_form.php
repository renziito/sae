<?php
/* @var $this DefaultController */
/* @var $model Deuda */
/* @var $form CActiveForm */

$new  = ($model->isNewRecord ? [] : ['disabled' => 'disabled', 'readonly' => 'readonly']);
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', [
        'id'                   => 'deuda-form',
        'enableAjaxValidation' => false,
        'htmlOptions'          => [
            "enctype" => "multipart/form-data"
        ]
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>

    <div class="row">
        <div class="col-lg-5 col-md-9">
            <?= $form->labelEx($model, 'denominacion'); ?>
            <?= $form->textField($model, 'denominacion', ['class' => 'form-control'] + $new); ?>
        </div>
        <div class="col-lg-4 col-md-9">
            <?= $form->labelEx($model, 'tipo'); ?>
            <?=
            $form->dropDownList($model, 'tipo',
                    ['1' => 'MANTENIMIENTO', '2' => 'AGUA', '3' => 'EXTRAORDINARIO'],
                    ['class' => 'form-control', 'style' => 'height:45px;', 'required' => 'required'] + $new);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-5">
            <?= $form->labelEx($model, 'monto'); ?>
            <?= $form->numberField($model, 'monto', ['class' => 'form-control', 'step' => 'any'] + $new); ?>
        </div>
        <div class="col-xs-4">
            <?= $form->labelEx($model, 'fecha_vencimiento'); ?>
            <?= $form->dateField($model, 'fecha_vencimiento', ['class' => 'form-control'] + $new); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-9">
            <?= $form->labelEx($model, 'prueba', ['label' => 'Evidencia']); ?>
            <?= $form->fileField($model, 'prueba', ['class' => 'form-control']); ?>
        </div>
    </div>

    <hr>
    <?= CHtml::submitButton('Guardar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->