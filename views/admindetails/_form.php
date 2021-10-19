<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Admindetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admindetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orgName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phoneNo')->textInput() ?>

    <?= $form->field($model, 'emailId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Create Account', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
