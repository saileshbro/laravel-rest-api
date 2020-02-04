<?php

namespace App;

use App\Transformers\UserTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $dates = ['deleted_at'];
    protected $table = 'users';
    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';
    const ADMIN_USER = 'true';
    const REGULAR_USER = "false";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $transformer = UserTransformer::class;
    protected $fillable = [
        'name', 'email', 'password', 'verified',
        'verification_token',
        'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'verification_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isVerified()
    {
        return $this->verified === User::VERIFIED_USER;
    }

    public function isAdmin()
    {
        return $this->admin === User::ADMIN_USER;
    }

    public static function generateVerificationCode()
    {
        return Str::random(40);
    }

    /**
     * Mutator for setting name
     * @param $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtolower($name);
    }

    /**
     * Accessor for retriving name
     * @param $name
     * @return string
     */
    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    /**
     * Mutator for setting name
     * @param $email
     */
    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = strtolower($email);
    }
}
