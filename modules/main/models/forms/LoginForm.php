<?php

namespace app\modules\main\models\forms;

use yii\base\Model;

class LoginForm extends Model
{
    public $username, $identity, $password;

    public function rules ()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'string',  'max' => 32],
            [['password'], 'string'],
        ];
    }

    public function login ()
    {
        Yii::$app->user->login();
    }

    public function attributeLabels()
    {
        return [
            'username' => \Yii::t('app', 'LOGIN_FORM_USERNAME_LABEL'),
            'password' => \Yii::t('app', 'LOGIN_FORM_PASSWORD_LABEL'),
        ];
    }
}
