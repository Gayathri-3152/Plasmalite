<?php

namespace app\controllers;

use Yii;
use app\models\Userdetails;
use app\models\UserdetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserdetailsController implements the CRUD actions for Userdetails model.
 */
class UserdetailsController extends Controller
{
    /**
     * @inheritDoc
     */
   
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'get_data' => ['get'],
                    'get_detail_data' => ['get'],
                    'send_notificaiton' => ['get'],
                    'delete' => ['POST'],
                    'view1'=>['GET','POST'],
                  //  'create_abc' => ['GET'],                   
                ],
            ],
        ];
    }

    /**
     * Lists all Userdetails models.
     * @return mixed
     */
    public function actionIndex()
    {
       
        $searchModel = new UserdetailsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Userdetails model.
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
    public function actionView1($id,$email,$name)
    {
        $model = new Userdetails();

        $send = Yii::$app->mailer->compose()
        ->setFrom('sample33022@gmail.com')
        ->setTo($email)
        ->setSubject('Plasmalite Blood Request')
        ->setTextBody('Plain text content. YII2 Application')
        ->setHtmlBody('<b>Hello '.$name.',<br>    A blood donation request has been received from someone. 
          You are eligible to donate blood if you have not given blood in the past two months.
          If you are interested, you can donate.
        <br><br>Thank you!!!</b>')
        ->send();
       
        return $this->render('view1', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Creates a new Userdetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userdetails();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())){
               
               $model->password=crypt($model->password,'salt');
               if($model->save()) {
                return $this->redirect(['view', 'id' => $model->userId]);
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
     * Updates an existing Userdetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->userId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Userdetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->isActive = 0;
        $model->save();
        //$this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Userdetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Userdetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userdetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
