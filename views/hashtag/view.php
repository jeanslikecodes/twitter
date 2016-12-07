<?php
/* @var $this yii\web\View */
/* @var $hashtag string */
/* @var $tweets \app\models\Tweet[] */

?>

<div class="panel panel-default">
 <div class="panel-heading"><h3>Tweets com a hashtag #<?=$hashtag?></h3></div>
  <table class="table">
    <tr>
    	<th>Username</th>
    	<th>Tweet</th>
    </tr>
    <?php foreach($tweets as $tweet): ?>
    <tr>
        	<td><?= $tweet->user->username ?></td>
        	<td><?= $tweet->tweetView ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>

