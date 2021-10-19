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

    <h3>Blood Bank containing requested Blood Group</h3><br>

   

    <?php
   // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'adminId',
            [
                'attribute'=>'orgName',
                'value'=>function($model){
                    $temp=Admin::find()->where(['adminId'=>$model['adminId']])->one();
                    // die(var_dump($temp));
                    return $temp->orgName;

                }
            ],
            [
                'attribute'=>'phoneNo',
                'value'=>function($model){
                    $temp=Admin::find()->where(['adminId'=>$model['adminId']])->one();
                    // die(var_dump($temp));
                    return $temp->phoneNo;

                }
            ],
            [
                'attribute'=>'email',
                'value'=>function($model){
                    $temp=Admin::find()->where(['adminId'=>$model['adminId']])->one();
                    // die(var_dump($temp));
                    return $temp->emailId;

                }
            ],
             [
                'attribute'=>'city',
                'value'=>function($model){
                    $temp=Admin::find()->where(['adminId'=>$model['adminId']])->one();
                    // die(var_dump($temp));
                    return $temp->city;

                }
            ], [
                'attribute'=>'state',
                'value'=>function($model){
                    $temp=Admin::find()->where(['adminId'=>$model['adminId']])->one();
                    // die(var_dump($temp));
                    return $temp->state;

                }
            ],
            // 'orgName',
            //'userName',
            //'password',
            //'phoneNo',
            //'emailId:email',
            //'city',
            //'state',
            //'isActive',
            //'createdTime',

            //['class' => 'yii\grid\ActionColumn'],
        ],
        
        
    ]); ?>


</div>

