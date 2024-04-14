<?php

namespace frontend\resource;


use yii\db\ActiveQuery;

class Comment extends \common\models\Comment
{
    /*
    public function fields(): array
    {
        return ['id','title', 'body', 'post_id'];
    } */

    public function extraFields()
    {
        return ['post'];
    }

    /**
     * @return ActiveQuery
     */
    public function getPost(): ActiveQuery
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
}