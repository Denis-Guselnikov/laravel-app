<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'body', 'article_id'];

    // Коментарий относится к Статье
    public function article() {
        return $this->belongsTo(Article::class);
    }

    public function createdAtForHumans()
    {
        return $this->created_at->diffForHumans();
    }
}
