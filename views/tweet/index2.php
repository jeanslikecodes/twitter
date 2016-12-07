<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TweetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider *

/* @var $tweets \app\models\Tweet[] */

foreach($model as $tweet):
	$username = $tweet->user->username;
	$id = $tweet->user->id;
endforeach;

var_dump($id);

$this->title = $username;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tweet-index">

    <h2><?= Html::encode('Perfil de @'.$this->title."'s") ?>
    	<?= Html::a('Seguir @'.$username, ['site/seguir', $id], ['class' =>'btn btn-success pull-right']) ?>
    </h2>
	<br>

	<table class="table">
	    <tr>
	    	<th><h4>Tweet</h4></th>
	    </tr>
	    <?php foreach($model as $tweet): ?>
	    <tr>
	        	<td><p><?= $tweet->tweetView ?></p></td>
	    </tr>
	    <?php endforeach; ?>
	</table>
    
</div>
