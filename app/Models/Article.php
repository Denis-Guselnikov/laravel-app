<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'img', 'slug'];  //Указываются поля которые доступны при массовом заполнении

    //protected $guarded = [];  // Противоположность $fillable

    // Один ко Многим (Статья может иметь много комментариев)
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    // Один к Одному (взаимоотношение Статистики)
    public function state() {
        return $this->hasOne(State::class);
    }

    //Многие ко Многим ()
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    //Возвращает преобразованное поле body - первые 100 символов
    public function getBodyPreview(): string
    {
        return Str::limit($this->body, 100);
    }

    //Возвращает время когда статья была создана
    //Php есть встроенная библиотека Carbon для работы с датой и временем, она уже встроена в Laravel
    public function createdAtForHumans() {
        return $this->created_at->diffForHumans();
    }

    public function scopeLastLimit($query, $numbers)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->limit($numbers)->get();
    }

}
