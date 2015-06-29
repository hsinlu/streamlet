<?php

/**
 * Get setting
 *
 * @param $settings
 * @param $name
 * @return mixed
 */
function setting($settings, $name)
{
    return $settings->where('name', $name)->first();
}

/**
 * Get setting value
 *
 * @param $settings
 * @param $name
 * @param $default
 * @return mixed
 */
function setting_value($settings, $name, $default = '')
{
    $setting = setting($settings, $name);
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