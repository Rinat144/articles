<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all()
    {
        $category = Category::paginate(5);

        return  CategoryResource::collection($category);
    }

    public function category(Category $id)
    {
        return new CategoryResource($id);
    }
}
