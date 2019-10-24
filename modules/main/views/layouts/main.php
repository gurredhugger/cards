<?php

/* @var $this View */
/* @var $content string */

use app\modules\main\models\forms\LoginForm;
use app\modules\main\models\forms\SignupForm;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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
    echo $this->render('@app/modules/main/views/default/signup.modal.php', ['model' => (new SignupForm())]);
    echo $this->render('@app/modules/main/views/default/login.modal.php', ['model' => (new LoginForm())]);
} ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
