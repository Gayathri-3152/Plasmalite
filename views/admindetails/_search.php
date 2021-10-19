<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdmindetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admindetails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'adminId') ?>

    <?= $form->field($model, 'orgName') ?>

    <?= $form->field($model, 'userName') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'phoneNo') ?>

    <?=$form->field($model, 'emailId') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'isActive') ?>

    <?php // echo $form->field($model, 'createdTime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
