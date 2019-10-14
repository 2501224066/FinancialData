<?php

namespace App\Console\Commands;

use App\Models\NewsJs;
use Illuminate\Console\Command;

// 金十新闻
class JinShi extends Command
{
    protected $signature = 'jinshi:get';

    protected $description = '抓取金十数据';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // 目标地址
        $url = "https://www.jin10.com/flash_newest.js";
        $list = json_decode(trim(substr(file_get_contents($url), 13), ';'));
    
        foreach ($list as $v) {
            if(!isset($v->data->content)){
                continue;
            }
            
            NewsJs::updateOrCreate([
                'seq' => $v->id
            ], [
                'content' => $v->data->content,
                'color' => $v->important == 0 ? 1 : 2,
                'time' => date_format(date_create($v->time), 'Y-m-d h:i:s')
            ]);
        }
    }
}
