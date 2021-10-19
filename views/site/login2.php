<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Admindetails */
/* @var $form ActiveForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loginAdmin">
<h2>Admin Login</h2><br>
        
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label'],
        ],
    ]); ?>
        
        
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- loginAdmin -->
