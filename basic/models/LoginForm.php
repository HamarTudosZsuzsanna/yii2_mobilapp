<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;

    private $_user;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }
        return false;
    }

    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Users::findOne(['username' => $this->username]);
        }

        if ($this->_user && $this->_user->validatePassword($this->password)) {
            return $this->_user;
        }

        $this->addError('password', 'Hibás felhasználónév vagy jelszó.');
        return null;
    }
}
