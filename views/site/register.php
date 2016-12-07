<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model app\models\RegisterForm */


$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'perfil')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'repeatPassword')->passwordInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>