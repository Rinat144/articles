<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;
    protected $table = 'articles';
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');

    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_articles', 'articles_id', 'category_id');
    }

}
