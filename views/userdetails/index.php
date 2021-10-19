<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserdetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Userdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userdetails-index">

    <h3>Users Available</h3>
    <br>  
   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget(
        [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
            
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'userId',
            'adminId',
            'name',
            
            //'userName',
            //'password',
            'emailId:email',
            'bloodGroup',
            'phoneNo',
            //'dob',
            //'state',
            //'city',
            //'eligibility',
            //'willingness',
            //'isActive',
            //'createdTime',

          //  ['class' => 'yii\grid\ActionColumn'],
           
           
        [
            'attribute' => 'Request',
            'content' => function($model) {
                
                return Html::a('Request', ['/userdetails/view1','id' =>$model['userId'],'email'=>$model['emailId'],'name'=>$model['name']], ['class' => 'btn btn-success']);
            }         
],

        ],
        'rowOptions' => function($model,$key,$index,$widget) {
            if ($model->isActive == 1) {
                return ['style' => 'background-color:#c4ffcb'];
            }
            else{
                return ['style' => 'background-color: #ffc4d4'];  
            }
        },
        
// ... other options
    ]); ?>
 


</div>
