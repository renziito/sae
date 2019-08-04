<?php
/* @var $this DefaultController */
/* @var $model Kardex */
/* @var $form CActiveForm */

if (!$model->isNewRecord) {
    $model->fecha_kardex = date('Y-m-d', strtotime($model->fecha_kardex));
}
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', [
        'id'                   => 'kardex-form',
        'enableAjaxValidation' => false,
        'htmlOptions'          => [
            "enctype" => "multipart/form-data"
        ]
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>

    <div class="row">
        <div class="col-xs-9">
            <?= $form->labelEx($model, 'denominacion'); ?>
            <?= $form->textField($model, 'denominacion', ['class' => 'form-control', 'required' => 'required']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5 col-md-9">
            <?= $form->labelEx($model, 'tipo'); ?>
            <?= $form->dropDownList($model, 'tipo', ['1' => 'Ingreso', '2' => 'Salida'], ['class' => 'form-control', 'style' => 'height:45px;', 'required' => 'required']); ?>
        </div>
        <div class="col-lg-4 col-md-9">
            <?= $form->labelEx($model, 'monto'); ?>
            <?= $form->numberField($model, 'monto', ['class' => 'form-control', 'required' => 'required']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5 col-md-9">
            <?= $form->labelEx($model, 'prueba'); ?>
            <?= $form->fileField($model, 'prueba', ['class' => 'form-control']); ?>
        </div>
        <div class="col-lg-4 col-md-9">
            <?= $form->labelEx($model, 'fecha_kardex', ['class' => 'required']); ?><span class="required"> *</span><br>
            <?= $form->dateField($model, 'fecha_kardex', ['class' => 'form-control', 'required' => 'required']); ?>
        </div>
    </div>

    <hr>
    <?= CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->