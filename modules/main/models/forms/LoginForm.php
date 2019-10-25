<?php

namespace app\modules\main\models\forms;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username, $password, $rememberMe, $verifyCode;

    public function rules ()
    {
        return [
            [['username', 'password',], 'required'],
            [['username'], 'string',  'max' => 32],
            [['password'], 'string'],
            [['verifyCode'], 'captcha','captchaAction' => 'main/default/captcha',]
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'LOGIN_FORM_USERNAME_LABEL'),
            'password' => Yii::t('app', 'LOGIN_FORM_PASSWORD_LABEL'),
            'rememberMe' => Yii::t('app', 'LOGIN_FORM_REMEMBER_ME_LABEL'),
            'verifyCode' => Yii::t('app', 'LOGIN_FORM_VERIFY_CODE_LABEL'),
        ];
    }
}
