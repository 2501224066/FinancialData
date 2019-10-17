<?php

namespace App\Console\Commands;

use App\Models\NewsXl;
use Illuminate\Console\Command;

// 新浪财经
class XinLang extends Command
{
    protected $signature = 'xinlang:get';

    protected $description = '抓取新浪财经';

    protected $newsXl;

    public function __construct(NewsXl $newsXl)
    {
        parent::__construct();
        $this->newsXl = $newsXl;
    }

    public function handle()
    {
        // 目标地址
        $url = "http://zhibo.sina.com.cn/api/zhibo/feed?callback=jQuery111204493863092791318_1570786067470&page=1&page_size=20&zhibo_id=152&tag_id=0&dire=f&dpc=1&pagesize=20&id=1432915&type=0&_=" . getMillisecond();
        $list =  json_decode('{' . trim(substr(file_get_contents($url), 45), ');} catch (e) {};') . '}}}}')->result->data->feed->list;

        foreach ($list as $v) {
            $this->newsXl->updateOrCreate([
                'seq' => $v->id
            ], [
                'content' => $v->rich_text,
                'color' => json_decode($v->ext)->needPush ? 2 : 1,
                'time' => $v->create_time
            ]);
        }
    }
}
