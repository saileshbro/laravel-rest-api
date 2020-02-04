<?php

namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
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
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            "identifier" => (int)$product->id,
            "title" => $product->name,
            "details" => $product->description,
            "stocks" => $product->quantity,
            "situation" => $product->status,
            "picture" => $product->image,
            "seller" => $product->seller_id,
            "creationDate" => $product->created_at,
            "lastChanged" => $product->updated_at,
            "deletedDate" => isset($product->deleted_at) ? (string)$product->deleted_at : null,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            "identifier" => "id",
            "stocks" => "quantity",
            "title" => "name",
            "situation" => "status",
            "details" => "description",
            "picture" => "image",
            "seller" => "seller_id",
            "creationDate" => "created_at",
            "lastChanged" => "updated_at",
            "deletedDate" => "updated_at",
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
