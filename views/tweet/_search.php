<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TweetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tweet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'texto') ?>

    <div class="form-group">    </div>

    <?php ActiveForm::end(); ?>

</div>
