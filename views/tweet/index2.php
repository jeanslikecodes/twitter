<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TweetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider *

/* @var $tweets \app\models\Tweet[] */

$this->title = $user->username;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tweet-index">

    <h2><?= Html::encode('Perfil de @'.$this->title."'s") ?>
    	<?= Html::a('Seguir @'.$this->title, ['site/seguir', 'id' => $model->id], ['class' =>'btn btn-success pull-right']) ?>
    </h2>
	<br>

	<h2>Descrição<h2>
	<h3><?= $model->perfil ?><h3>

	<table class="table">
	    <tr>
	    	<th><h4>Tweet</h4></th>
	    </tr>
	    <?php foreach($model->tweets as $tweet): ?>
	    <tr>
	        	<td><p><?= $tweet->tweetView ?></p></td>
	    </tr>
	    <?php endforeach; ?>
	</table>
    
</div>
