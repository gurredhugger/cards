<?php
/* @var $model LoginForm */

use app\modules\main\models\forms\LoginForm;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$form = ActiveForm::begin(['id' => 'login-form']);
$form->enableAjaxValidation = true;

$captchaTemplate = <<<HTML
<div class="form-group">
    <div>{image}</div>
    <div>{input}</div>
</div>
HTML;

echo
$form->field($model, 'username')->textInput(),
$form->field($model, 'password')->passwordInput(),
$form->field($model, 'rememberMe')->checkbox()->label(null, ['class' => 'no-select']),
$form->field($model, 'verifyCode')->widget(Captcha::className(), [
    'captchaAction' => '/main/default/captcha',
    'template' => $captchaTemplate,
]),
Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary']);

ActiveForm::end();
