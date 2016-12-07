<?php

namespace app\models;

// use app\models\validators\Filters;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $password;
    public $repeatPassword;
    public $email;
    public $perfil;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // todos os campos são obrigatórios
            [['username', 'email', 'password', 'repeatPassword'], 'required'],

            // nome de usuário deve ter apenas letras e numeros, iniciando por uma letra, e ter
            // no mínimo 4 caracteres
            [['username'], 'match', 'pattern' => '/[A-Za-z][A-Za-z0-9_]{3,}/'],

            // nome do usuário deve ser único
            [['username'],'userExists'],

            // password and repeatPassword must be equal
            [['repeatPassword'], 'compare', 'compareAttribute' => 'password'],

        ];
    }

    public function userExists($attribute){
        if(User::findByUsername($this->$attribute)){
            $this->addError($attribute,'O usuário já foi utilizado.');
        }
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Senha',
            'repeatPassword' => 'Repetir a Senha',
            'email' => 'Digite seu Email',
            'perfil' => 'Conte um pouco sobre você',
        ];
    }

    public function register()
    {

        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->perfil = $this->perfil;
            
            $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            $user->access_token = Yii::$app->getSecurity()->generateRandomString();
            $user->auth_key = Yii::$app->getSecurity()->generateRandomString();
            if ($user->save()) {
                Yii::$app->user->login($user, 3600 * 24 * 30);
                return true;
            }
            return false;
        }
        return false;
    }
}
