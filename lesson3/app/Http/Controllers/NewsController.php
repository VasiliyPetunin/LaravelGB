<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index() {
        $news = News::getNews();

        return view('news.index')->with('news', $news);
    }

    public function show($id) {
        $news = News::getNewsById($id);

        return view('news.oneNews')->with('news', $news);;
    }

    public function addNews() {
        return view('news.addNews');
    }
}
