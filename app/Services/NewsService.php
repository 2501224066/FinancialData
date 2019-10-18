<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Http\Request;
use App\Http\Repositories\NewsRepository;

class NewsService
{

    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    // 站点
    protected $site = [
        'dongfangcaifu' => '东方财富',
        'jinshi' => '金十',
        'tonghuashun' => '同花顺',
        'xinlang' => '新浪财经',
        'yuncaijing' => '云财经'
    ];

    // 东方财富分类
    protected $dongfangcaifu_classify = [
        1 => '股市直播',
        2 => '上市公司',
        3 => '全球股市',
        4 => '商品',
        5 => '外汇',
        6 => '债券',
        7 => '基金',
        8 => '其他'
    ];

    // 新浪分类
    protected $xinlang_classify = [
        1 => 'A股',
        2 => '行业',
        3 => '公司',
        4 => '数据',
        5 => '市场',
        6 => '观点',
        7 => '央行',
        8 => '其他'
    ];


    // 获取新闻
    public function getNews(Request $request)
    {
        $site = $this->getSite($request->site_id);
        $classify = $this->getClassify($request->site_id, $request->classify_id);
        return $this->newsRepository->getNews($site, $classify);
    }

    // 获取站点和分类
    public function getSiteAndClassify()
    {
        $site_id = 0;
        foreach ($this->site as $k => $v) {
            $data = [];
            $site_classify = $k . '_classify';
            $data['site'] = $v;
            $data['site_id'] = $site_id;
            if (isset($this->{$site_classify})) {
                $data['classify'] = $this->{$site_classify};
            }
            $siteAndClassify[]  = $data;
            $site_id++;
        }
        return $siteAndClassify;
    }

    // 取出站点
    public function getSite($site_id)
    {
        if ($site_id >= count($this->site)) {
            throw new Exception('站点不存在');
        }
        $site_key = array_keys($this->site);
        return $site_key[$site_id];
    }

    // 取出分类
    public function getClassify($site_id, $classify_id)
    {
        if ($classify_id == 0) {
            return null;
        }

        $site_key = array_keys($this->site);
        $site_name = $site_key[$site_id];
        $site_classify = $site_name . '_classify';
        if (isset($this->{$site_classify})) {
            if ($classify_id > count($this->{$site_classify})) {
                throw new Exception('分类不存在');
            }
        }

        return $this->{$site_classify}[$classify_id];
    }
}
