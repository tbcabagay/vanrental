<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reservation */

$this->title = 'Customer Information';
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1><?= Html::encode($this->title) ?></h1>
            </div>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'email:email',
                    'phone',
                    'company',
                    'when_date:date',
                    'when_time',
                    'where_pickup',
                    'where_destination',
                    'duration',
                    'created_at:datetime',
                ],
            ]) ?>
        </div>
    </div>

</div>
