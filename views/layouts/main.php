<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets_b\AppAsset;
use app\assets_b\FontAwesomeAsset;
use app\assets_b\ScrollRevealAsset;
use app\assets_b\MagnificPopupAsset;
use app\assets_b\CreativeAsset;
use app\assets_b\BootboxAsset;

AppAsset::register($this);
FontAwesomeAsset::register($this);
ScrollRevealAsset::register($this);
MagnificPopupAsset::register($this);
CreativeAsset::register($this);
BootboxAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Van Rental Philippines Galang Norte">
    <meta name="robots" content="noodp">
    <link rel="canonical" href="http://galangnorte.com">
    <meta property="og:title" content="Van Rental Philippines Galang Norte">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://galangnorte.com">
    <meta property="og:image" content="http://galangnorte.com/img/logo.png">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type='application/ld+json'> {"@context": "http://www.schema.org","@type": "WebSite","name": "Van Rental Philippines Galang Norte","url": "http://galangnorte.com"}</script>
</head>
<body id="page-top">
<?php $this->beginBody() ?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-88822037-1', 'auto');
    ga('send', 'pageview');
</script>
    <?php
    NavBar::begin([
        'id' => 'mainNav',
        'innerContainerOptions' => ['class' => 'container-fluid'],
        'containerOptions' => ['id' => 'bs-example-navbar-collapse-1'],
        'brandLabel' => Yii::$app->params['appTitle'],
        'brandUrl' => '#page-top',
        'brandOptions' => ['class' => 'page-scroll'],
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'About', 'url' => '#about', 'linkOptions' => ['class' => 'page-scroll']],
            ['label' => 'Services', 'url' => '#services', 'linkOptions' => ['class' => 'page-scroll']],
            ['label' => 'Reservations', 'url' => '#reservations', 'linkOptions' => ['class' => 'page-scroll']],
            ['label' => 'Clients', 'url' => '#clients', 'linkOptions' => ['class' => 'page-scroll']],
            ['label' => 'Testimonials', 'url' => '#testimonial', 'linkOptions' => ['class' => 'page-scroll']],
            ['label' => 'Contact', 'url' => '#contact', 'linkOptions' => ['class' => 'page-scroll']],
        ],
    ]);
    NavBar::end();
    ?>

    <?= $content ?>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>Mobile# 0915 341 5179<br>Landline# (049) 536-1904</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:galangnorte@gmail.com">galangnorte@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
