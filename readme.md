<img src="https://dn-coding-net-production-static.qbox.me/2f906fe6-a1bd-49bf-9662-cec3e9c80a7b.png" alt="streamlet" width="150" height="150">

# Streamlet

Streamlet是一款基于Laravel 5.1框架的开源个人博客，目前正在开发中，更多特性敬请关注。

## 环境需求
1. PHP 版本 >=5.5.9
2. OpenSSL PHP 扩展
3. Mbstring PHP 扩展
4. Tokenizer PHP 扩展
5. nodejs
6. composer

## 安装

#### 使用git clone指令下载最新的代码
```bash
git clone https://git.coding.net/hsinlu/streamlet.git
```

#### 安装php所依赖的模块
```bash
composer install
```

#### 安装node所依赖的模块
```bash
npm install
```

#### 运行gulp
```bash
gulp

# gulp --production
```

#### 配置运行
```bash
cp .env.example .env #更改DB对应的配置
```
> 推荐使用Laravel提供的[Homestead](http://laravel.com/docs/5.1/homestead)配置开发环境，如果使用Apache服务器，请将根目录指向public。

###### 创建数据表
```bash
php artisan migrate
```

###### 初始化测试数据
```bash
php artisan db:seed --class=FakerDataSeeder
```

###### 初始化配置数据
```bash
php artisan db:seed --class=SettingTableSeeder
```
> 您也可以不用执行此步骤，因为在项目第一次访问时会要求配置此项内容

默认用户： ['hsinlu@live.com' => '123456']  

## License
The MIT License (MIT)

Copyright (c) 2015 hsinlu

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.