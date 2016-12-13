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

    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
