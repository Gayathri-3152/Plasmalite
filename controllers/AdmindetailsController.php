<?php

namespace app\controllers;

use Yii;

use app\models\Requestdetails;
use app\models\Admindetails;
use app\models\Userdetails;
use app\models\AdmindetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\SystemStatisticsHistory;
use app\models\LoginForm;

/**
 * AdmindetailsController implements the CRUD actions for Admindetails model.
 */
class AdmindetailsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                        'index1' => ['GET','POST'],
                    ],
                ],
            ]
        );
    }
    
    /**
     * Lists all Admindetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $searchModel = new AdmindetailsSearch();

        $query= (new \yii\db\Query())
        ->from('requestDetails')
        ->max('requestId');

        $temp = Requestdetails::find()->select('bloodGroup')->where(['RequestId'=>$query])->all();
       // die(var_dump($temp));

        $dataProvider = $searchModel->search($this->request->queryParams);
        $subQuery = (new \yii\db\Query())
        ->from('userDetails')
        ->where(['bloodGroup' =>$temp])
        ->groupBy('adminId');
      // die(var_dump($query));


    
        //$query= (new \yii\db\Query())
        //->select(['u' => $subQuery]);
        //->from('adminDetails');
        //->where(['adminId' => $query1])->all();
        
       
        //die(var_dump($temp[0]->adminId));
       
        $dataProvider = new ActiveDataProvider([
        'query' => $subQuery,              
        ]);



        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex1()
    {
       
        $searchModel = new AdmindetailsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
       
        return $this->render('index1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single Admindetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Admindetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Admindetails();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())){
               
               $model->password=crypt($model->password,'salt');
               if($model->save()) {
                return $this->redirect(['view', 'id' => $model->adminId]);
            }
            }                   
        
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Admindetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->adminId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Admindetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $model->isActive=0;
        $model->save();

        return $this->redirect(['index']);
    }
    /**
     * Finds the Admindetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admindetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admindetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
