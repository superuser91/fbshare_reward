<?php

namespace Vgplay\LaravelCachedSetting\Types;

class TextList extends BaseType
{
    /**
     * @return null|string
     */
    public function handle()
    {
        return array_key_exists($this->setting->key, $this->changements)
            ? $this->changements[$this->setting->key]
            : [];
    }
}
