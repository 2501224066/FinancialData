<?php

namespace App\Console\Commands;

use App\Models\NewsDfcf;
use Illuminate\Console\Command;

// 东方财富新闻
// 通过采集不同链接获取不同分类数据
class DongFangCaiFu extends Command
{
    protected $signature = 'dongfangcaifu:get';

    protected $description = '抓取东方财富新闻';

    protected $newsDfcf;

    // 地址与分类
    protected $address_classify = [
        'http://newsapi.eastmoney.com/kuaixun/v1/getlist_102_ajaxResult_50_1_201910101256879319.html?r=0.' => '全球直播',
        'http://newsapi.eastmoney.com/kuaixun/v1/getlist_zhiboall_ajaxResult_70_1_.html?r=0.' => '股市直播',
        'http://newsapi.eastmoney.com/kuaixun/v1/getlist_103_ajaxResult_50_1_.html?r=0.' => '上市公司',
        'http://newsapi.eastmoney.com/kuaixun/v1/getlist_105_ajaxResult_50_1_.html?r=0.' => '全球股市',
        'http://newsapi.eastmoney.com/kuaixun/v1/getlist_106_ajaxResult_50_1_.html?r=0.' => '商品',
        'http://newsapi.eastmoney.com/kuaixun/v1/getlist_107_ajaxResult_50_1_.html?r=0.' => '外汇',
        'http://newsapi.eastmoney.com/kuaixun/v1/getlist_108_ajaxResult_50_1_.html?r=0.' => '基金',
        'http://newsapi.eastmoney.com/kuaixun/v1/getlist_109_ajaxResult_50_1_.html?r=0.' => '基金'
    ];

    public function __construct(NewsDfcf $newsDfcf)
    {
        parent::__construct();
        $this->newsDfcf = $newsDfcf;
    }

    public function handle()
    {
        foreach ($this->address_classify as $address => $classify) {
            $url = $address . randNum(16) . "&_=" . getMillisecond();
            $list = json_decode(substr(file_get_contents($url), 15))->LivesList;

            // 全球直播插入更新数据，其他地址仅更新分类
            if ($classify == '全球直播') {
                foreach ($list as $v) {
                    $this->newsDfcf->updateOrCreate([
                        'seq' => $v->id
                    ], [
                        'title' => $v->title,
                        'content' => substr($v->digest, strpos($v->digest, '】') + 3),
                        'color' => $v->titlestyle == 0 ? 1 : 2,
                        'time' => $v->showtime,
                        'classify' => $classify
                    ]);
                }
            } else {
                foreach ($list as $v) {
                    $this->newsDfcf->where('seq', $v->id)->update([
                        'classify' => $classify
                    ]);
                }
            }
        }
    }
}
