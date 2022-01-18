<?php

namespace Vgplay\LaravelCachedSetting\Types;

use Carbon\Carbon;

class Timestamp extends BaseType
{
    public function handle()
    {
        return empty($this->changements[$this->setting->key])
            ? null
            : Carbon::parse($this->changements[$this->setting->key]);
    }
}
