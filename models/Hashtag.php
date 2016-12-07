<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hashtag".
 *
 * @property integer $id
 * @property string $nome
 *
 * @property TweetHashtag[] $tweetHashtags
 */
class Hashtag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hashtag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'unique'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTweets()
    {
        return $this->hasMany(Tweet::className(), ['id' => 'id_tweet'])
        ->viaTable('tweet_hashtag', ['id_hashtag' => 'id']);
    }
}
