<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Requestdetails */

$this->title = 'Create Requestdetails';
$this->params['breadcrumbs'][] = ['label' => 'Requestdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requestdetails-create">

    <h3>Create blood request</h3><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
