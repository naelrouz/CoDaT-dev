<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Incoming;
use app\models\Tasks;
use app\models\DocumentForm;



class SiteController extends Controller
{
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
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {   
        $dataProvider = new ActiveDataProvider([
            'query' => Incoming::find(),
            'pagination' => [
            'pageSize' => 20,
            ],
        ]);
        $incoming = Incoming::find()->all();
        
        $tasks = Tasks::find()->all();
        
        return $this->render('index',[
            'incoming' => $incoming,
            'tasks' => $tasks,
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionList()
    {   
        $dataProvider = new ActiveDataProvider([
            'query' => Incoming::find(),
            'pagination' => [
            'pageSize' => 20,
            ],
        ]);
        $incoming = Incoming::find()->all();
        $tasks = Tasks::find()->all();
        return $this->render('list',[
            'incoming' => $incoming,
            'tasks' => $tasks,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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

    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionDocform()
    {
        $docform = new DocumentForm();
        if($docform->load(Yii::$app->request->post()))
            // && $docform->validate()
        {
            $incoming = new Incoming();
//            $incoming->type = 'Письмо';
//            $incoming->save();
            $incoming->type = Html::encode($docform->type);
            $incoming->incoming_number = Html::encode($docform->incoming_number);
            $incoming->incoming_date = Html::encode($docform->incoming_date);
            $incoming->outgoing_date = Html::encode($docform->outgoing_date);
            $incoming->outgoing_number = Html::encode($docform->outgoing_number);
            $incoming->description = Html::encode($docform->description);
            $incoming->sender = Html::encode($docform->sender);
            $incoming->addresser = Html::encode($docform->addresser);
            $incoming->save();
           
            //$form->file = UploadedFile::getInstance($form, 'file');
            //$form->file->saveAs('photo/'.$form->file->baseName.'.'.$form->file->extension);        
        } else {}
        return $this->render('docform',
            [
                'docform' => $docform,
                '$status_message'=>$status_message
            ]);
    }
    
    public function actionDocedit()
    {
        $docform = new DocumentForm;
        
        if($docform->load(Yii::$app->request->post()) && $docform->validate())
            // && $docform->validate()
        {
            $id = Html::encode($docform->id);
            //$id = '2';
            $incoming = Incoming::findOne('2');
            $incoming->type = $id;
                    //Html::encode($docform->type);
            $incoming->incoming_number = Html::encode($docform->incoming_number);
            $incoming->incoming_date = Html::encode($docform->incoming_date);
            $incoming->outgoing_date = Html::encode($docform->outgoing_date);
            $incoming->outgoing_number = Html::encode($docform->outgoing_number);
            $incoming->description = Html::encode($docform->description);
            $incoming->sender = Html::encode($docform->sender);
            $incoming->addresser = Html::encode($docform->addresser);
            $incoming->save();       
        }
            
        $request = Yii::$app->request;
        $id = $request->get('id');  
        
        $incoming = Incoming::find()
            ->where(['id' => $id])
            ->all();
        
        return $this->render('docedit',[
            'incoming' => $incoming,
            'docform' => $docform 
        ]);   
    }
    
     public function actionDocdell()
    {   
        $customer = Customer::findOne(123);
        $customer->delete();
        return $this->render('docdell');
    }
    
   
    
     public function actionTaskform()
    {   
        
        return $this->render('taskform');
    }
}
