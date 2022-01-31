<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $categories = [
        [
            'id' => 1,
            'title' => 'Politics'
        ],
        [
            'id' => 2,
            'title' => 'Sport'
        ]
    ];

    public static function getCategories() {
        return static::$categories;
    }
}
