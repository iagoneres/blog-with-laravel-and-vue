<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Article;

/**
 * Class ArticleTransformer.
 *
 * @package namespace App\Transformers;
 */
class ArticleTransformer extends TransformerAbstract
{
    /**
     * Transform the Article entity.
     *
     * @param \App\Entities\Article $model
     *
     * @return array
     */
    public function transform(Article $model)
    {
        if(isset($model->user)) {
            $author = [
                'id'    => $model->user->id,
                'name'  => $model->user->name
            ];
        }

        return [
            'id'            => (int) $model->id,

            'title'         => $model->title,
            'description'   => $model->description,
            'content'       => $model->conttent,
            'author'        => $author,

            'created_at' => $model->created_at->toDateTimeString(),
            'updated_at' => $model->updated_at->toDateTimeString()
        ];
    }
}
