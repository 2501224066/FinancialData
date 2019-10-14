<?php

// 13位时间戳
function getMillisecond(): float
{
    list($t1, $t2) = explode(' ', microtime());
    return (float) sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
}

// 随机数
function randNum(int $long): string
{
    $num = '';
    for ($i = 0; $i < $long; $i++) {
        if ($i == 0) {
            $num .= mt_rand(1, 9);
        } else {
            $num .= mt_rand(0, 9);
        }
    }
    return $num;
}
