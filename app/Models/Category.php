<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable=[
        'Nome'
    ];

    public function books()
    {
        return $this->belongsToMany(CategoryBook::class, 'category_book', 'category_id','category_book_id');
    }
}
