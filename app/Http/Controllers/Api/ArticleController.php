<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

use App\Services\ArticleService;
class ArticleController extends Controller
{
    protected $service;

    public function __construct(ArticleService $service) {
        $this->service = $service;
    }

    public function show(Request $request) {
//        $slug = $request->get('slug');
//        $articles = Article::findBySlug($slug);
        $articles = $this->service->getArticleBySlug($request);
        return new ArticleResource($articles);
    }

    public function viewsIncrement(Request $request) {
//        $slug = $request->get('slug');
//        $articles = Article::findBySlug($slug);
        $articles = $this->service->getArticleBySlug($request);

        $articles->state->increment('views');
        return new ArticleResource($articles);
    }

    public function likesIncrement(Request $request) {
//        $slug = $request->get('slug');
//        $articles = Article::findBySlug($slug);
        $articles = $this->service->getArticleBySlug($request);

        $inc = $request->get('increment');
        $inc ? $articles->state->increment('likes') : $articles->state->decrement('likes');
        return new ArticleResource($articles);
    }
}
