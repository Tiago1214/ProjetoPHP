<?php

namespace frontend\controllers;

use common\models\Artigo;
use common\models\Categoria;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yiiunit\extensions\bootstrap5\data\User;

/**
 * Site controller
 */
class TesteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}