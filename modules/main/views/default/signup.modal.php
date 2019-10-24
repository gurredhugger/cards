<?php

use app\modules\main\models\forms\SignupForm;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;use yii\helpers\Html;

/* @var $model SignupForm */
Modal::begin([
    'header' => Yii::t('app', 'SignUp'),
    'options' => ['id' => 'signup-modal'],
    'footer' => '<div class="form-group">' .
    Html::submitButton(
        Yii::t('app', 'SignIn'),
        ['class' => 'btn btn-primary']
    ) . '</div>',
]);

$form = ActiveForm::begin(['id' => 'signup-form']);
$form->enableAjaxValidation = true;
echo
    $form->field($model, 'login')->textInput(),
    $form->field($model, 'email')->textInput(),
    $form->field($model, 'password')->passwordInput(),
    $form->field($model, 'birthday')->textInput(['type' => 'date']),
    $form->field($model, 'name')->textInput(),
    $form->field($model, 'surname')->textInput(),
    $form->field($model, 'middle_name')->textInput();
ActiveForm::end();

Modal::end();
