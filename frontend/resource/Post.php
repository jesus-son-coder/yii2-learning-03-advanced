<?php

namespace frontend\resource;

use yii\db\ActiveQuery;

class Post extends \common\models\Post
{
    public function fields(): array
    {
        return ['id', 'title', 'body'];
    }

    public function extraFields(): array
    {
        return ['created_at', 'updated_at', 'created_by', 'comments'];
    }

    /**
     * @return ActiveQuery
     */
    public function getComments(): ActiveQuery
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }
}