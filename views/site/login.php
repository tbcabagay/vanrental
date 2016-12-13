<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\Alert;

$this->title = 'Login using Google Account';
?>

<div class="col-lg-12">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<div class="col-lg-12">
<?php if (Yii::$app->getSession()->hasFlash('error')): ?>
    <p><?= Alert::widget([
        'options' => [
            'class' => 'alert-danger',
        ],
        'body' => Yii::$app->getSession()->getFlash('error'),
    ]) ?></p>
<?php endif; ?>
    <p>Please click the button below to login.</p>

    <?= yii\authclient\widgets\AuthChoice::widget([
        'baseAuthUrl' => ['site/auth'],
        'popupMode' => false,
    ]) ?>
</div>
