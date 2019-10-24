<?php
/* @var $model SignupForm */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;

Modal::begin([
    'header' => Yii::t('app', 'LOGIN_MODAL_HEADER'),
    'options' => ['id' => 'login-modal'],
    'size' => Modal::SIZE_SMALL,
    'footer' => '<div class="form-group">' .
        Html::submitButton(
            Yii::t('app', 'Login'),
            ['class' => 'btn btn-primary']
        ) . '</div>',
]);

$form = ActiveForm::begin(['id' => 'login-form']);
$form->enableAjaxValidation = true;

echo
$form->field($model, 'username')->textInput(),
$form->field($model, 'password')->passwordInput();

ActiveForm::end();
Modal::end();
