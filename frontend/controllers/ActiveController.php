<?php

namespace frontend\controllers;

use frontend\resource\Post;
use frontend\resource\Comment;
use yii\filters\auth\HttpBearerAuth;
use yii\web\ForbiddenHttpException;

class ActiveController extends \yii\rest\ActiveController
{

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['only'] = ['create', 'update', 'delete'];
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];

        return $behaviors;
    }

    /**
     * @param string $action
     * @param Post | Comment $model
     * @param array $params
     * @return void
     * @throws ForbiddenHttpException
     */
    public function checkAccess($action, $model = null, $params = []): void
    {
        if(in_array($action, ['update', 'delete']) && $model->created_by !== \Yii::$app->user->id) {
            throw new ForbiddenHttpException("You don not have permission to change this record !");
        }
    }
}

