# StuGradeWithLaravel5

一个简易的学生成绩管理，查询系统，仅供新手学习参考。QQ:215672398 有什么好的想法，或是建议，不明白的都可以来找我讨论。

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
## 开始学习
首先，讲讲的我自己的学习思路，拿到一个应用的源代码，我会先看路由，每一个路由对应着什么功能，其中有什么细节，怎么去实现，这是我最希望能学到的。在编码的时候，我个人是路由-功能去完成的，可能这是新手的方法，有大牛能指导一下能更好。所以，我从逐步从路由开始说起，一步一步的编码过程。

安装好laravel，配置好环境之后，我执行了

    php artisan fresh

只留下了laravel自带的主页路由 Route::get('/', 'WelcomeController@index');

然后导入我们的数据表，填充默认数据进行测试。

打开 /database/migrations/._create_users_table.php,修改up方法

    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->integer('id')->unique()->unsigned();  #学号，唯一，取正数
            $table->string('name');                       #姓名
            $table->string('password');                   #密码
            $table->string('phone')->default('');  #手机 默认为空(不是可以为空，值为'')
            $table->string('sex')->default('');    #性别 同上
            $table->string('email')->default('');  #邮箱 同上
            $table->string('pro_class')->default(''); #班级 同上
            $table->boolean('is_admin')->default(0);  #是否为管理员 默认为学生
            $table->rememberToken();
            $table->timestamps();
        });
    }

这里为什么这么写，首先我觉的老师新增学生时候是没有填写他信息的权限的，只能生成学号，姓名。密码，所以其他都默认为空，需要学生登录后自己去填写

下面开始有任何不确定的都可以去看源代码对比

找到WelcomeController.php,可以看到两段代码:

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('welcome');
    }

上面的构造函数，有什么作用？里面的中间件guest,在Kernel.php 中的routeMiddleware数组里面有注册,它的功能在App\Http\Middleware\RedirectIfAuthenticated.php里面可以看到。

可以理解为登录之后要是还想访问主页，就会自动跳转，跳转细节后面在说。

index方法返回的是welcome页面.

这时候，我们先构建一个基础页面模版，因为后面的每个页面都是需要继承它的.创建 master.blade.php文件.

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if(Auth::guest())
                    <a class="navbar-brand" href="/">学生成绩管理</a>
                @else
                    @if (Auth::user()->is_admin)
                        <a class="navbar-brand" href="/admin">学生成绩管理</a>
                    @else
                        <a class="navbar-brand" href="/">学生成绩管理</a>
                    @endif
                @endif

            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.golaravel.com" target="__blank">Power by laravel5</a></li>
            </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}">退出</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @include('flash')
    </div>

    @yield('content')

<!-- script -->
<script type="text/javascript" src="/js/all.js"></script>
</body>
</html>