<?php
/* @var $model SignupForm */

use app\modules\main\models\forms\SignupForm;
use yii\bootstrap4\ActiveForm;

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
