<?php

use yii\db\Migration;

class m161130_164201_CreateTableUser extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'perfil' => $this->text(),

            'password_hash' => $this->string()->notNull(),
            
            'access_token' => $this->string()->notNull(),
            'auth_key' =>$this->string()->notNull()
        ]);

    }

    public function down()
    {
        $this->dropTable('user');
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
