<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Testimonial;

/* @var $this yii\web\View */
/* @var $model app\models\Testimonial */

$this->title = $model->name;
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1><?= Html::encode($this->title) ?></h1>
            </div>

            <p>
                <?php if ($model->status === Testimonial::STATUS_NEW):
                echo Html::a(Yii::t('app', 'Approve'), ['approve', 'id' => $model->id], [
                    'class' => 'btn btn-success',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to approve this item?'),
                        'method' => 'post',
                    ],
                ]);
                endif; ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'email:email',
                    'name',
                    'organization',
                    'content:ntext',
                    'created_at:datetime',
                ],
            ]) ?>
        </div>
    </div>

</div>
