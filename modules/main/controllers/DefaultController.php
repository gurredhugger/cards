<?php

namespace app\modules\main\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\modules\main\models\forms\LoginForm;
/**
 * Default controller for the `main` module
 */
class DefaultController extends Controller
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
                    'login' => ['get', 'post'],
                    'signup' => ['post'],
                ],
            ],
        ];
    }

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
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin ()
    {
        $model = new LoginForm();

        if (Yii::$app->user->isGuest && $model->load(Yii::$app->request->post()))
        {

        } else {
            return $this->render('login', ['model' => $model]);
        }

        return $this->goBack();
    }

    public function actionLogout ()
    {

    }

    public function actionSignup ()
    {

    }

    private static function show ($something)
    {
        $unprinted = empty($something)
                  || is_null($something)
                  || is_bool($something);

        echo "<pre>";
        if ($unprinted) {
            var_dump($something);
        } else {
            print_r($something);
        }
        echo "</pre>";
    }
}
