<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReservationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Reservations');
$this->params['breadcrumbs'][] = $this->title;
$this->params['leftMenu'] = true;
?>
<div class="reservation-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'name',
            'email:email',
            'phone',
            'company',
            // 'when_date',
            // 'when_time',
            // 'where_pickup',
            // 'where_destination',
            // 'duration',
            // 'status',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {delete}',
                'viewOptions' => ['class' => 'btn-modal'],
            ],
        ],
        'pjax' => true,
        'pjaxSettings' => [
            'options' => [
                'id' => 'reservation-pjax-1',
            ],
        ],
        'export' => false,
        'toolbar' => [
            ['content' =>
                Html::a('<i class="fa fa-repeat"></i>', ['index'], [
                    'class' => 'btn btn-default', 
                    'title' => Yii::t('app', 'Reset Grid'),
                    'data-pjax' => 0,
                ]),
            ],
            '{toggleData}',
        ],
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => 'Grid View',
        ],
    ]); ?>
</div>
