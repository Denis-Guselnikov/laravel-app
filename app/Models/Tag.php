<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['label'];

    public $timestamps =false;

    //Многие ко Многим ()
    public function articles() {
        return $this->belongsToMany(Article::class);
    }
}
