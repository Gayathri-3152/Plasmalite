<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker; 


/* @var $this yii\web\View */
/* @var $model app\models\Requestdetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requestdetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bloodGroup')->dropDownList([ 'O+ve' => 'O+ve', 'O-ve' => 'O-ve', 'A+ve' => 'A+ve', 'A-ve' => 'A-ve', 'B+ve' => 'B+ve', 'B-ve' => 'B-ve', 'AB+ve' => 'AB+ve', 'AB-ve' => 'AB-ve', ], ['prompt' => 'Select Blood Group']) ?>

    <?= $form->field($model, 'unitsNeeded')->textInput() ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phoneNo')->textInput() ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
