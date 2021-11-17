<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class News
{
    private Categories $category;

    public function __construct(Categories $category)
    {
        $this->category = $category;
    }


    public function getNews()
    {
        return DB::table('news')->get();
    }

    public function getNewsByCategorySlug($slug) {
        $id = $this->category->getCategoryIdBySlug($slug);
        return $this->getNewsByCategoryId($id);
    }

    public function getNewsByCategoryId($id) {
        $news = [];
        foreach ($this->getNews() as $item) {
            if ($item->category_id == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getNewsById($id)
    {
//          return $this->getNews()[$id] ?? [];
        return DB::table('news')->where('id', $id)->first();
    }
}
