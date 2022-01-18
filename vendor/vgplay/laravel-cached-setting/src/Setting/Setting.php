<?php

namespace Vgplay\LaravelCachedSetting\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Vgplay\LaravelRedisModel\Contracts\Cacheable;
use Vgplay\LaravelRedisModel\HasCache;

class Setting extends Model implements Cacheable
{
    use HasFactory;
    use HasCache;

    public $timestamps = false;

    protected $fillable = [
        'key',
        'display_name',
        'data_type',
        'details',
        'value',
        'type',
        'group',
    ];

    protected $casts = [
        'details' => 'json'
    ];

    public static function primaryCacheKey(): string
    {
        return 'key';
    }

    public static function getCacheKey($key): string
    {
        return md5('setting.' . Str::slug($key));
    }
}
