<?php

use yii\db\Migration;

class m161130_164306_CreateTableUserUser extends Migration
{
    public function up()
    {
         $this->createTable('user_user',[
            'id_user1' => $this->integer()->notNull(),
            'id_user2' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'fk_user_user_user1',
            'user_user',
            'id_user1',
            'user',
            'id'
        );

        $this->addForeignKey(
            'fk_user_user_user2',
            'user_user',
            'id_user2',
            'user',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('user_user');
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
