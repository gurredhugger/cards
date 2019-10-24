<?php


namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

class RbacController extends Controller
{
    public function actionInit ()
    {
        $authManager = Yii::$app->getAuthManager();
        $authManager->removeAll();

        // Administrator
        $adminRole = $authManager->createRole('admin');
        $adminRole->description = 'Администратор';
        $authManager->add($adminRole);

        // Standard User
        $standardUserRole = $authManager->createRole('user');
        $standardUserRole->description = 'Пользователь';
        $authManager->add($standardUserRole);

        // Выдадим админу права Администратора
        $authManager->assign($adminRole, 1);
    }
}
