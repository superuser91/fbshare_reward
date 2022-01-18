<?php

namespace Vgplay\LaravelCachedSetting\Setting;

use Illuminate\Support\Collection;
use Vgplay\LaravelCachedSetting\Setting\Setting;
use Vgplay\LaravelCachedSetting\Types\Checkbox;
use Vgplay\LaravelCachedSetting\Types\File;
use Vgplay\LaravelCachedSetting\Types\Text;
use Vgplay\LaravelCachedSetting\Types\TextList;
use Vgplay\LaravelCachedSetting\Types\Timestamp;

class SettingUpdater
{
    /**
     * Update value for collection of settings passed to 1st agrument
     *
     * @param Collection $settings
     * @param array $changement
     * @return void
     */
    public function update(Collection $settings, array $changement)
    {
        foreach ($settings as $setting) {
            $content = $this->getContentBasedOnType($setting, $changement);

            if ($setting->type == 'image' && $content == null) {
                continue;
            }

            if ($setting->type == 'file' && $content == null) {
                continue;
            }

            $this->performUpdateSetting($setting, $content);
        }
    }

    protected function performUpdateSetting(Setting $setting, $content)
    {
        $setting->value = $content;
        $setting->save();
    }

    protected function getContentBasedOnType(Setting $setting, array $changements)
    {
        switch ($setting->data_type) {
            case 'checkbox':
                return (new Checkbox($setting, $changements))->handle();
            case 'file':
            case 'image':
                return (new File($setting, $changements))->handle();
            case 'date':
            case 'datetime':
            case 'timestamp':
                return (new Timestamp($setting, $changements))->handle();
            case 'list':
                return (new TextList($setting, $changements))->handle();
            default:
                return (new Text($setting, $changements))->handle();
        }
    }
}
