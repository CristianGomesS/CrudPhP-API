<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;

    
    protected $fillable=[
        'titulo',
        'publisher_id',
        'author_id',
        'book_details_id',
        'is_delete'
    ];
}
