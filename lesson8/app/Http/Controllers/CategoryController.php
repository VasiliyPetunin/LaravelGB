<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('news.categories', [
            'categories' => Categories::query()->paginate(10)
        ]);
    }

    public function show($slug) {
        $category = Categories::query()->where('slug', '=', $slug)->first();

        return view('news.category', [
            'category' => $category,
            'news' => News::query()->where('category_id', '=', $category->id)->paginate(5)
        ]);
    }
}
