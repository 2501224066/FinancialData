<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\NewsJs
 *
 * @property int $id
 * @property string $seq 唯一标记
 * @property string $content 内容
 * @property int $color 显示颜色 1=黑色 2=红色
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsJs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsJs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsJs query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsJs whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsJs whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsJs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsJs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsJs whereSeq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsJs whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NewsJs extends Model
{

    protected $table = "fd_news_jinshi";

    protected $guarded = [];
}
