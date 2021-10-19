<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Requestdetails */

$this->title = 'Update Requestdetails: ' . $model->requestId;
$this->params['breadcrumbs'][] = ['label' => 'Requestdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->requestId, 'url' => ['view', 'id' => $model->requestId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="requestdetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
