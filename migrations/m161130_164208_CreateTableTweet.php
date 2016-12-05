<?php

use yii\db\Migration;

class m161130_164208_CreateTableTweet extends Migration
{
    public function up()
    {
        $this->createTable('tweet', [
            'id' => $this->primaryKey(),
            'texto' => $this->text()->notNull(),

            'id_user' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'fk_tweet_user',
            'tweet',
            'id_user',
            'user',
            'id'
        );
    }

    public function down()
    {
       $this->dropTable('tweet');
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
