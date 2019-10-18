<?php

namespace App\Http\Repositories;

use App\Models\NewsDfcf;
use App\Models\NewsJs;
use App\Models\NewsThs;
use App\Models\NewsXl;
use App\Models\NewsYcj;

class NewsRepository
{

    protected $newsDfcf;
    protected $jinshi;
    protected $tonghuashun;
    protected $xinlang;
    protected $yuncaijng;

    public function __construct(
        NewsDfcf $dongfangcaifu,
        NewsJs $jinshi,
        NewsThs $tonghuashun,
        NewsXl $xinlang,
        NewsYcj $yuncaijng
    ) {
        $this->dongfangcaifu = $dongfangcaifu;
        $this->jinshi = $jinshi;
        $this->tonghuashun = $tonghuashun;
        $this->xinlang = $xinlang;
        $this->yuncaijng = $yuncaijng;
    }

    // 获取新闻
    public function getNews($site, $classify)
    {
        $query = $this->{$site}->orderBy('created_at', 'DESC');

        if ($classify != null) {
            $query = $query->where('classify', $classify);
        }

        return $query->paginate(config('services.news.page_num'));
    }
}
