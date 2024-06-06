<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'productos';

    protected $fillable = [
        'nombre', 'apellido', 'edad', 'email'
    ];
}

