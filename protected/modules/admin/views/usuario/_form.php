<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', [
        'id'                   => 'usuario-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>

    <div class="row">
        <div class="col-lg-3 col-md-9">
            <?= $form->labelEx($model, 'username'); ?>
            <?= $form->textField($model, 'username', ['class' => 'form-control', 'size' => 60, 'maxlength' => 255]); ?>
        </div>

        <div class="col-lg-3 col-md-9">
            <?= $form->labelEx($model, 'rol'); ?>
            <?= $form->dropDownList($model, 'rol', ['user' => 'Usuario', 'admin' => 'Administrador'], ['class' => 'form-control', 'style' => 'height:45px;']); ?>
        </div>
        <div class="col-lg-3 col-md-9">
            <?= $form->labelEx($model, 'dni'); ?>
            <?= $form->textField($model, 'dni', ['class' => 'form-control', 'size' => 60, 'maxlength' => 255]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5 col-md-9">
            <?= $form->labelEx($model, 'nombres'); ?>
            <?= $form->textField($model, 'nombres', array('class' => 'form-control')); ?>
        </div>
        <div class="col-lg-4 col-md-9">
            <?= $form->labelEx($model, 'apellidos'); ?>
            <?= $form->textField($model, 'apellidos', array('class' => 'form-control')); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5 col-md-9">
            <?= $form->labelEx($model, 'correo'); ?>
            <?= $form->textField($model, 'correo', ['class' => 'form-control', 'size' => 60, 'maxlength' => 255]); ?>
        </div>
        <div class="col-lg-2 col-md-9">
            <?= $form->labelEx($model, 'fecha_nacimiento'); ?>
            <?= $form->dateField($model, 'fecha_nacimiento', ['class' => 'form-control']); ?>
        </div>
        <div class="col-lg-2 col-md-9">
            <?= $form->labelEx($model, 'celular'); ?>
            <?= $form->numberField($model, 'celular', ['class' => 'form-control', 'size' => 60, 'maxlength' => 255]); ?>
        </div>
    </div>

    <hr>
    <?= CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->