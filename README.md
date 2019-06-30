 # laravel-blog
Vien Blog - 一款基于laravel5.8开发的，支持markdown编辑以及图片拖拽上传的博客系统、SEO友好

## 博主网站

- [VienBlog](https://vienblog.com)
- [这里有些小秘密](https://vien.tech)

## 项目Github地址

Github: [laravel-blog](https://github.com/luvvien/laravel-blog) ，欢迎Star。

## 博客亮点

- 界面简洁、适配pc和mobile、有良好的视觉体验
- 支持markdown、并且可以拖拽或者粘贴上传图片、分屏实时预览
- SEO友好：支持自定义文章slug、支持meta title、description、keywords
- 自定义导航、自定义sidebar、随时去掉不需要的模块
- 支持标签、分类、置顶、分享、友链等博客基本属性
- 支持AdSense
- 支持百度自动提交链接和手动提交链接

## 博客展示

Demo演示地址: [这是一个DEMO](https://vienblog.com)

### 后台管理

#### 文章列表

主要操作有查询、创作、编辑、置顶、删除（软删除）
![Laravel Markdown Blog Admin 文章列表 - VienBlog](https://vienblog.com/storage/images/article/20190412/LIn93Jcw8cOmxSKRLEVYyDolRcVbxqS2AAXQiNOg.png)

#### 创作和编辑

创作和编辑页面
![Laravel Markdown Blog Admin 添加新文章 - VienBlog](https://vienblog.com/storage/images/article/20190406/G8zTereQphzI0ZO3qlpl58z8Ufz0uPfPHfP2WrtL.png)

Markdown编辑器：支持拖拽粘贴上传图片、预览、全屏、分屏预览
![Laravel Markdown Blog Admin Markdown编辑器 - VienBlog](https://vienblog.com/storage/images/article/20190406/WtKU7tsblKvBMgaFROx3WFdwmD6GPEtZcw2tY1QG.png)

### 前端展示

参照 [这是一个DEMO](http://39.106.108.23)

> 看完Demo，如果你觉得还过得去，想要用一用试试呢，赶紧往下看喔。

---

## 使用博客

### 安装

##### 获取源码

```
git clone git@github.com:luvvien/laravel-blog.git
```

##### 进入项目目录后，用`composer`安装依赖

```
composer install
```

##### 生成`.env`文件

```
cp .env.example .env
```

##### 生成key

```
php artisan key:generate
```

##### 创建MySQL数据库`vienblog` ，字符集采用 `utf8mb4`, `utf8mb4_general_ci`

##### 编辑`.env`文件 `vim .env`，修改MySQL数据库连接配置，请将`DB_HOST`，`DB_PORT`，`DB_USERNAME`，`DB_PASSWORD` 改成你的数据库配置。

```
[...]

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vienblog
DB_USERNAME=root
DB_PASSWORD=root

[...]
```

##### 数据迁移和数据填充

```
php artisan migrate
php artisan db:seed
```

如果遇到`SQLSTATE[42000] Syntax error or access violation Specified key was too long error`错误，请参照https://vien.tech/article/156 解决

##### 创建storage软连接

```
php artisan storage:link
```

##### 设置目录权限

```
chmod -R 755 storage/
chown -R www-data:www-data  storage/
```

### 使用

可以选择临时预览，也可以用Nginx部署服务

#### 临时预览

```
php artisan serv
```

打开浏览器访问`127.0.0.1:8000`

#### 使用Nginx

Nginx配置，将`root`指向项目的`public`目录，请用`pwd` 查看目录，并且改成你目录，千万不要直接粘贴复制。

```
root   /app/laravel-blog/public;
```

完整配置

```
server {
        listen 8088 default_server;
        listen [::]:8088 default_server;
				
        root /apps/vien_blog/public;
        index index.php index.html index.htm;
        server_name _;
				
        location / {
                try_files $uri $uri/ /index.php?$query_string;
        }
        location ~ \.php$ {
                include snippets/fastcgi-php.conf;
                fastcgi_pass unix:/run/php/php7.2-fpm.sock; # fpm，因为版本不同路径会有区别，这里请改成你，不知道路径可以执行php-fpm便会显示
								# fastcgi_pass 127.0.0.1:9000; # cgi
        }
}
```

打开浏览器访问`127.0.0.1:8088`

#### 后台登录

- 地址`/admin`
- 默认的admin管理账号是`vien@byteinf.com`密码是`vienblog`，进入控制台后可以修改管理员信息

#### 使用百度自动推送和主动推送

请先在`config/vienblog.php`中按照注释配置相关的信息，自动推送是在网页访问时推送，主动推送执行以下代码会将未提交过的链接提交到百度

```
php artisan push:baidu
```

## 讨论群

加微信拉群: luvvien （欢迎开发者，技术爱好者，站长加入）

## 联系我

Email: support@vienblog.com

## License

- 使用[Vien Blog](https://vienblog.com)构建应用，必须在页脚保留**Powered by Vien Blog**字样以及[相关链接](https://vienblog.com)
- 在遵守以上规则的情况下，你可以享受等同于`MIT License`协议的授权。
- 使用[Vien Blog](https://vienblog.com)并且遵守上述协议的用户可以享受[Vien Blog](https://vienblog.com)的博客导航，联系我将你的博客地址添加到[Vien Blog](https://vienblog.com)的网站导航中。 
