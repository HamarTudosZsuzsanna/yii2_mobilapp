<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int|null $player_id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $created_at
 *
 * @property Players $player
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{

    /**
     * ENUM field values
     */
    const ROLE_ADMIN = 'admin';
    const ROLE_PLAYER = 'player';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['player_id'], 'default', 'value' => null],
            [['player_id'], 'integer'],
            [['username', 'email', 'password', 'role'], 'required'],
            [['role'], 'string'],
            [['created_at'], 'safe'],
            [['username'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 255],
            ['role', 'in', 'range' => array_keys(self::optsRole())],
            [['player_id'], 'exist', 'skipOnError' => true, 'targetClass' => Players::class, 'targetAttribute' => ['player_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'player_id' => 'Player ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Player]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlayer()
    {
        return $this->hasOne(Players::class, ['id' => 'player_id']);
    }


    /**
     * column role ENUM value labels
     * @return string[]
     */
    public static function optsRole()
    {
        return [
            self::ROLE_ADMIN => 'admin',
            self::ROLE_PLAYER => 'player',
        ];
    }

    /**
     * @return string
     */
    public function displayRole()
    {
        return self::optsRole()[$this->role];
    }

    /**
     * @return bool
     */
    public function isRoleAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function setRoleToAdmin()
    {
        $this->role = self::ROLE_ADMIN;
    }

    /**
     * @return bool
     */
    public function isRolePlayer()
    {
        return $this->role === self::ROLE_PLAYER;
    }

    public function setRoleToPlayer()
    {
        $this->role = self::ROLE_PLAYER;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
