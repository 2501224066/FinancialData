<?php

namespace App\Console\Commands;

use App\Models\NewsYcj;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

// 云财经
class YunCaiJIng extends Command
{
    protected $signature = 'yuncaijing:get';

    protected $description = '云财经';

    protected $newsYcj;

    public function __construct(NewsYcj $newsYcj)
    {
        parent::__construct();
        $this->newsYcj = $newsYcj;
    }

    public function handle()
    {
        // 目标地址
        $url = "https://www.yuncaijing.com/news/get_push_detail/yapi/api_v5.html";
        //伪造浏览器UA
        $headers = [
            'user-agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36',
        ];
        $client = new Client([
            'timeout' => 20,
            'headers' => $headers
        ]);

        // 最近的数据唯一标识
        $id = $this->newsYcj->orderBy('created_at', 'DESC')->first()->seq;

        // 以最近标识 +300 为范围采集
        for ($i = ($id + 1); $i < ($id + 300); $i++) {
            $response = $client->request('POST', $url, [
                'form_params' => ['id' => $i]
            ])->getBody()->getContents();
            $data = json_decode($response)->data;
           
            if (empty($data)) {
                continue;
            }

            $this->newsYcj->updateOrCreate([
                'seq' => $data->id
            ], [
                'title' => $data->title,
                'content' => substr($data->description, 15),
                'color' => $data->push_live == 0 ? 1 : 2,
                'time' => $data->time
            ]);
        }
    }
}
