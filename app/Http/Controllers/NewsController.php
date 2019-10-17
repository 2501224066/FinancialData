<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\NewsService;

class NewsController extends Controller
{

    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index(Request $request)
    {
        $news_list = $this->newsService->getNews($request);
        return $this->success(['news_list' => $news_list]);
    }
}
