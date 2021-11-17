<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(News $news)
    {

        return view('news.index')->with('news', $news->getNews());
    }

    public function show(News $news, $id)
    {
        return view('news.one')->with('news', $news->getNewsById($id));;
    }
}
