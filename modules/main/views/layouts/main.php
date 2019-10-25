<?php

/* @var $this View */
/* @var $content string */

use app\modules\main\models\forms\LoginForm;
use app\modules\main\models\forms\SignupForm;
use app\widgets\Alert;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => array_filter([
            Yii::$app->user->isGuest ?
                [
                    'label' => Yii::t('app', 'SignUp'),
                    'options' => [
                        'data-toggle' => 'modal',
                        'data-target' => '#signup-modal',
                    ],
                ] : false,
            Yii::$app->user->isGuest ? (
                [
                    'label' => Yii::t('app', 'Login'),
                    'options' => [
                        'data-toggle' => 'modal',
                        'data-target' => '#login-modal',
                    ],
                ]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    Yii::t('app', 'Logout ({login})', ['login' => Yii::$app->user->identity->username]),
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ]),
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php if (Yii::$app->user->isGuest) {
    Modal::begin([
        'title' => Yii::t('app', 'SignUp'),
        'options' => ['id' => 'signup-modal'],
        'footer' => '<div class="form-group">' .
            Html::submitButton(
                Yii::t('app', 'SignIn'),
                ['class' => 'btn btn-primary']
            ) . '</div>',
    ]);
    echo $this->render('@app/modules/main/views/default/forms/signup.php', ['model' => (new SignupForm())]);
    Modal::end();

    Modal::begin([
        'title' => Yii::t('app', 'LOGIN_MODAL_HEADER'),
        'options' => ['id' => 'login-modal'],
        'size' => Modal::SIZE_SMALL,
//        'footer' => '<div class="form-group">' .
//            Html::submitButton(
//                Yii::t('app', 'Login'),
//                ['class' => 'btn btn-primary']
//            ) . '</div>',
    ]);
    echo $this->render('@app/modules/main/views/default/forms/login.php', ['model' => (new LoginForm())]);
    Modal::end();
} ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
