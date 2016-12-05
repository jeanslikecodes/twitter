<?php

namespace app\controllers;

use app\models\Tweet;
use app\models\Hashtag;

class HashtagController extends \yii\web\Controller
{
    public function actionView($id)
    {

        /** @var Hashtag $hashtag */
        $hashtag = Hashtag::find()->where(['id' => $id])->one();

        /** @var Tweet[] $tweets */
        $tweets = $hashtag->tweets;

        return $this->render('view',[
            'hashtag' => $hashtag->nome,
            'tweets' => $tweets
        ]);
    }

}
