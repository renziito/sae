<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle   = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<div class="form">
    <?php
    $form              = $this->beginWidget('CActiveForm', array(
        'id'                     => 'login-form',
        'enableClientValidation' => true,
        'clientOptions'          => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <div class="row">
        <div class="form-group form-group-default">
            <?php echo $form->labelEx($model, 'username'); ?>
            <?php echo $form->textField($model, 'username'); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group form-group-default">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password'); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Login', ['class' => 'btn btn-primary btn-cons m-t-10']); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
