<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Categories $categories) {
        return view('news.categories', [
            'categories' => $categories->getCategories()
        ]);
    }

    public function show(News $news, Categories $categories, $slug) {
        return view('news.category', [
            'category' => $categories->getCategoryNameBySlug($slug),
            'news' => $news->getNewsByCategorySlug($slug)
        ]);
    }
}
