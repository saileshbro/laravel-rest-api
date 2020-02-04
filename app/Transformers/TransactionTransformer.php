<?php

namespace App\Transformers;

use App\Transaction;
use League\Fractal\TransformerAbstract;

class TransactionTransformer extends TransformerAbstract
{
    public $transformer = TransactionTransformer::class;

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
     * @param Transaction $transaction
     * @return array
     */
    public function transform(Transaction $transaction)
    {
        return [
            "identifier" => (int)$transaction->id,
            "stocks" => (int)$transaction->quantity,
            'buyer' => (int)$transaction->buyer_id,
            "product" => (int)$transaction->product_id,
            "creationDate" => $transaction->created_at,
            "lastChanged" => $transaction->updated_at,
            "deletedDate" => isset($transaction->deleted_at) ? (string)$transaction->deleted_at : null,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            "identifier" => "id",
            "stocks" => "quantity",
            'buyer' => "buyer_id",
            "product" => "product_id",
            "creationDate" => "created_at",
            "lastChanged" => "updated_at",
            "deletedDate" => "updated_at",
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
