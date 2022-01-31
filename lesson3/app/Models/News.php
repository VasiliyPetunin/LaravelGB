<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private static $news = [
        [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'category_id' => 1
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости(((',
            'category_id' => 2
        ]
    ];

    public static function getNews() {
        return static::$news;
    }

//    Реализация предполагает отсортированное по идентификатору(по возрастанию) хранение данных в $news
    public static function getNewsById($id) {
        return static::$news[(int)$id - 1];
    }

    public static function getNewsByCategoryId($id) {
        $newsInCategory = [];

        foreach (static::$news as $item) {
            if ((int)$id === $item['category_id']) {
                $newsInCategory[] = $item;
            }
        }

        return $newsInCategory;
    }
}
