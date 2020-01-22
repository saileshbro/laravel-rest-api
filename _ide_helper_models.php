<?php

// @formatter:off

/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App {
    /**
     * App\Seller
     *
     * @property int $id
     * @property string $name
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string $password
     * @property string|null $remember_token
     * @property string $verified
     * @property string|null $verification_token
     * @property string $admin
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
     * @property-read int|null $products_count
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereAdmin($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereVerificationToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereVerified($value)
     */
    class Seller extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\User
     *
     * @method has(string $string)
     * @property int $id
     * @property string $name
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string $password
     * @property string|null $remember_token
     * @property string $verified
     * @property string|null $verification_token
     * @property string $admin
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAdmin($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereVerificationToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereVerified($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
     */
    class User extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\Transaction
     *
     * @property Product product
     * @property int $id
     * @property int $quantity
     * @property int $buyer_id
     * @property int $product_id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Buyer $buyer
     * @property-read \App\Product $product
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Transaction onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereBuyerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereProductId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereQuantity($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Transaction withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Transaction withoutTrashed()
     */
    class Transaction extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\Category
     *
     * @property int $id
     * @property string $name
     * @property string $description
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
     * @property-read int|null $products_count
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Category onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Category withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Category withoutTrashed()
     */
    class Category extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\Product
     *
     * @property int $id
     * @property string $name
     * @property string $description
     * @property int $quantity
     * @property string $status
     * @property string $image
     * @property int $seller_id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
     * @property-read int|null $categories_count
     * @property-read \App\Seller $seller
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Transaction[] $transactions
     * @property-read int|null $transactions_count
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Product onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereImage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereQuantity($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSellerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereStatus($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Product withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Product withoutTrashed()
     */
    class Product extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\Buyer
     *
     * @property int $id
     * @property string $name
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string $password
     * @property string|null $remember_token
     * @property string $verified
     * @property string|null $verification_token
     * @property string $admin
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Transaction[] $transactions
     * @property-read int|null $transactions_count
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereAdmin($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereVerificationToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Buyer whereVerified($value)
     */
    class Buyer extends \Eloquent
    {
    }
}

