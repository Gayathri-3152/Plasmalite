<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

use app\models\Admin;

use app\models\Userdetails;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdmindetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admindetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admindetails-index">

    <h3>Blood Bank available</h3><br>

   

    <?php
   // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           
             'orgName',
            //'userName',
            //'password',
            'phoneNo',
            'emailId:email',
            'city',
            'state',
            //'isActive',
            //'createdTime',

          //  ['class' => 'yii\grid\ActionColumn'],
        ],
        'rowOptions' => function($model,$key,$index,$widget) {
            if ($model->isActive == 1) {
                return ['style' => 'background-color:#c4ffcb'];
            }
            else{
                return ['style' => 'background-color: #ffc4d4'];  
            }
        },
        
        
    ]); ?>


</div>

