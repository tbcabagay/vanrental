<?php

use yii\helpers\Html;

$formatter = Yii::$app->formatter;
?>

<p><strong>Name:</strong> <?= Html::encode($model->name) ?></p>
<p><strong>Email:</strong> <?= Html::encode($model->email) ?></p>
<p><strong>Phone:</strong> <?= Html::encode($model->phone) ?></p>
<p><strong>Company:</strong> <?= Html::encode($model->company) ?></p>
<p><strong>When:</strong> <?= $formatter->asDate($model->when_date) ?></p>
<p><strong>Time:</strong> <?= Html::encode($model->when_time) ?></p>
<p><strong>Pick-up Location:</strong> <?= Html::encode($model->where_pickup) ?></p>
<p><strong>Destination:</strong> <?= Html::encode($model->where_destination) ?></p>
<p><strong>Trip Duration:</strong> <?= Html::encode($model->duration) ?> <?= Yii::t('app', '{n, plural, =1{day} other{days}}', ['n' => $model->duration]) ?></p>
