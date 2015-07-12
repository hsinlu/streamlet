<?php

use App\Setting;

/**
 * Get setting
 *
 * @param $name
 * @return mixed
 */
function setting($name)
{
    $settings = Cache::rememberForever('settings', function () {
        return Setting::select('name', 'value')->get();
    });

    return $settings->where('name', $name)->first();
}

/**
 * Get setting value
 *
 * @param $name
 * @param $default
 * @return mixed
 */
function setting_value($name, $default = '')
{
    $setting = setting($name);
    if (!is_null($setting)) {
        return $setting->value;
    } else {
        return $default;
    }
}

function is_pattern($pattern)
{
	if (is_array($pattern)) {
		foreach ($pattern as $p) {
			if (app('request')->is($p)) {
				return true;
			}
		}
		return false;
	}

	return app('request')->is($pattern);
}