<?php

namespace Vgplay\LaravelCachedSetting\Types;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class File extends BaseType
{
    /**
     * @return string
     */
    public function handle()
    {
        return array_key_exists($this->setting->key, $this->changements)
            ? $this->changements[$this->setting->key]
            : null;
    }
}
