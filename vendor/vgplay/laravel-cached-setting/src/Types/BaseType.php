<?php

namespace Vgplay\LaravelCachedSetting\Types;

use Vgplay\LaravelCachedSetting\Setting\Setting;

abstract class BaseType
{
    /**
     * @var Setting
     */
    protected $setting;

    /**
     * @var array
     */
    protected $changements;


    /**
     * Password constructor.
     *
     * @param Setting $setting
     * @param array $changements contains key => value pairs
     * @param array|null $row
     */
    public function __construct(Setting $setting, array $changements)
    {
        $this->setting = $setting;
        $this->changements = $changements;
    }

    /**
     * @return mixed
     */
    abstract public function handle();
}
