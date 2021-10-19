<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Userdetails */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Userdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="userdetails-view">

    <h3>Welcome <?= Html::encode($this->title) ?> ,</h3>
    <br>
    <p>
        <?= Html::a('Update Details', ['update', 'id' => $model->userId], ['class' => 'btn btn-primary']) ?>
        
    
        <?= Html::a('Request for blood', ['/requestdetails/create'], ['class' => 'btn btn-success']) ?>
    
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'userId',
           // 'adminId',
            'name',
            'userName',
           // 'password',
            'emailId:email',
            'bloodGroup',
            'phoneNo',
            'dob',
            'state',
            'city',
            'eligibility',
            'willingness',
            //'isActive',
            'createdTime',
        ],
    ])
    
    ?>

<p>
<?= Html::a('Delete Account', ['delete', 'id' => $model->userId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
</p>
</div>
