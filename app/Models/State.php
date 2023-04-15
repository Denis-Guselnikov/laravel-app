<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['lickes', 'views', 'article_id'];

    public $timestamps = false;

    // Отношение тут не указывается, будем доставать Статистику из Статьи
    // Никогда не будем доставать Статью из Статистики
}
