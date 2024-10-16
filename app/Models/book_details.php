<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_details extends Model
{
    use HasFactory;
    protected $fillable=[
        'isbn',
        'summary',
        'page_count',
        'edition'
    ];
}
