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

    // 获取新闻
    public function index(Request $request)
    {
        $news_list = $this->newsService->getNews($request);
        return $this->success(['news_list' => $news_list]);
    }

    // 获取站点和分类
    public function siteAndClassify()
    {
        $site_classify = $this->newsService->getSiteAndClassify();
        return $this->success(['site_classify' => $site_classify]);
    }
}
