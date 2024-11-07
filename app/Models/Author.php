<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'author';
    protected $fillable=[
        'Nome'
    ];
    public function books()
    {
        return $this->hasOne(Book::class);
    }
}
