<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets_b\AdminAsset;
use app\assets_b\FontAwesomeAsset;
use app\assets_b\BootboxAsset;

use app\models\Testimonial;
use app\models\Reservation;

AdminAsset::register($this);
FontAwesomeAsset::register($this);
BootboxAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="wrap">
<?php $this->beginBody() ?>

    <?php
    NavBar::begin([
        'id' => 'mainNav',
        'innerContainerOptions' => ['class' => 'container-fluid'],
        'brandLabel' => Yii::$app->params['appTitle'],
        'brandUrl' => ['/administrator/default/index'],
        'brandOptions' => ['class' => 'page-scroll'],
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    if (!Yii::$app->user->isGuest) {
    echo Nav::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => '<i class="fa fa-user"></i> ',
                'items' => [
                    [
                        'label' => 'Logout (' . Yii::$app->user->identity->email . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post'],
                    ],
                ],
            ],
        ],
    ]);
    }
    NavBar::end();
    ?>

    <div class="container">
    <?php if (isset($this->params['breadcrumbs'])): ?>
        <div class="row">
            <div class="col-lg-12">
                <?= Breadcrumbs::widget([
                    'links' => $this->params['breadcrumbs'],
                ]) ?>
            </div>
        </div>
    <?php endif; ?>
        <div class="row">
        <?php if (isset($this->params['leftMenu'])): ?>
            <div class="col-lg-3">
                <?= \kartik\helpers\Html::listGroup([
                    [
                        'content' => 'Home',
                        'url' => ['/administrator/default/index'],
                        'active' => ($this->context->id === 'default') ? true : false,
                    ],
                    [
                        'content' => 'Testimonials',
                        'url' => ['/administrator/testimonial/index'],
                        'active' => ($this->context->id === 'testimonial') ? true : false,
                        'badge' => Testimonial::getCount(),
                    ],
                    [
                        'content' => 'Reservations',
                        'url' => ['/administrator/reservation/index'],
                        'active' => ($this->context->id === 'reservation') ? true : false,
                        'badge' => Reservation::getCount(),
                    ]
                ]) ?>
            </div>
            <div class="col-lg-9">
                <?= $content ?>
            </div>
        <?php else: ?>
            <?= $content ?>
        <?php endif; ?>
        </div>
    </div>

<?php Modal::begin([
    'size' => Modal::SIZE_LARGE,
    'header' => '<span class="modal-header-content"></span>',
    'clientOptions' => [
        'backdrop' => 'static',
    ],
]);
Modal::end(); ?>
<?php $this->endBody() ?>
<script>
(function($) {
    $(document).on('click', '.btn-modal', function() {
        var title = 'Window';
        var content = $(this).attr('href');

        $('.modal-header-content').text(title);
        $('.modal').modal('show').find('.modal-body').load(content);

        return false;
    });
})(jQuery);
</script>
</body>
</html>
<?php $this->endPage() ?>
