<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Doctors extends Model
{
    use HasAttributes, HasFactory, Notifiable;

    protected $connection = 'mysql_logic';


    protected $table = 'Doctors';
    protected $primaryKey = 'idDoctor';
    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'nameDoctor',
        'lastnameDoctor',
        'emailDoctor',
        'phoneDoctor',
        'descriptionDoctor'
    ];

}
