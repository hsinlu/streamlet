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
        ]);

        Setting::create([
            'name' => 'cover',
            'value' => 'images/cover.jpg',
            'description' => 'your profile cover',
        ]);

        Setting::create([
            'name' => 'avatar',
            'value' => 'images/avatar.png',
            'description' => 'your profile logo',
        ]);

        Setting::create([
            'name' => 'bio',
            'value' => '欢迎来到我的个人网站，在这里我会给你分享我的文章、项目和生活感悟，希望你能喜欢！',
            'description' => 'bio',
        ]);

        Setting::create([
            'name' => 'email',
            'value' => 'hsinlu@live.com',
            'description' => 'your email',
        ]);

        Setting::create([
            'name' => 'title',
            'value' => 'Streamlet',
            'description' => '网站标题',
        ]);

        Setting::create([
            'name' => 'subtitle',
            'value' => '如澜若溪',
            'description' => '网站副标题',
        ]);

        Setting::create([
            'name' => 'keywords',
            'value' => 'hsinlu, php, laravel, coder, blog, knots, js, css',
            'description' => 'website keywords',
        ]);

        Setting::create([
            'name' => 'description',
            'value' => '欢迎来到我的个人网站，在这里我会给你分享我的文章、项目和生活感悟，希望你能喜欢！',
            'description' => 'website description',
        ]);

        Setting::create([
            'name' => 'paginate_size',
            'value' => '5',
            'description' => 'How many articles should be displayed on each page.',
        ]);

        event(new \App\Events\DoneSetupEvent);
    }
}
