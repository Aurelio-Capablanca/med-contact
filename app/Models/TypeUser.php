<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{

    use HasAttributes, HasFactory, Notifiable;

    protected $table = 'typeUsers';
    protected $primaryKey = 'idTypeUsers';
    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['typeUser'];
}
