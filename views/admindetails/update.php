<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Admindetails */

$this->title = 'Update Admindetails: ' . $model->adminId;
$this->params['breadcrumbs'][] = ['label' => 'Admindetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->adminId, 'url' => ['view', 'id' => $model->adminId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admindetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
