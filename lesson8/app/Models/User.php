<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rules(User $user)
    {
        return [
            'name' => 'required|string|max:30',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user)
            ],
            'newPassword' => 'required|string|min:3'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Пользователь не может быть без имени.',
            'name.max' => 'Имя пользователя слишком длинное.',
            'name.string' => 'Имя пользователя должно состоять из букв.',
            'email.required' => 'Пользователь не может не иметь email.',
            'email.email' => 'Email должен соответствовать шаблону вида ABC@DEF.GHI',
            'email.unique' => 'Под данной почтой зарегистрирован другой пользователь.',
            'newPassword.required' => 'Поле :attribute обязательно для заполнения.',
            'newPassword.string' => 'Новый пароль должен являться строкой.',
            'newPassword.min' => 'Поле :attribute не может состоять менее чем из 3-х символов.'
        ];
    }

    public function attributeName()
    {
        return [
            'newPassword' => '"Новый пароль"'
        ];
    }
}
