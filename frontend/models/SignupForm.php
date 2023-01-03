<?php

namespace frontend\models;

use common\models\Profile;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $numcontribuinte;
    public $telemovel;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este nome de utilizador já existe.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este email já foi introduzido por outro utilizador .'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            [['telemovel','numcontribuinte'],'unique','targetClass'=>'\common\models\Profile','message'=>'O campo telemóvel ou numcontribuinte 
            já foram usados por outros utilizadores'],
            [['telemovel','numcontribuinte'],'required'],
            ['telemovel','string','min'=>9,'max'=>9],
            ['numcontribuinte','string','min'=>9,'max'=>9],
            [['telemovel','numcontribuinte'],'integer'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        $user = new User();

        if (!$this->validate()) {return false;}
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->status=10;
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $profile=new Profile();
        $profile->numcontribuinte=$this->numcontribuinte;
        $profile->telemovel=$this->telemovel;
        $profile->estado=1;
        //dd($profile,$user);
        // the following three lines were added:
        $auth = \Yii::$app->authManager;
        $authorRole = $auth->getRole('cliente');

        //Verificar se o utilizador e o perfil estão válidos para serem introduzidos na base de dados
        if(!$user->validate()||!$profile->validate()){
            return false;

        }
        //Salvar utilizador e perfil
        if($user->save()){

            //Atribuir o id de utilizador ao role a ao perfil depois do utilizador ser salvo
            $auth->assign($authorRole,$user->getId());

            $profile->user_id=$user->getId();

            /* Depois de passar na validação acima e o
             perfil não se salvo tive de contrariar quando
             dou save ao perfil e meter falso para o mesmo guardar */
            $profile->save(false);

            return true;
        }
        else{
            return false;
        }

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
