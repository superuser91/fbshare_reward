<?php

namespace Vgplay\LaravelCachedSetting\Setting;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Vgplay\LaravelCachedSetting\Setting\Setting;

class SettingCreater
{
    public function create(array $data)
    {
        $data = $this->validate($data);

        return $this->createSetting($data);
    }

    protected function createSetting(array $data)
    {
        return Setting::create($data);
    }

    protected function validate(array $data)
    {
        $validator = Validator::make($data, [
            'key' => 'required|string|max:191|unique:settings,key',
            'display_name' => 'required|string|max:191',
            'data_type' => 'required|string',
            'details' => 'nullable|string',
            'type' => 'required|string|max:191',
            'group' => 'nullable|string|max:191'
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $data['group'] = $data['group'] ?: 'General';

        return $data;
    }
}
