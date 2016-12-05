<?php

use yii\db\Migration;

class m161130_164316_CreateTableTweetHashtag extends Migration
{
    public function up()
    {
        $this->createTable('tweet_hashtag', [
            'id_tweet' => $this->integer()->notNull(),
            'id_hashtag' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'fk_tweet_hashtag_tweet',
            'tweet_hashtag',
            'id_tweet',
            'tweet',
            'id'
        );

        $this->addForeignKey(
            'fk_tweet_hashtag_hashtag',
            'tweet_hashtag',
            'id_hashtag',
            'hashtag',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('tweet_hashtag');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
