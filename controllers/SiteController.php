<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\LoginForm;
use app\models\Testimonial;
use app\models\TestimonialSearch;
use app\models\Reservation;
use app\models\ReservationSearch;
use yii\web\Response;
use kartik\form\ActiveForm;
use app\components\AuthHandler;

class SiteController extends Controller
{
    /**
     * @inheritdoc
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
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
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
        $testimonial = new Testimonial();
        $testimonial->scenario = Testimonial::SCENARIO_INSERT;

        $reservation = new Reservation();
        $reservation->scenario = Reservation::SCENARIO_INSERT;

        return $this->render('index', [
            'testimonial' => $testimonial,
            'reservation' => $reservation,
            'dataProviderTestimonial' => (new TestimonialSearch())->testimonial(),
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = '@app/modules/administrator/views/layouts/main';

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/administrator/default/index']);
        }

        return $this->render('login');
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionTestimonialValidate()
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model = new Testimonial();
        $model->scenario = Testimonial::SCENARIO_INSERT;

        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;

        if ($model->load(Yii::$app->request->post())) {
            return ActiveForm::validate($model);
        }
    }

    public function actionTestimonialSubmit()
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model = new Testimonial();
        $model->scenario = Testimonial::SCENARIO_INSERT;

        if ($model->load(Yii::$app->request->post())) {
            $model->status = Testimonial::STATUS_NEW;

            $response = Yii::$app->response;
            $response->format = Response::FORMAT_JSON;

            if ($model->save()) {
                $response->data = [
                    'status' => true,
                    'message' => 'Thank you for giving a testimonial.',
                ];
            }
        }
    }

    public function actionReservationValidate()
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model = new Reservation();
        $model->scenario = Reservation::SCENARIO_INSERT;

        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;

        if ($model->load(Yii::$app->request->post())) {
            return ActiveForm::validate($model);
        }
    }

    public function actionReservationSubmit()
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model = new Reservation();
        $model->scenario = Reservation::SCENARIO_INSERT;

        if ($model->load(Yii::$app->request->post())) {
            $model->status = Reservation::STATUS_NEW;

            $response = Yii::$app->response;
            $response->format = Response::FORMAT_JSON;

            if ($model->save()) {
                $adminEmail = Yii::$app->params['adminEmail'];

                Yii::$app->mailer->compose('reservation', ['model' => $model])
                    ->setFrom($adminEmail)
                    ->setTo($adminEmail)
                    ->setSubject('Galang Norte Trip Schedule Reservation')
                    ->send();

                $response->data = [
                    'status' => true,
                    'message' => 'We have received your trip details and we will contact you as soon as possible either via mail or phone. Thank you for choosing us!',
                ];
            }
        }
    }

    public function onAuthSuccess($client)
    {
        $handle = new AuthHandler($client);
        if ($handle->handle()) {
            $this->redirect(['/administrator/default/index']);
        } else {
            $this->redirect(['/site/login']);
        }
    }
}
