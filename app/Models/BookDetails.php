<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetails extends Model
{
    use HasFactory;
    protected $table = 'book_details';
    protected $fillable=[
        'isbn',
        'summary',
        'page_count',
        'edition'
    ];
   
}
