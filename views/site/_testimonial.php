<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use kartik\markdown\Markdown;
?>

<div class="media well well-sm">
    <div class="media-left">
        <i class="fa fa-user fa-2x text-muted"></i>
    </div>
    <div class="media-body">
        <h3 class="media-heading">
            <?= Html::encode($model->name) ?> <small><i class="fa fa-clock-o"></i> <?= Yii::$app->formatter->asDateTime($model->created_at) ?></small><br>
            <small><em><?= Html::encode($model->organization) ?></em></small>
        </h3>
        <?= Markdown::convert(HtmlPurifier::process($model->content)) ?>
    </div>
</div>
