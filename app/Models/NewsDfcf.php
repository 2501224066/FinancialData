<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NewsDfcf
 *
 * @property int $id
 * @property string $seq 唯一标记
 * @property string $title 标题
 * @property string $content 内容
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsDfcf newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsDfcf newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsDfcf query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsDfcf whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsDfcf whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsDfcf whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsDfcf whereSeq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsDfcf whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsDfcf whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $color 显示颜色 1=黑色 2=红色
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsDfcf whereColor($value)
 */
class NewsDfcf extends Model{

    protected $table = "fd_news_dongfangcaifu";

    protected $guarded = [];
}