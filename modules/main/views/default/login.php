<? /** @var LoginForm $model */
use app\modules\main\models\forms\LoginForm; ?>

<div class="row">
    <div class="col-4 d-flex align-self-center">
        <?= $this->render('forms/login', ['model' => $model]); ?>
    </div>
</div>
