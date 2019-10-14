<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TongHuaShun
 *
 * @property int $id
 * @property string $source 来源
 * @property string $seq 唯一标记
 * @property string $title 标题
 * @property string $content 内容
 * @property int $color 显示颜色 1=黑色 2=红色
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TongHuaShun newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TongHuaShun newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TongHuaShun query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TongHuaShun whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TongHuaShun whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TongHuaShun whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TongHuaShun whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TongHuaShun whereSeq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TongHuaShun whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TongHuaShun whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TongHuaShun whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NewsThs extends Model{

    protected $table = "fd_news_tonghuashun";

    protected $guarded = [];
}