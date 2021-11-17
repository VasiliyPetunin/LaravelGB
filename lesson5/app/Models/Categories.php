<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Categories
{
//    private $categories = [
//        1 => [
//            'id' => 1,
//            'title' => 'Спорт',
//            'slug' => 'sport'
//        ],
//        2 => [
//            'id' => 2,
//            'title' => 'Политика',
//            'slug' => 'politics'
//        ],
//        3 => [
//            'id' => 3,
//            'title' => 'Covid19',
//            'slug' => 'covid'
//        ],
//
//    ];

    public function getCategories() {
//        return $this->categories;
        return DB::table('categories')->get();
    }

    public function getCategoryNameBySlug($slug) {
        $id = $this->getCategoryIdBySlug($slug);
        $category = $this->getCategoryById($id);
        return $category->title ?? "";
    }

    public function getCategoryIdBySlug($slug) {
        $id = null;
        foreach ($this->getCategories() as $category) {
            if ($category->slug == $slug) {
                $id = $category->id;
                break;
            }
        }
        return $id;
    }

    public function getCategoryById($id)
    {
//        return $this->getCategories()[$id] ?? [];
        return DB::table('categories')->where('id', $id)->first();
    }
}
