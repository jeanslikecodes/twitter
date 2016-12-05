<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TweetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider *
/* @var $model app\models\Tweet */

$this->title = 'Perfil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tweet-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach($model as $tweet): ?>

        <p><?= $tweet->texto ?></p>
        
    <?php endforeach; ?>

    
</div>
