<?php

namespace App\Models;

use App\Models\Categories;
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

        //TODO вернуть массив новостей из файла

        return json_decode(File::get(storage_path() . '/news.json'), true);




    }

    public function createIdForNewNews() {
        return count($this->getNews()) + 1;
    }

    public function getNewsByCategorySlug($slug) {
        $id = $this->category->getCategoryIdBySlug($slug);
        return $this->getNewsByCategoryId($id);
    }

    public function getNewsByCategoryId($id) {
        $news = [];
        foreach ($this->getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getNewsById($id)
    {
          return $this->getNews()[$id] ?? [];
    }
}
