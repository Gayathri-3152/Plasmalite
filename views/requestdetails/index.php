<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestdetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requestdetails-index">

    <h3 style="color:red"><b>Alert : </b>Blood Donar Needed!!! Please contact the requested users if blood available.</h3>
    
    <p><?= Html::a('See all blood banks', ['/admindetails/index1'], ['class' => 'btn btn-success']) ?></p>
    
 <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'requestId',
            'bloodGroup',
            'unitsNeeded',
            'city',
            'state',
            'phoneNo',
            //'requestedBy',
            //'dateAndTime',
            //'isAccepted',
            //'acceptedTime',

            //['class' => 'yii\grid\ActionColumn'],
        ],
        'rowOptions' => function($model,$key,$index,$widget) {
            if ($model->isAccepted == 1) {
                return ['style' => 'background-color:#c4ffcb'];
            }
            else{
                return ['style' => 'background-color: #ffc4d4'];  
            }
        },
        
    ]); ?>


</div>
