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

    // 地址与分类
    protected $address_classify = [
        'http://zhibo.sina.com.cn/api/zhibo/feed?callback=jQuery111201637687478826635_1571295677746&page=1&page_size=20&zhibo_id=152&tag_id=1&dire=f&dpc=1&pagesize=20&_=' => 'A股',
        'http://zhibo.sina.com.cn/api/zhibo/feed?callback=jQuery1112031984354606647725_1571295751298&page=1&page_size=20&zhibo_id=152&tag_id=2&dire=f&dpc=1&pagesize=20&_=' => '行业',
        'http://zhibo.sina.com.cn/api/zhibo/feed?callback=jQuery111205872256794322329_1571295808224&page=1&page_size=20&zhibo_id=152&tag_id=3&dire=f&dpc=1&pagesize=20&_=' => '公司',
        'http://zhibo.sina.com.cn/api/zhibo/feed?callback=jQuery111209579567493927382_1571295861817&page=1&page_size=20&zhibo_id=152&tag_id=4&dire=f&dpc=1&pagesize=20&_=' => '数据',
        'http://zhibo.sina.com.cn/api/zhibo/feed?callback=jQuery111202696601762185641_1571295914428&page=1&page_size=20&zhibo_id=152&tag_id=5&dire=f&dpc=1&pagesize=20&_=' => '市场',
        'http://zhibo.sina.com.cn/api/zhibo/feed?callback=jQuery1112043210724690187796_1571295947688&page=1&page_size=20&zhibo_id=152&tag_id=6&dire=f&dpc=1&pagesize=20&_=' => '观点',
        'http://zhibo.sina.com.cn/api/zhibo/feed?callback=jQuery1112012662438087867411_1571295973426&page=1&page_size=20&zhibo_id=152&tag_id=7&dire=f&dpc=1&pagesize=20&_=' => '央行',
        'http://zhibo.sina.com.cn/api/zhibo/feed?callback=jQuery111206936080264830701_1571295998769&page=1&page_size=20&zhibo_id=152&tag_id=8&dire=f&dpc=1&pagesize=20&_=' => '其他'
    ];

    public function __construct(NewsXl $newsXl)
    {
        parent::__construct();
        $this->newsXl = $newsXl;
    }

    public function handle()
    {
        foreach ($this->address_classify as $address => $classify) {
            // 目标地址
            $url = $address . getMillisecond();
            $res_data = file_get_contents($url);
            $list =  json_decode('{' . trim(substr($res_data, strpos($res_data, '(')), ');} catch (e) {};') . '}}}}')->result->data->feed->list;

            foreach ($list as $v) {
                $this->newsXl->updateOrCreate([
                    'seq' => $v->id
                ], [
                    'content' => trim($v->rich_text),
                    'color' => strpos(json_encode($v->tag, JSON_UNESCAPED_UNICODE), '焦点') ? 2 : 1,
                    'time' => $v->create_time,
                    'classify' => $classify
                ]);
            }
        }
    }
}
