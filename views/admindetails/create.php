<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Admindetails */

$this->title = 'Create Admindetails';
$this->params['breadcrumbs'][] = ['label' => 'Admindetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admindetails-create">

   
   <h3>Create a new admin account</h3>
   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
