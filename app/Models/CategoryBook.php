<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBook extends Model
{
    use HasFactory;
    protected $table ='category_book';
    protected $fillable = ['id_category','id_book'];
    
}
