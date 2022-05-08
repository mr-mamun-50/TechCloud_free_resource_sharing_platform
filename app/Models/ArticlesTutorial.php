<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlesTutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'subcategory_id', 'title', 'slug', 'post_date', 'description', 'image'
    ];

    //__Join with category
    public function category() {

    }
}
