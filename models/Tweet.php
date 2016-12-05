<?php

namespace app\models;

use Yii;
use \yii\helpers\Html;

/**
 * This is the model class for table "tweet".
 *
 * @property integer $id
 * @property string $texto
 * @property integer $id_user
 *
 * @property User $idUser
 * @property TweetHashtag[] $tweetHashtags
 * @property string $tweetView
 */
class Tweet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tweet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['texto', 'id_user'], 'required'],

            [['texto'], 'string'],

            [['id_user'], 'integer'],

            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'texto' => 'Texto',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHashtags()
    {
        return $this
            ->hasMany(Hashtag::className(), ['id' => 'id_hashtag'])
            ->viaTable('tweet_hashtag', ['id_tweet' => 'id']);
    }

    public function getTweetView()
    {
        $texto = $this->texto;

        // negrito
        $texto = preg_replace('/\*([^*]+?)\*/', '<b>$1</b>', $texto);

        // italico
        $texto = preg_replace('/%([^%]+?)%/', '<i>$1</i>', $texto);

        // sublinhado
        $texto = preg_replace('/_([^_]+?)_/', '<u>$1</u>', $texto);

        // hashtag
        preg_match_all('/\#([A-Za-z0-9_]+)/', $texto, $hashtags);
     //   echo '<pre>';
//print_r($hashtags);
//echo "</pre>";
        foreach ($hashtags[1] as $hashtag) {
print_r($hashtag);
try{
            $objHashtag = $this->getHashtags()->where(['nome' => $hashtag])->one();
 //echo 'here <h1>'.gettype($objHashtag).'</h1>';
 } catch(Exception $e){}

            $id = $objHashtag;

            $texto = str_replace("#$hashtag", Html::a(
                "#$hashtag",
                [
                    'hashtag/view',
                    'id' => $id
                ]
            ), $texto);
        }

        return $texto;
    }

    /**
     * @return void
     */
    public function linkHashtags()
    {

        // buscando as hashtags
        preg_match_all('/\#([A-Za-z0-9_]+)/', $this->texto, $hashtags);

        // percorrendo as hashtags encontradas no texto
        foreach ($hashtags[1] as $nomeHashtag) {

            // busca a hashtag
            $hashtag = Hashtag::find()->where(['nome' => $nomeHashtag])->one();

            // se não existir, cria a hashtag
            if(is_null($hashtag)){
                $hashtag = new Hashtag();
                $hashtag->nome = $nomeHashtag;
                $hashtag->save();
            }

            // faz o link com o candidato
            $this->link('hashtags',$hashtag);

            // busca hashtags linkadas com o candidato, que não estão no texto
            $unlinkHashtags = $this->getHashtags()->where(['not in','nome',$hashtags[1]])->all();
            foreach($unlinkHashtags as $unlinkHashtag) {
                $this->unlink('hashtags', $unlinkHashtag);
            }

        }

    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->linkHashtags();
        parent::afterSave($insert, $changedAttributes);
    }
}
