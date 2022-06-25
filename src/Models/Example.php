<?php

namespace App\Models;

use PCore\Database\Models\Model;

class Example extends Model
{

    protected string $table = 'examples';

    protected array $fillable = [
        'title'
    ];

    protected array $cast = [
        'status' => 'integer'
    ];

    protected array $hidden = [
        'secret'
    ];

}