<?php

namespace App\Console\Commands;

use App\Models\NewsDfcf;
use Illuminate\Console\Command;

// 东方财富新闻
class DongFangCaiFu extends Command
{
    protected $signature = 'dongfangcaifu:get';

    protected $description = '抓取东方财富新闻';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // 目标地址
        $url = "http://newsapi.eastmoney.com/kuaixun/v1/getlist_102_ajaxResult_50_1_201910101256879319.html?r=0." . randNum(16) . "&_=" . getMillisecond();
        $list = json_decode(substr(file_get_contents($url), 15))->LivesList;

        foreach ($list as $v) {
            NewsDfcf::updateOrCreate([
                'seq' => $v->id
            ], [
                'title' => $v->title,
                'content' => trim(substr($v->digest, strpos($v->digest, '】')), '】'),
                'color' => $v->titlestyle == 0 ? 1 : 2,
                'time' => $v->showtime
            ]);
        }
    }
}
