# StuGradeWithLaravel5

一个简易的学生成绩管理，查询系统，仅供新手学习参考。

## 下面，我们开始，我也是从一个新手(伸手党)走过来的，这次自己写一个教程给刚学习laravel，或者感到困惑的同学，我会尽量详细每一个重要的步骤。
* [系统的功能简介](#feature1)
* [需要的一些组件，库](#feature2)
* [一些源文件位置说明](#feature3)
* [运行环境](#feature4)
* [安装](#feature5)
* [详细学习过程](#feature6)

<a name="feature2"></a>
## 功能
* 学生端
    * 登录完善修改个人信息，查看成绩
    * 修改密码，验证邮件(待完善)
* 管理员
    * 登录能查看所有学生信息，包括新增学生，删除学生
    * 能更新学生成绩，没有修改学生信息的权限
    * 下载学生信息Excel,学生成绩Excel
    * 上传学生名单Excel，更新数据库(待完善)
    * 上传学生成绩Excel，更新数据库(待完善)

-----
<a name="feature2"></a>
## 组件链接和文档
* Laravel 5.0(这个大家都懂，最基本的)
* [Bootstrap 3.3.4](http://v3.bootcss.com/)
* gulp,前端自动化工具,(官网被墙了),推荐laravel文档中的安装gulp. [link](http://www.golaravel.com/laravel/docs/5.0/elixir/)
* [TableSorter](http://tablesorter.com/docs/) 表格排序插件
* [Laravel Excel](http://www.maatwebsite.nl/laravel-excel/docs) Excel的导出导入组件

-----
<a name="feature3"></a>
## 说明
* TableSorter ----- resources/js/jquery.tablesorter.min.js
* Bootstarp   ----- 需要引入bootstarp的font文件(不引入会出现一些问题，见下文)
* resources/js/main.js  ----- 系统功能完善js脚本(意思就是自己写的)
* resources/css/main/css ----- 同上

-----
<a name="feature4"></a>
## 环境需要

    PHP >= 5.5.0
    MCrypt PHP Extension
    SQL server(for example MySQL)

-----
<a name="feature4"></a>
## 安装步骤
* [1: 获取源代码](#step1)
* [2: Composer管理依赖关系的工具](#step2)
* [3: 配置文件](#step3)
* [4: 安装gulp工具和Laravel Elixir](#step4)
* [5: 转移数据表，填充数据](#step5)
* [6: 开始](#step6)

-----
<a name="step1"></a>
### 1: 下载源代码

    https://github.com/qq215672398/StuGradeWithLaravel5/archive/master.zip

-----
<a name="step2"></a>
### 2: Composer Install

安装[Composer](http://getcomposer.org/) 来管理PHP依赖关系的工具,详细安装参考官网,不过大部分同学这步肯定Ok了。

安装好之后,在项目根目录下执行命令:

    composer update

-----
<a name="step3"></a>
### 3: 修改配置文件

在.env文件中修改

    DB_HOST=localhost
    DB_DATABASE=dbname
    DB_USERNAME=username
    DB_PASSWORD=password

-----
<a name="step4"></a>
### 4: 安装gulp和Elixir

执行以下命令:

    npm install

-----
<a name="step5"></a>
### 5: 得到表,和默认用户数据

依次执行一下命令:

    php artisan migrate
    php artisan db:seed(要是失败的话,可能需要 composer dump-autoload)

现在执行:

    php artisan serve

打开浏览器,输入http://localhost:8000/就可以看到首页呢！

-----
<a name="step6"></a>
### 6: 登录开始

数据库有3个默认用户(当然你可以在数据库里删除，自己添加，这里只是测试)
这里的相关信息可以在 /database/seeds/UserTableSeeder.php 找到

管理员:

    username: 1234567890
    pasword: root

同学:

    username: 1210311232
    pasword: 1210311232

    username: 1210311233
    pasword: 1210311233

-----

<a name="feature6"></a>

