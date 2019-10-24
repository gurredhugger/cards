<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\user\UserActiveRecord */

$this->title = Yii::t('app-admin', 'Create User Active Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app-admin', 'User Active Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-active-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
