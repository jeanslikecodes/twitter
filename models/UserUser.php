<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_user".
 *
 * @property integer $id_user1
 * @property integer $id_user2
 *
 * @property User $idUser1
 * @property User $idUser2
 */
class UserUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user1', 'id_user2'], 'required'],
            [['id_user1', 'id_user2'], 'integer'],
            [['id_user1'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user1' => 'id']],
            [['id_user2'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user2' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user1' => 'Id User1',
            'id_user2' => 'Id User2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser1()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser2()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user2']);
    }
}
