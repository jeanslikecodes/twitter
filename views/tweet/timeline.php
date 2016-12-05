<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TweetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tweets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tweet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tweet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'user.username',
            'texto:ntext',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
