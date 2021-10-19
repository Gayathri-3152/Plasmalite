<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userdetails */

$this->title = 'Update Userdetails: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Userdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->userId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userdetails-update">

    <h3><?= Html::encode($this->title) ?></h3>
    <br> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
