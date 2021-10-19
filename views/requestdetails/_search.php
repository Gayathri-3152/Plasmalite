<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RequestdetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requestdetails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'requestId') ?>

    <?= $form->field($model, 'bloodGroup') ?>

    <?= $form->field($model, 'unitsNeeded') ?>

    <?= $form->field($model, 'city') ?>

    <?= $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'phoneNo') ?>

    <?php // echo $form->field($model, 'requestedBy') ?>

    <?php // echo $form->field($model, 'dateAndTime') ?>

    <?php // echo $form->field($model, 'isAccepted') ?>

    <?php // echo $form->field($model, 'acceptedTime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
