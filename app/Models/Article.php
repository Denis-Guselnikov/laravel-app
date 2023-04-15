<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
