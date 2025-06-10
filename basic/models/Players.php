<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "players".
 *
 * @property int $id
 * @property string $name
 * @property string $birthday
 * @property string $address
 * @property string $email
 * @property string $license
 * @property int $number
 * @property string $created_at
 *
 * @property Users[] $users
 */
class Players extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'players';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'birthday', 'address', 'email', 'license', 'number'], 'required'],
            [['number'], 'integer'],
            /*[['created_at'], 'safe'],*/
            /*[['created_at'], 'default', 'value' => date('Y-m-d H:i:s')],*/
            [['birthday'], 'date', 'format' => 'php:Y.m.d'],
            [['email'], 'email'],
            [['name', 'birthday', 'address', 'email', 'license'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Név',
            'birthday' => 'Születési dátum',
            'address' => 'Lakcím',
            'email' => 'Email',
            'license' => 'Licensz-szám',
            'number' => 'Mezszám',
            'created_at' => 'Létrehozva',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::class, ['player_id' => 'id']);
    }

}
