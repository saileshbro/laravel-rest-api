<?php

namespace App\Transformers;

use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @param Category $category
     * @return array
     */
    public function transform(Category $category)
    {
        return [
            "identifier" => (int)$category->id,
            "title" => (string)$category->name,
            "details" => (string)$category->description,
            "creationDate" => $category->created_at,
            "lastChanged" => $category->updated_at,
            "deletedDate" => isset($category->deleted_at) ? (string)$category->deleted_at : null,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            "identifier" => "id",
            "title" => "name",
            "details" => "description",
            "creationDate" => "created_at",
            "lastChanged" => "updated_at",
            "deletedDate" => "updated_at",
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
