<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $table = 'publisher';
    protected $fillable=[
        'Nome'
    ];
    public function books()
    {
        return $this->hasOne(Book::class);
    }
}
