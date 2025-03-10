＃OLAINDEX

✨另一个OneDrive目录索引-独享版。
[![latest stable version exclusive version](https://img.shields.io/github/license/WangNingkai/OLAINDEX.svg)](https://github.com/liuqianqi/OLAINDEX/)
[![Latest Stable Version](https://poser.pugx.org/wangningkai/olaindex/v/stable)](https://packagist.org/packages/wangningkai/olaindex)
[![Latest Unstable Version](https://poser.pugx.org/wangningkai/olaindex/v/unstable)](https://packagist.org/packages/wangningkai/olaindex)
[![GitHub stars](https://img.shields.io/github/stars/WangNingkai/OLAINDEX.svg?style=flat-square)](https://github.com/WangNingkai/OLAINDEX/stargazers)
[![GitHub license](https://img.shields.io/github/license/WangNingkai/OLAINDEX.svg?style=flat-square)](https://github.com/WangNingkai/OLAINDEX/blob/master/LICENSE)
![visitors](https://visitor-badge.laobi.icu/badge?page_id=WangNingkai.OLAINDEX)

> **[中文README](./README_CN.md)**

## 魔改内容

优化了后台细节功能，更适合小白使用，递增了部分注释说明，
新增后台一键复制外链功能
......

## Introduction

A simple, full-featured OneDrive directory index web app, Built on top of the Laravel framework. Using
the `Microsoft Graph API` present content,support multiple accounts,multiple themes.

## Features

- OneDrive directory index
- Support for different types of resources preview
- support multiple accounts

## Project address

- [OLAINDEX](https://github.com/liuqianqi/OLAINDEX)

## Demo

-独享版暂不提供Demo，下方链接为原版Demo
- [https://demo.olaindex.com](https://demo.olaindex.com)

## Preview

![Preview](https://ojpoc641y.qnssl.com/FpR4_obUhswLJXCEBgKOV4Pz7qg3.png)

## Installation

> This project is base of the Laravel framework，Please refer to the relevant documentation.

[Documentation](https://wangningkai.github.io/OLAINDEX)

```bash

cd web-project
git clone https://github.com/liuqianqi/OLAINDEX.git tmp 
mv tmp/.git . 
rm -rf tmp 
git reset --hard 
composer install -vvv  # Install Dependencies
chmod -R 777 storage # Important！！！Ensure that the cache directory has read and write permissions
chown -R www:www * # this 'www' refer to the serve user group
composer run install-app # installation app

```

使用mysql安装方法

```bash

cd web目录
git clone https://github.com/liuqianqi/OLAINDEX.git tmp 
mv tmp/.git . 
rm -rf tmp 
git reset --hard 
composer install -vvv # 这里确保已成功安装 composer ，如果报权限问题，建议给予用户完整权限。
chmod -R 777 storage 
chown -R www:www * # 此处 www 根据服务器具体用户组而定 
前提已通过上面步骤，使用 `composer` 安装依赖，确保 `storage` 目录有写入权限 
1. 修改根目录.env-mysql为.env
2. 修改.env文件的数据库配置及其它配置
3. 执行php artisan key:generate生成运行所需配置
4. 执行数据库迁移php artisan migrate --seed
5. 访问网站，设置其它数据

```
composer 1.8.0

```bash
composer self-update 1.8.0

composer -V

```

## Bug report

> Please read before bug report[《How To Ask Questions The Smart Way》](http://www.catb.org/~esr/faqs/smart-questions.html)

4 way to bug report：

1. [GitHub issue](https://github.com/WangNingkai/OLAINDEX/issues)
2. [GitHub discussions](https://github.com/WangNingkai/OLAINDEX/discussions)
3. [My Blog](https://imwnk.cn)
4. [i@ningkai.wang](mailto:i@ningkai.wang)

### Notes

1. OLAINDEX Command Line Version.Project Address [OLAINDEX-CMD](https://git.io/OLACMD)

2. This software is only for daily study and should not be used for any commercial purposes. Please abide by the laws of
   your country. Any illegal behavior is the responsibility of the user.

3. If you use this application, please try to keep the copyright at the bottom and share it with more people.Thanks.

### :sparkling_heart: Support the project

I open-source almost everything I can, and I try to reply to everyone needing help using these projects. Obviously, this
takes time. You can use this service for free.

However, if you are using this project and happy with it or just want to encourage me to continue creating stuff, there
are few ways you can do it :-

- Starring and sharing the project :rocket:
-  You can make one-time donations via weixin. I'll probably buy a ~~coffee~~ tea. :tea:
- Thanks! :heart:

## License

The OLAINDEX is open-source software licensed under the MIT license.
