<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userdetails */

$this->title = 'Create Userdetails';
$this->params['breadcrumbs'][] = ['label' => 'Userdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userdetails-create">

<p>
        <?= Html::a('Admin Signup', ['admindetails/create'], ['class' => 'btn btn-success']) ?>
</p>
    <h3>Create a new user account</h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
