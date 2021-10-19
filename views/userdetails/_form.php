<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker; 
use yii\helpers\ArrayHelper;
use app\models\Admindetails;

//use kartik\widgets\DatePicker;  "kartik-v/yii2-widget-datepicker": "@dev"
//composer update (run in terminal)
/* @var $this yii\web\View */
/* @var $model app\models\Userdetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userdetails-form">

    <?php $form = ActiveForm::begin(); ?>

<?php 
$name=Admindetails::find()->all();


$listData=ArrayHelper::map($name,'adminId','orgName');
echo $form->field($model, 'adminId')->dropDownList(
        $listData,
        ['prompt'=>'Select...']
        );
?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emailId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bloodGroup')->dropDownList([ 'O+ve' => 'O+ve', 'O-ve' => 'O-ve', 'A+ve' => 'A+ve', 'A-ve' => 'A-ve', 'B+ve' => 'B+ve', 'B-ve' => 'B-ve', 'AB+ve' => 'AB+ve', 'AB-ve' => 'AB-ve', ], ['prompt' => 'Select Blood Group']) ?>

    <?= $form->field($model, 'phoneNo')->textInput() ?>

    <?= $form->field($model,'dob')->widget(DatePicker::className(),[
       'inline' => false, 

       'options' => ['placeholder' => 'date of birth','autocomplete'=>'off',],
       'dateFormat'=>'yyyy-MM-dd',
       'clientOptions' => ['autoclose' => true,'maxDate' => '+0','todayHighlight' => true,]])->textInput();

    ?>

     
    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
1) You should donate blood Once in three months.<br>
2) Your age must be between 18 - 60 years.<br>
3) Your body weight must ranges between Above 45 kgs.<br>
4) Your should not have any health issues like diabetes, skin infection and diseases transmissible by blood transfusion.<br>
5) You should not by anaemic.<br>
If you are eligible say (yes) otherwise say (no) in eligibility<br>

    <?= $form->field($model, 'eligibility')->dropDownList([  '0' => 'no', '1' => 'yes', ], ['prompt' => 'Select Option']) ?>

    <?= $form->field($model, 'willingness')->dropDownList([  '0' => 'no', '1' => 'yes', ], ['prompt' => 'Select Option']) ?>
    <br>
   
    <div class="form-group">
        <?= Html::submitButton('Create Account', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
