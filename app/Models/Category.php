<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;
    protected $table = 'categories';

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'category_articles', 'articles_id', 'category_id');
    }


}
