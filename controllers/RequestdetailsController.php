<?php

namespace app\controllers;

use Yii;
use app\models\Requestdetails;
use app\models\RequestdetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RequestdetailsController implements the CRUD actions for Requestdetails model.
 */
class RequestdetailsController extends Controller
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

                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Requestdetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequestdetailsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Requestdetails model.
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
     * Creates a new Requestdetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Requestdetails();
        
        
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $session = Yii::$app->session;
                $id=$session->get('id');
                $name=$session->get('name');
                $email=$session->get('email');
                $model->requestedBy=$id;
                $model->save();
                $send = Yii::$app->mailer->compose()
              ->setFrom('sample33022@gmail.com')
              ->setTo($email)
              ->setSubject('Plasmalite confimation')
              ->setTextBody('Plain text content. YII2 Application')
              ->setHtmlBody('<b>Hello '.$name.',<br>   Your request has been created successfully</b>')
              ->send();
             
              
              //$session = Yii::$app->session;
              //$session->set('bloodGroup', $model->bloodGroup);
                return $this->redirect('/basic/web/admindetails');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Requestdetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->requestId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Requestdetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
        $model=$this->findModel($id);
        $model->isAccepted=1;
        $model->acceptedTime=date('Y/m/d');
        $model->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Requestdetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Requestdetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Requestdetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
  
}
