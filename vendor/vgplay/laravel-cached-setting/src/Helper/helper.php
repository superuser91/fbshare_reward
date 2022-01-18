<?php

use Vgplay\LaravelCachedSetting\Setting\Setting;

if (!function_exists('setting')) {
    function setting($key, $fallback = null)
    {
        $setting = Setting::fromCache()->find($key);

        if (is_null($setting)) return $fallback;

        return $setting->value;
    }
}

if (!function_exists('set_setting')) {
    function set_setting($key, $value)
    {
        $setting = Setting::fromCache()->find($key);

        if (is_null($setting)) abort(404);

        return $setting->update([
            'value' => $value
        ]);
    }
}
