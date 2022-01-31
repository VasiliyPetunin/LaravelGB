<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'text', 'isPrivate', 'category_id', 'link'];

    public function rules() {
        return [
            'title' => 'required|min:5|max:50',
            'text' => 'required|min:5',
            'category_id' => "required|exists:App\Models\Categories,id",
            'isPrivate' => 'boolean',
            'image' => 'mimes:jpeg,bmp,png|max:1000'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Поле :attribute обязательно для заполнения.',
            'title.max' => 'Поле :attribute не может иметь такого длинного названия.',
            'title.min' => 'Поле :attribute должно иметь более длинное название.',
            'text.required' => 'Поле :attribute не может быть пустым.',
            'text.min' => 'Поле :attribute не может быть такого размера.',
            'isPrivate.boolean' => 'Данные в поле :attribute некорректны.',
            'image.mimes' => 'Поле :attribute не может содержать в себе файл такого формата.',
            'image.max' => 'Поле :attribute имеет слишком большой вес файла.'
        ];
    }

    public function attributeName() {
        return [
            'title' => '"Заголовок новости"',
            'text' => '"Текст новости"',
            'category_id' => '"Категория новости"',
            'isPrivate' => 'Приватность',
            'image' => '"Изображение"'
        ];
    }
}
