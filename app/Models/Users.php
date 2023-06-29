<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = ['nome', 'endereco', 'idade', 'telefone'];
    protected $table = 'usuarios';
    public $timestamps = true;
}
