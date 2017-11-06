<?php
/**
 * Created by PhpStorm.
 * User: Hayabusa
 * Date: 06.11.2017
 * Time: 17:23
 */

namespace app\controllers;


use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('/site/login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionTest()
    {
        $user = User::findOne(1);
        Yii::$app->user->logout();
        if(Yii::$app->user->isGuest)
        {
            echo "Пользователь Гость!";
        } else {
            echo "Welcome " . $user->name;
        }
    }
}