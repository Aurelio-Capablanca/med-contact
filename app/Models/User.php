<?php

namespace App\Models;


use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasAttributes ,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = 'users';
    /**
     * @var string
     */
    protected $primaryKey = 'user_id';
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var bool
     */
    public $incrementing = true;
    /**
     * @var string
     */
    protected $keyType = 'int';
    /**
     * @var string
     */
    protected $authPasswordName = 'passUser';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'nameUsers',
        'lastnameUsers',
        'emailUser',
        'passUser',
        'typeUser'
    ];

    /**
     * @return mixed|string
     */
    public function getAuthPassword()
    {
        return $this->passUser;
    }

    /**
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'user_id';
    }

    /**
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->user_id;
    }
}
