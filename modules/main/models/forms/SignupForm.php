<?php
namespace app\modules\main\models\forms;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $login, $email, $password, $birthday, $name, $surname, $middle_name;

    public function rules () {
        return [
            [['login', 'email', 'password'], 'required'],
            [['login'], 'string', 'max' => 16, 'min' => 3],
            [['email'], 'email'],
            [['email'], 'string',  'max' => 32],
            [['password', 'name', 'surname', 'middle_name'], 'string'],
            [['birthday'], 'date'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => Yii::t('app', 'SIGN_UP_FORM_LOGIN_LABEL'),
            'email' => Yii::t('app', 'SIGN_UP_FORM_EMAIL_LABEL'),
            'password' => Yii::t('app', 'SIGN_UP_FORM_PASSWORD_LABEL'),
            'birthday' => Yii::t('app', 'SIGN_UP_FORM_BIRTHDAY_LABEL'),
            'name' => Yii::t('app', 'SIGN_UP_FORM_NAME_LABEL'),
            'surname' => Yii::t('app', 'SIGN_UP_FORM_SURNAME_LABEL'),
            'middle_name' => Yii::t('app', 'SIGN_UP_FORM_MIDDLE_NAME_LABEL'),
        ];
    }
}
