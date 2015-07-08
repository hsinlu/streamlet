<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingTableSeeder extends Seeder
{
    public function run()
    {
        Setting::truncate();

        Setting::create([
            'name' => 'name',
            'value' => 'Hsinlu Si',
            'description' => 'your name',
            'type' => 'text'
        ]);

        Setting::create([
            'name' => 'bio',
            'value' => '欢迎来到我的个人网站，在这里我会给你分享我的文章、项目和生活感悟，希望你能喜欢！',
            'description' => 'bio',
            'type' => 'text'
        ]);

        Setting::create([
            'name' => 'title',
            'value' => 'Streamlet',
            'description' => '网站标题',
            'type' => 'text'
        ]);

        Setting::create([
            'name' => 'subtitle',
            'value' => '如澜若溪',
            'description' => '网站副标题',
            'type' => 'text'
        ]);

        Setting::create([
            'name' => 'keywords',
            'value' => 'hsinlu, php, laravel, coder, blog, knots, js, css',
            'description' => 'website keywords',
            'type' => 'text'
        ]);

        Setting::create([
            'name' => 'description',
            'value' => '欢迎来到我的个人网站，在这里我会给你分享我的文章、项目和生活感悟，希望你能喜欢！',
            'description' => 'website description',
            'type' => 'text'
        ]);

        event(new \App\Events\DoneSetupEvent);
    }
}
