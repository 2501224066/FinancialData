<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\NewsYcj
 *
 * @property int $id
 * @property string $seq 唯一标记
 * @property string $title 标题
 * @property string $content 内容
 * @property int $color 显示颜色 1=黑色 2=红色
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsYcj newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsYcj newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsYcj query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsYcj whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsYcj whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsYcj whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsYcj whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsYcj whereSeq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsYcj whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsYcj whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NewsYcj extends Model{

    protected $table = "fd_news_yuncaijing";

    protected $guarded = [];
}