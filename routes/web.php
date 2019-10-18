<?php

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('/news/site_classify', 'NewsController@siteAndClassify'); // 获取新闻站点与分类
    $router->get('/news/{site_id:[0-9]}/{classify_id:[0-9]}', 'NewsController@index'); // 获取新闻

});
