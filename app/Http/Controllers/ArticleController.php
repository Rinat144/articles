<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function all()
    {
        $article = Article::paginate(5);

        return ArticleResource::collection($article);
    }

    public function search(ArticleRequest $request)
    {
        $data = $request->validated();

        if (isset($data['name'])) {
            $article = Article::where('name', $data['name'])->first();

            return new ArticleResource($article);
        }

        if (isset($data['category'])) {
        $articles = Category::leftJoin('category_articles', 'categories.id', '=', 'category_articles.category_id')
            ->leftJoin('articles', 'category_articles.articles_id', '=', 'articles.id')
            ->where('categories.name', '=', $data['category'])
            ->get();

            return ArticleResource::collection($articles);
        }

        if (isset($data['author'])) {
            $articles = Author::leftJoin('articles', 'authors.id', '=', 'articles.author_id')
                ->where('authors.name', '=', $data['author'])
                ->get();

            return ArticleResource::collection($articles);
        }
    }


    public function article(Article $id)
    {
        return new ArticleResource($id);
    }
}
