<?php

namespace frontend\controllers;

// use common\models\Post;
use frontend\resource\Post;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class PostController extends ActiveController
{
    public $modelClass = Post::class;

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];

        return $behaviors;
    }
}