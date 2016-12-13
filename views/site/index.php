<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use yii\widgets\ListView;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['appTitle'];
?>

<header>
    <div class="header-content">
        <div class="header-content-inner">
            <h1 id="homeHeading">Welcome To Galang Norte<br>Van Rental</h1>
            <hr>
            <?= Html::a('Find Out More', '#about', ['class' => 'btn btn-primary btn-xl page-scroll']) ?>
        </div>
    </div>
</header>

<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Your way to the<br>GLOBALLY IMPORTANT AGRICULTURAL HERITAGE SYSTEMS<br>and SATOYAMA sites in Ifugao, Philippines</h2>
                <hr class="light">
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">At Your Service</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-car text-primary sr-icons"></i>
                    <h3>Car / Van Rental</h3>
                    <p class="text-muted">Toyota Super Grandia (10 seater)</p>
                    <p class="text-muted">Toyota GL (12 seater)</p>
                    <p class="text-muted">Toyota Fortuner (4 seater)</p>
                    <p class="text-muted">Nissan Urvan Escapade (12 seater)</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-map text-primary sr-icons"></i>
                    <h3>Tour Guiding To</h3>
                    <p class="text-muted">Batad Rice Terraces</p>
                    <p class="text-muted">Hungduan (Hapao Rice Terraces)</p>
                    <p class="text-muted">Mayoyao Rice Terraces</p>
                    <p class="text-muted">Bangaan Rice Terraces</p>
                    <p class="text-muted">Nagacadan Rice Terraces (Kiangan, Ifugao)</p>
                </div>
            </div>
        </div>
    </div>
</section>

<aside class="bg-primary">
    <div class="container text-center">
        <div class="call-to-action">
            <?= Html::a('Make Your Reservation Now!', '#reservations', ['class' => 'btn btn-default btn-xl sr-button page-scroll']) ?>
        </div>
    </div>
</aside>

<section id="reservations">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Plan Your Next Trip With Us</h2>
                <hr>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'reservation-form-1',
                'action' => ['reservation-submit'],
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
                'validationUrl' => ['reservation-validate'],
                'formConfig' => [
                    'showLabels' => false,
                ],
                'options' => [
                    'autocomplete' => 'off',
                ],
            ]); ?>

            <div class="col-lg-6">
                <h4 class="text-center">Client Information</h4>
                <hr>

                <?= $form->field($reservation, 'name', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'user',
                        'error' => 'warning',
                        'success' => 'check',
                    ],
                ])->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

                <?= $form->field($reservation, 'email', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'envelope',
                        'error' => 'warning',
                        'success' => 'check',
                    ],
                ])->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

                <?= $form->field($reservation, 'phone', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'phone',
                        'error' => 'warning',
                        'success' => 'check',
                    ],
                ])->textInput(['maxlength' => true, 'placeholder' => 'Phone']) ?>

                <?= $form->field($reservation, 'company', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'institution',
                        'error' => 'warning',
                        'success' => 'check',
                    ],
                ])->textInput(['maxlength' => true, 'placeholder' => 'Organization / Company']) ?>
            </div>
            <div class="col-lg-6">
                <h4 class="text-center">Trip Information</h4>
                <hr>

                <?= $form->field($reservation, 'when_date', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'error' => 'warning',
                        'success' => 'check',
                    ],
                ])->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Pick-up Date'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                    ],
                ]) ?>

                <?= $form->field($reservation, 'when_time')->widget(TimePicker::classname(), [
                    'options' => ['placeholder' => 'Pick-up Time'],
                    'pluginOptions' => [
                        'defaultTime' => false,
                        'minuteStep' => 5,
                    ],
                ]) ?>

                <?= $form->field($reservation, 'where_pickup', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'location-arrow',
                        'error' => 'warning',
                        'success' => 'check',
                    ],
                ])->textInput(['maxlength' => true, 'placeholder' => 'Pick-up Location']) ?>

                <?= $form->field($reservation, 'where_destination', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'map',
                        'error' => 'warning',
                        'success' => 'check',
                    ],
                ])->textInput(['maxlength' => true, 'placeholder' => 'Destination']) ?>

                <?= $form->field($reservation, 'duration', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'hourglass',
                        'error' => 'warning',
                        'success' => 'check',
                    ],
                ])->textInput(['placeholder' => 'How Many Days?']) ?>
            </div>
            <div class="col-lg-8 col-lg-offset-2">
                <div class="form-group last">

                    <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-success btn-block btn-submit']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</section>

