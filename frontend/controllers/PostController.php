<?php

namespace frontend\controllers;

// use common\models\Post;
use frontend\resource\Post;
use yii\rest\ActiveController;

class PostController extends ActiveController
{
    public $modelClass = Post::class;
}