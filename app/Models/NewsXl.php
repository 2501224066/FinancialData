<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



/**
 * App\Models\NewsXl
 *
 * @property int $id
 * @property string $seq 唯一标记
 * @property string $content 内容
 * @property int $color 显示颜色 1=黑色 2=红色
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsXl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsXl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsXl query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsXl whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsXl whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsXl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsXl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsXl whereSeq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsXl whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NewsXl extends Model
{
    
    protected $table = "fd_news_xinlang";

    protected $guarded = [];
}
