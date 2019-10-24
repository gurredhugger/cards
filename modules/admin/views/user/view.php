<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\user\UserActiveRecord */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app-admin', 'User Active Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="user-active-record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app-admin', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            // 'active',
            [
                'attribute' => 'active',
                'value' => function ($data) {
                    return $data->active
                        ? Yii::t('app', 'Yes')
                        : Yii::t('app', 'No');
                },
            ],
            'login',
            'email:email',
            'name',
            'middle_name',
            'surname',
            'birthday',
            'password',
            'access_token',
            'auth_key',
        ],
    ]) ?>

</div>
