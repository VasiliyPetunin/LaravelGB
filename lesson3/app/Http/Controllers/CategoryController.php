<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\NewsController;
use App\Models\News;

class CategoryController extends Controller
{
    public static function index() {
        return view('categoriesIndex')->with('categories', Category::getCategories());
    }

    public static function show($id) {
        return view('news.index')->with('news', News::getNewsByCategoryId($id));
    }
}
