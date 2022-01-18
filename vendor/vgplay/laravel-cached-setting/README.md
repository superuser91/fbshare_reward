# Available methods:
1. setting('key', fallbackValue)
```php
$key = setting('fb_app_id', '1312435342342');
```
2. set_setting('key', $newValue);
```php
set_setting('release_time', '2021-12-30 00:00:00');
```
3. Create setting variable and save to database
```php
use Vgplay\LaravelCachedSetting\Setting\SettingCreater;

function create(SettingCreater $creater) {
    $creater->create([
        'key' => 'fb_app_id',
        'display_name' => 'Facebook App Id',
        'data_type' => 'text',
        'type' => 'Tab 1',
        'group' => 'Social',
        'value' => '1312435342342'
    ]);
}

```