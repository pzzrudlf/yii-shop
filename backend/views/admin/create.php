<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = 'Create Admin';
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-create']); ?>
                <?= $form->field($model, 'username')->label('登录名')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email')->label('邮箱') ?>
                <?= $form->field($model, 'password')->label('密码')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('添加', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
