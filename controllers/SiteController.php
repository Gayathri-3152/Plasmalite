<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\LoginForm1;
use app\models\ContactForm;
use app\models\Admindetails;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'login2' => ['post','get'],  
                ],
            ],
        ];
    }
    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login','signup','logout'],
                'user'=>'admin',
                'rules' => [
                    [
                        'actions' => ['login','signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['error'],
                        'allow' => true,
                        'actions' => ['logout'],                    
                        'roles' => ['@'],
    
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'login2' => ['post','get'],  
                ],
            ],
        ];
    }
   */

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
  

    }
 
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        
        if( !Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //die(var_dump($model));
            $session = Yii::$app->session;
            $session->set('id', $model->user->userId);
            $session->set('name', $model->user->name);
            $session->set('email', $model->user->emailId);
            return $this->goBack()->redirect('/basic/web/userdetails/view?id='. Yii::$app->user->identity->userId );
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);

    }
    public function actionLogin2()
    {
        if( !Yii::$app->user->isGuest){
            return $this->goHome();
        }

    
    $model = new LoginForm1();
    if ($model->load(Yii::$app->request->post())&& $model->login()) {
        
            return $this->goBack()->redirect('/basic/web/userdetails');
        
    }
    $model->password = '';
    return $this->render('login2', [
        'model' => $model,
    ]);
}
   
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        //$fileCache = \Yii::$app->getCache();
        //$fileCache->flush();

       // Delete all the files in /var/lib/php/sessions
       // $this->destroyAllPhpSessionFiles();
       //Yii::$app->response->cookies->remove('PHPSESSID');
       Yii::$app->session->close();
        Yii::$app->user->logout();
        return $this->redirect('/basic/web/site/login');



    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
       
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
   
}
