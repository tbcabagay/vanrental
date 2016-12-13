<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->context->layout = 'error';
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1><?= Html::encode($this->title) ?></h1>

                <div class="alert alert-danger">
                    <?= nl2br(Html::encode($message)) ?>
                </div>

                <p>
                    The above error occurred while the Web server was processing your request.
                </p>
                <p>
                    Please contact us if you think this is a server error. Thank you.
                </p>

                <p>
                    <?= Html::a('Go back', ['/'], ['class' => 'btn btn-primary btn-lg']) ?>
                </p>
            </div>
        </div>
    </div>
</section>