<section id="clients" class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Our Clients</h2>
                <hr class="light">
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="timeline">
            <li>
                <div class="timeline-image">
                    <?= Html::img('@web/img/AYAD.jpg', ['class' => 'img-circle img-responsive']) ?>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading">Australian Youth Ambassadors for Development</h4>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <?= Html::img('@web/img/SATOYAMA.jpg', ['class' => 'img-circle img-responsive']) ?>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading">Satoyama Meister Training Program</h4>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-image">
                    <?= Html::img('@web/img/KANAZAWA_UNIVERSITY.jpg', ['class' => 'img-circle img-responsive']) ?>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading">Kanazawa University, Ishikawa Japan</h4>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <?= Html::img('@web/img/PHILIPPINES.jpg', ['class' => 'img-circle img-responsive']) ?>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading">Philippine Government Projects</h4>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-image">
                    <h4>Be Part<br>Of Our<br>Story!</h4>
                </div>
            </li>
        </ul>
    </div>
</section>

<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Words From Our Clients</h2>
                <hr class="primary">
            </div>
            <div class="col-lg-12">
            <?php Pjax::begin(['id' => 'testimonial-pjax-1']); ?>
                <?= ListView::widget([
                    'dataProvider' => $dataProviderTestimonial,
                    'itemView' => '_testimonial',
                    'layout' => "{items}\n{pager}",
                ]); ?>
            <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Write A Testimonial</h2>
                <hr>
            </div>
            <div class="col-lg-8 col-lg-offset-2">
                <?php $form = ActiveForm::begin([
                    'id' => 'testimonial-form-1',
                    'action' => ['testimonial-submit'],
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validationUrl' => ['testimonial-validate'],
                    'formConfig' => [
                        'showLabels' => false,
                    ],
                    'options' => [
                        'autocomplete' => 'off',
                    ],
                ]); ?>

                <?= $form->field($testimonial, 'name', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'user',
                        'error' => 'warning',
                        'success' => 'check',
                    ],
                ])->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

                <?= $form->field($testimonial, 'email', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'envelope',
                        'error' => 'warning',
                        'success' => 'check',
                    ],
                ])->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

                <?= $form->field($testimonial, 'organization', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'institution',
                        'error' => 'warning',
                        'success' => 'check',
                    ],
                ])->textInput(['maxlength' => true, 'placeholder' => 'Company or Organization']) ?>

                <?= $form->field($testimonial, 'content', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'comment',
                        'error' => 'warning',
                        'success' => 'check',
                    ],
                ])->textarea(['rows' => 6, 'placeholder' => 'Place your message here']) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-success btn-block btn-submit']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>

<?php
$this->registerJs('
var myApp = {
    formName : null,
    buttonText : "<i class=\"fa fa-spinner fa-spin fa-fw\"></i>",
    pjaxContainer : null,
    form : function(form = null, pjaxContainer = null) {
        jQuery(document).on("beforeSubmit", form, function(e) {
            myApp.formName = form;
            if (pjaxContainer != null) {
                myApp.pjaxContainer = pjaxContainer;
            }
            bootbox.confirm("Are you sure you want to submit this data?", function(r) {
                if (r) {
                    jQuery(".btn-submit").prop("disabled", true).html(myApp.buttonText + " Submit");
                    myApp.submit();
                }
            });
            return false;
        });
    },
    submit : function() {
        var f = jQuery(myApp.formName);
        var p = myApp.pjaxContainer;
        jQuery.ajax({
            url: f.attr("action"),
            type: "post",
            data: f.serialize(),
            success: function(r){
                if (r.status) {
                    jQuery(".btn-submit").prop("disabled", false).text("Submit");
                    f.trigger("reset");
                    bootbox.alert(r.message);
                }
            }
        });
    },
}
myApp.form("#testimonial-form-1");
myApp.form("#reservation-form-1");
');
?>