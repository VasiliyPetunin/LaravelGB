<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(News $news)
    {
        return view('news.index')->with('news', News::query()->paginate(5));
    }

    public function show(News $news)
    {
        return view('news.one')->with('news', $news);
    }
}
