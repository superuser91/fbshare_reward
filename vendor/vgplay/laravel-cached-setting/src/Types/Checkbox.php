<?php

namespace Vgplay\LaravelCachedSetting\Types;

class Checkbox extends BaseType
{
    /**
     * @return int
     */
    public function handle()
    {
        return (int) (array_key_exists($this->setting->key, $this->changements));
    }
}
