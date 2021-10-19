<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Admindetails */

$this->title = $model->adminId;
$this->params['breadcrumbs'][] = ['label' => 'Admindetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="admindetails-view">

<h3>Welcome <?php echo $model->orgName ?> ,</h3>
    <br>
    
    

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->adminId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->adminId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'adminId',
            'orgName',
            'userName',
            //'password',
            'phoneNo',
            'emailId:email',
            'city',
            'state',
            //'isActive',
            'createdTime',
        ],
    ]) ?>

</div>
