<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;


    protected $fillable = [
        'titulo',
        'publisher_id',
        'author_id',
        'book_details_id',
        'is_delete'
    ];
    public function publisher()
    {
        return  $this->belongsTo(Publisher::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function bookDetails()
    {
        return $this->belongsTo(BookDetails::class);
    }
    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_book', 'book_id', 'category_id');
    }
}
