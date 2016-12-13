<?php

namespace app\commands;

use yii\console\Controller;
use app\models\User;
use yii\helpers\Html;

class UserController extends Controller
{

    public function actionCreate($email = null)
    {
        if (is_null($email)) {
            $email = \Yii::$app->params['adminEmail'];
        }

        $model = new User();
        $model->scenario = User::SCENARIO_CREATE;

        $model->setAttribute('email', $email);
        $model->setAttribute('status', User::STATUS_ACTIVE);

        if ($model->save()) {
            echo "User saved successfully.\n";
        } else {
            echo Html::error($model, 'email', [
                'tag' => false, 'encode' => false
            ]) . "\n";
        }
        return Controller::EXIT_CODE_NORMAL;
    }

    public function actionList()
    {
        $model = User::find()->asArray()->all();

        if (empty($model)) {
            echo "Users not found.\n";
        } else {
            foreach ($model as $user) {
                echo $user['email'] . "\n";
            }
        }
        return Controller::EXIT_CODE_NORMAL;
    }
}
