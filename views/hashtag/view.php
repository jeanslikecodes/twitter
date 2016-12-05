<?php
/* @var $this yii\web\View */
/* @var $hashtag string */
/* @var $tweets \app\models\Tweet[] */

?>
<h1>Tweets com a hashtag #<?=$hashtag?></h1>

<table border=1>
<?php foreach($tweets as $tweet): ?>
    <tr>
        <td><?= $tweet->texto ?></td>
        <td><?= $tweet->tweetView ?></td>
    </tr>
<?php endforeach; ?>
</table>