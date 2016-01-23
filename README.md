> 本教程是5.0的laravel，最新资料请关注 [RryLee](http://rrylee.github.io) 和 [RryTip](http://rrytip.github.io)

# StuGradeWithLaravel5 

一个简易的学生成绩管理,查询系统,仅供新手学习参考。QQ:215672398 有什么好的想法,或是建议,不明白的都可以来找我讨论。

## 下面,我们开始,我也是从一个新手(伸手党)走过来的,这次自己写一个教程给刚学习laravel,或者感到困惑的同学,我会尽量详细每一个重要的步骤。感谢社区,论坛前仆后继的前辈,本教程仅献给像我一样热爱laravel的新手参考学习,谢谢!
* [系统的功能简介](#feature1)
* [需要的一些组件,库](#feature2)
* [一些源文件位置说明](#feature3)
* [运行环境](#feature4)
* [安装](#feature5)
* [详细学习过程](#feature6)

<a name="feature1"></a>
## 功能
* 学生端
    * 登录完善修改个人信息,查看成绩
    * 修改密码,验证邮件(待完善) OK
* 管理员
    * 登录能查看所有学生信息,包括新增学生,删除学生
    * 能更新学生成绩,没有修改学生信息的权限
    * 下载学生信息Excel,学生成绩Excel

-----
<a name="feature2"></a>
## 组件链接和文档
* Laravel 5.0(这个大家都懂,最基本的)
* [Bootstrap 3.3.4](http://v3.bootcss.com/)
* gulp,前端自动化工具,(官网被墙了),推荐laravel文档中的安装gulp. [link](http://www.golaravel.com/laravel/docs/5.0/elixir/)
* [TableSorter](http://tablesorter.com/docs/) 表格排序插件
* [Laravel Excel](http://www.maatwebsite.nl/laravel-excel/docs) Excel的导出导入组件

-----
<a name="feature3"></a>
## 说明
* TableSorter ----- resources/js/jquery.tablesorter.min.js
* Bootstarp   ----- 需要引入bootstarp的font文件(不引入会出现一些问题,见下文)
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
* [5: 转移数据表,填充数据](#step5)
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

将.env.example重命名为.env文件中并且修改

    DB_HOST=localhost
    DB_DATABASE=dbname
    DB_USERNAME=username
    DB_PASSWORD=password

在config/app.php 下修改:

    'url' => 'http://localhost/项目文件夹名/public',
    'timezone' => 'PRC',

-----
<a name="step4"></a>
### 4: 安装gulp和Elixir (安装阶段可以跳过)

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

数据库有3个默认用户(当然你可以在数据库里删除,自己添加,这里只是测试)
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
## 开始学习(至少要阅读过一遍官方文档,熟悉基本用法)
首先,讲讲的我自己的学习思路,拿到一个应用的源代码,我会先看路由,每一个路由对应着什么功能,其中有什么细节,怎么去实现,这是我最希望能学到的。在编码的时候,我个人是路由-功能去完成的,可能这是新手的方法,有大牛能指导一下能更好。所以,我从逐步从路由开始说起,一步一步的编码过程。

### 你可能会遇到的问题
* Class App\Http\Controllers\Admin\ExcelController does not exist
* Class 'App\Http\Controllers\Admin\User' not found
* 类似的问题

### 你需要:
* 检查文件名,看是否一致
* 检查命名空间
* 检查类名
* 检查是否在类外 use User 或者 use Auth 等等

#### 建议,开两个编辑器,一个用来看前面安装好的源代码,一个用来进行下面的学习,学习过程中,请随便参考官方文档,另外,我的教程里面可能不小心会有些小错误,请耐心查看,有些你已经明白了,但是实际操作出现错误无法解决的,你可以按照我下面说的循序,复制原项目的文件,也可以找我交流,谢谢!

安装好laravel,[配置](#step3)好环境之后,我执行了

    php artisan fresh

只留下了laravel自带的主页路由 Route::get('/', 'WelcomeController@index');

然后导入我们的数据表,填充默认数据进行测试。

执行   php artisan make:model User, 生成新的数据转移文件

打开 /database/migrations/._create_users_table.php,修改up方法

```php
public function up()
{
    Schema::create('users', function(Blueprint $table)
    {
        $table->integer('id')->unique()->unsigned();  #学号,唯一,取正数
        $table->string('name');                       #姓名
        $table->string('password');                   #密码
        $table->string('phone')->default('');  #手机 默认为空(不是可以为空,值为'')
        $table->string('sex')->default('');    #性别 同上
        $table->string('email')->default('');  #邮箱 同上
        $table->string('pro_class')->default(''); #班级 同上
        $table->boolean('is_admin')->default(0);  #是否为管理员 默认为学生
        $table->rememberToken();
        $table->timestamps();
    });
}
```

这里为什么这么写,首先我觉的老师新增学生时候是没有填写他信息的权限的,只能生成学号,姓名。密码,所以其他都默认为空,需要学生登录后自己去填写。

然后在User.php中修改$fillable数组

    protected $fillable = ['name', 'email', 'is_admin', 'password', 'sex', 'phone', 'pro_class'];

什么意思,我也不是很清楚,这样写了储存user到数据库,输出user属性就不会出问题,至于具体为啥,怪我没有深入,下面继续。

我们先先数据库里面填充一些数据,以方便我们下面测试.

在/database/seeds下新建 UserTableSeeder.php

```php
<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Grade;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
        'id' => 1210311232,
        'name' => '李锐',
        'password' => Hash::make('1210311232')
        ]);

        User::create([
        'id' => 1210311233,
        'name' => '陈曦',
        'password' => Hash::make('1210311233')
        ]);

        User::create([
        'id' => 1234567890,
        'name' => '管理员',
        'password' => Hash::make('root'),
        'is_admin' => 1
        ]);

    }

}
```

然后讲DatabaseSeeder.php中 $this->call('UserTableSeeder')前面的注释取消.

执行

    composer dump-autoload
    php artisan db:seed

数据就被填充到数据库里面了

下面开始有任何不确定的都可以去看源代码对比

找到WelcomeController.php,可以看到两段代码:

```php
public function __construct()
{
    $this->middleware('guest');
}

public function index()
{
    return view('welcome');
}
```

上面的构造函数,有什么作用？里面的中间件guest,在Kernel.php 中的routeMiddleware数组里面有注册,它的功能在App\Http\Middleware\RedirectIfAuthenticated.php里面可以看到。

可以理解为登录之后要是还想访问主页,就会自动跳转,跳转细节后面在说。

index方法返回的是welcome页面.

这时候,我们先构建一个基础页面模版,因为后面的每个页面都是需要继承它的.创建 master.blade.php文件.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
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

    <!-- <div class="container">
        @include('flash')
    </div> -->

    @yield('content')

<!-- script -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
```

@include('flash')先注释掉,这里暂时还不需要.(记得注释,你可以先删除,最好）

创建我们的welcome.blade.php,随便修饰一下(前端不行 :) )

```html
@extends('master')   {{-- 继承master模版 --}}

@section('title')   {{-- 对应@yield('title') --}}
    学生成绩管理系统
@stop

@section('content')   {{-- 对应@yield('content') --}}
    <div class="container">
        <div class="jumbotron">
            <h2><div class="quote">{{ Inspiring::quote() }}</div></h2>
            <p>同学们登录后先修改相关资料</p>
            <p>查询分数,有疑问咨询管理员</p>
            <p><a class="btn btn-primary btn-lg" href="/login" role="button">点击登录</a></p>
        </div>
    </div>
@stop
```

![Index](http://img1.ph.126.net/HmhY3w2qYDWr4RyQKdcfiQ==/6630430048955199565.jpg)

<a name="route1"></a>
好了,首页已经完成了,来看这三个路由

```php
Route::get('login', [
'middleware' => 'guest', 'as' => 'login', 'uses' => 'loginController@loginGet']);
Route::post('login', [
'middleware' => 'guest', 'uses' => 'loginController@loginPost']);
Route::get('logout', [
'middleware' => 'auth', 'as' => 'logout', 'uses' => 'loginController@logout']);
```

-----
完成登录登出的功能, 在路由中设置中间件, 过滤一些非法请求,关于中间件,参考[官方文档](http://www.golaravel.com/laravel/docs/5.0/middleware/)

guest 只允许游客(没登陆的情况下)访问get路由login和post路由login,要是已经登录,就会跳转到相应页面,注意关键词响应。我们登录用户有两种,学生,和管理员,当他们在登录的情况下要想访问这两个路由,肯定会做出不同的响应。即,学生,跳转到学生主页,管理员,跳转到管理员主页.现在来看看RedirectIfAuthenticated.php

```php
public function handle($request, Closure $next)
{
    if ($this->auth->check())     <!-- 用户是否登录 -->
    {
        if (!Auth::user()->is_admin) {
            return new RedirectResponse(url('/stu/home'));  <!-- 不是管理员 -->
        } else {
            return new RedirectResponse(url('/admin'));   <!-- 管理员 -->
        }

    }

    return $next($request);
}
```

auth 只有登录用户才能访问(这个不知道怎么表达,我就不误人子弟),看下源码 Authenticate.php

```php
public function handle($request, Closure $next)
{
    if ($this->auth->guest())    <!-- 没有登录,是游客 -->
    {
        if ($request->ajax())           <!-- 通过ajax来请求 -->
        {
            return response('Unauthorized.', 401);
        }
        else       <!-- 直接请求, 跳转到登录页 -->
        {
            return redirect()->guest('login');
        }
    }

    return $next($request);
}
```

也就是说只有登录了才能登出,就是这个意思。

说完了中间件,创建控制器。loginControlle.php

    php artisan make:controller loginController --plain

在里面写上以下内容:

```php
/**
 * 返回login视图,登录页面
 */
public function loginGet()
{
    return view('login');
}

/**
 * 登录响应
 */
public function loginPost(Request $request)
{
    $this->validate($request, User::rules());
    $id = $request->get('id');
    $password = $request->get('password');
    if (Auth::attempt(['id' => $id, 'password' => $password], $request->get('remember'))) {
        if (!Auth::user()->is_admin) {
            return Redirect::route('stu_home');
        } else {
            return Redirect::action('Admin\AdminController@index');
        }

    } else {
        return Redirect::route('login')
            ->withInput()
            ->withErrors('学号或者密码不正确,请重试！');
    }
}

/**
 * 用户登出
 */
public function logout()
{
    if (Auth::check()) {
        Auth::logout();
    }
    return Redirect::route('login');
}
```

可以使用validate验证用户输入,在laravel5中使用validate非常方便,注意第二个参数,User::rules(),
这是在User模型中一个静态方法,接着在User.php中加入静态方法。

```php
protected static function rules()
{
    return [
        'id' => 'required|digits:10',   <!-- 代表必需填写,10位数字 -->
        'password' => 'required'        <!-- 必填 -->
        ];
}
```

验证用户登录使用了Auth::attempt(),这是laravel中自带的验证方法,非常好用,如果验证通过,接着判断是否是管理员,然后分别跳转到不同的url.

    return Redirect::route('stu_home') -- 对应路由名为stu_home的路由
    return Redirect::action('Admin\AdminController@index') -- 对于这个index方法

登出使用的是Auth::logout().

这时候点击登录,laravel会告诉你view(login)不存在,创建login.blade.php文件

```html
@extends('master')

@section('title')
    欢迎登录
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">登录</div>
                <div class="panel-body">

                    @include('errors.list')

                    {!! Form::open(['url' => '/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        <div class="form-group">
                            {!! Form::label('id', '学号', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('id', old('id'), ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', '密码', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Login', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
```

这时候要是点击登录,还是会报错,因为在laravel5中Illuminate/Html组件被移了,我们可以在composer.json的required数组中加入

    "illuminate/html": "5.0"

在config/app.php中的provider数组中添加

    'Illuminate\Html\HtmlServiceProvider',

aliases数组中添加

    'Html'      => 'Illuminate\Html\HtmlFacade',
    'Form'      => 'Illuminate\Html\FormFacade',

接着执行:

    composer update

等待安装完成之后,就能看到我们的登录页面了

![Login](http://img1.ph.126.net/aBpSfUKwCB34SJXOcbz-Lg==/6630121086187793065.jpg)

这时候你随便输入学号密码,页面会刷新一下,不会跳转,错误已经被存在了Session中,现在把他显示出来.
在login.blade.php中有这样一行

    @include('errors.list')

我们创建errors/list.blade.php

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

这时候要是输入不符合前面的规则,你会看到提示英文提示信息,要是输入密码或者帐号错误,你会看到 学号或者密码不正确,请重试, 这是loginPost中返回的自定义错误信息.

现在,我们有两个问题需要解决,第一,英文提示信息,对我们中国用户可能不太友好,你可以更换.第二,错误提示会一直留着页面.下面,我们一一解决.

关于表单验证的自定义错误信息,可以查看[官方链接](http://www.golaravel.com/laravel/docs/5.0/validation/), 现在我们找到/resources/lang/en/validation.php,在custom数组中添加:

    'id' => [
            'required' => '学号不能为空',
            "digits"   => "学号必须是 10 位数字",
            "unique"   => "该同学已经存在",
        ],
    'password' => [
            'required' => '密码不能为空',
        ],

重新随便输入学号密码,你就可以看到中文提示信息了

关于提示信息的隐藏,这里有两种简单的解决方案,参考bootstrap中的[警告框](http://v3.bootcss.com/components/#alerts-dismissible),修改/errors/list.blade.php

```html
@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

这个时候错误信息的右边就会有一个关闭按钮,点击就可隐藏错误信息

还有一种使用jQuery的一个小方法.在master.blade.php引入脚本main.js

    ...
    <!-- script -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    ...

在public文件夹下新建文件 js/main.js

```js
$(function () {
    $('div.alert').delay(2500).slideUp(300);
});
```

这是时候再产生错误信息,就会自动隐藏了

下面就是登录后的操作了,学生端的功能比较少,我们先来完成.

选择一组学号密码登录,你会看到url跳转到 http://localhost:8000/stu/home, 在前面loginController中loginPost方法中可以看到关于学生成功登录后的跳转,这时候去创建我们的路由.

```php
Route::get('stu/home', [
    'as' => 'stu_home', 'uses' => 'Stu\StudentController@home']);
Route::get('stu/edit', [
    'as' => 'stu_edit', 'uses' => 'Stu\StudentController@edit']);
Route::post('stu/update', [
    'as' => 'stu_update', 'uses' => 'Stu\StudentController@update']);
```

接着创建我们的控制器(注意路径, 在Stu下):

    php artisan make:controller Stu/StudentController --plain

里面包括以上三个方法,我们一个一个来解决

```php
/**
 * 只允许登录用户访问
 */
public function __construct()
{
    $this->middleware('auth');
}

/**
 * 返回学生主页
 */
public function home()
{
    return view('stu.home');
}
```

接下来去创建我们的视图文件stu/home.blade.php

```html
@extends('master')

@section('title')
    欢迎 -- {{ Auth::user()->name }}
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/stu/home"><button class="btn btn-info">个人信息</button></a>



                </div>

                <div class="panel-body">
                    <div class="personal-mes">
                        学号: {{ Auth::user()->id }}
                        <br />
                        姓名: {{ Auth::user()->name }}
                        <br />
                        性别: {{ Auth::user()->sex }}
                        <br />
                        手机: {{ Auth::user()->phone }}
                        <br />
                        班级: {{ Auth::user()->pro_class }}
                        <br />
                        邮箱: {{ Auth::user()->email }}
                        <hr />
                        <a href="/stu/edit"><button class="btn btn-primary">修改资料</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
```

刷新,你能看到自己的home页, 留意上面的代码,有一片空白,用来后面完成查分功能

![stu_home](http://img1.ph.126.net/g0gBzc45Yj2cOXff6S-YsA==/6630897341397287608.jpg)

接着我们完成修改资料功能,在StudentController.php中添加:

```php
/**
 * 返回修改资料页面
 */
public function edit()
{
    return view('stu.edit');
}
```

创建 stu/edit.blade.php

```html
@extends('master')

@section('title')
    修改个人信息
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/stu/home"><button class="btn btn-info">个人信息</button></a>
                </div>

                @include('errors.list')

                <div class="panel-body">
                    {!! Form::open(['url' => '/stu/update', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        <div class="form-group">
                            {!! Form::label('id', '学号: ', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('id', Auth::user()->id, ['class' => 'form-control', 'readonly'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', '姓名: ', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', Auth::user()->name, ['class' => 'form-control', 'readonly'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('sex', '性别: ', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('sex', ['男' => '男', '女' => '女'], Auth::user()->sex, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone', '手机: ', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('phone', Auth::user()->phone, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('pro_class', '班级: ', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('pro_class', Auth::user()->pro_class, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', '邮箱: ', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', Auth::user()->email, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="group">
                            {!! Form::submit('确认修改', ['class' => 'btn btn-success form-control']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
```

点击修改资料:

![stu_edit](http://img0.ph.126.net/TK-8ZNNbnZq3UAC4Z5C2HQ==/6630777494629863627.jpg)

我们可以看到表单提交到 localhost:8000/stu/update,我们的post路由update对应方法如下:

```php
public function update(Request $request)
{
    $this->validate($request, [
        'phone' => 'required|digits:11',
        'pro_class' => 'required',
        'email' => 'required|email'
        ]);

    Auth::user()->update($request->all());

    return Redirect::route('stu_home');
}
```

这个时候,我们也可以选择使用自己的Request,首先我们使用如下命令建立Request:

    php artisan make:request StudentMesRequest

修改我们的StudentMesRequest.php:

```php
/**
* Determine if the user is authorized to make this request.
* 这里先设置为true，表示有权限去使用这个Request,不然请求会被拒绝
* @return bool
*/
public function authorize()
{
    return true;
}

/**
 * Get the validation rules that apply to the request.
 *
 * @return array
 */
public function rules()
{
    return [
        'phone' => 'required|digits:11',
        'pro_class' => 'required',
        'email' => 'required|email'
    ];
}
```

然后修改update方法(别忘了在类外引入StudentMesRequest, 即use App\Http\Requests\StudentMesRequest;):

```php
public function update(StudentMesRequest $request)
{
    Auth::user()->update($request->all());

    return Redirect::route('stu_home');
}
```

以上两种方法都可以完成验证功能(看自己喜好吧,使用后者代码比较简洁,模块化,前面的登录也可以这样来写,你可以跳转回去试试),如果现在乱填表单,我们依旧可以看到错误提示,而且错误提示会自动消失,因为我们在edit.blade.php中添加了 @include('errors.list')

如果填写规范,提交后返回到stu_home页.这个时候我们可以添加一个成功信息,来增强用户体验

在 Auth::user()->update($request->all()) 添加:

    session()->flash('message', '个人信息修改成功');

接着我们去让session信息读取出来,在master.blade.php中添加

    <div class="container">
        @include('flash')
    </div>

前面有提到,相信你知道放在哪儿比较合适.接着创建我们的flash.blade.php

    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

再次修改资料，成功后会看到提示信息,而且信息也会自动隐藏.

### 做了这么多,我还是提醒大家,随时随地查阅官方文档,或者对比我的代码,以免留下隐患

最后,我们来完成学生端的查分功能,首先,我们知道,users表里面是没有成绩字段的,所以我们这个时候需要建立第二个模型,Grade模型. let's do that

    php artisan make:model Grade

找到Grade.php,添加:

```php
    protected $table = 'grades';

    protected $fillable = [
        'math',     #高数
        'english',  #英语
        'c',        #c语言
        'sport',    #体育
        'think',    #思修
        'soft',     #软件工程
    ];

    protected static function rules(){
        return [
            'math' => 'digits_between:0,2',
            'english' => 'digits_between:0,2',
            'c' => 'digits_between:01,2',
            'sport' => 'digits_between:1,2',
            'think' => 'digits_between:1,2',
            'soft' => 'digits_between:1,2',
            ];
    }

有了前面User模型的基础,相信不难理解以上代码.接着在 /database/migrations/ 下找到 .._create_grades_table.php,修改文件:

    public function up()
    {
        Schema::create('grades', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('math')->nullable();
            $table->integer('english')->nullable();
            $table->integer('c')->nullable();
            $table->integer('sport')->nullable();
            $table->integer('think')->nullable();
            $table->integer('soft')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grades');
    }
```

这里有一点要说的,关于外键,我很多时候创建外键都不是一次成功的,我感觉我每次在这里都会出点问题,所以,大家要是创建成功,一定要有耐心,后面在phpMyAdmin里查看数据表会有惊喜,留给你去发现(我就不多说了),总之,这里不能跳过,对照源码,查阅资料,花点时间.

因为我们现在还没有完成后台的模块,所以不能进入后台上传分数,这里我们选择在seed里面填充数据
,打开UserTableSeeder.php,偷个懒,就不再创建一个seeder了,加入:

    Grade::create([
        'user_id' => 1210311232,
        'math'    => 99,
        'english'    => 80,
        'c'    => 96,
        'sport'    => 95,
        'think'    => 99,
        'soft'    => 98,
        ]);

    Grade::create([
        'user_id' => 1210311233,
        ]);

因为成绩是能为空的,所以像下面那样创建也是可以的,接着运行:

    php artisan db:seed

这里我们需要在User.php里面建立和Grade一对一的模型关系,官方文档链接,[link](http://www.golaravel.com/laravel/docs/5.0/eloquent/),想要更深入的理解Laravel Eloquent,请参考[岁寒](http://lvwenhan.com/laravel/421.html)的三篇关于Eloquent的博文.

在User.php中添加:

    public function grade()
    {
        return $this->hasOne('App\Grade');
    }

接着在试图里面去得到成绩,在前面所说的那个完成查询成绩的地方加上:

    @include('stu.grade')

接着创建stu/grade.blade.php:

```php
<button type="button" class="btn btn-warning"
data-container="body" data-toggle="popover" data-placement="bottom"
title="{{ Auth::user()->name }}--成绩"
data-content="
    ************** 高数 -- {{ $grade->math }} **************
    ************** 英语 -- {{ $grade->english }} **************
    ************ C语言 -- {{ $grade->c }} **************
    ************** 体育 -- {{ $grade->sport }} **************
    ************** 思修 -- {{ $grade->think }} **************
    ************** 软件 -- {{ $grade->soft }} **************
">
    点击,查看成绩
</button>
```

那么,这个$grade从何而来,我们回到StudentController,修改home方法:

    $grade = Auth::user()->grade;

    return view('stu.home', compact('grade'));

然后需要在我们的main.js里面添加这样一行:

    $('[data-toggle="popover"]').popover();

这里可以参考bootstrap文档,[弹出框](http://v3.bootcss.com/javascript/#popovers)

接着刷新我们的浏览器,点击查询分数,可以看到

![stu_grade](http://img2.ph.126.net/T5k2e3oyqe20EIQikiUFag==/6630778594141491905.jpg)

####下面,我们开始后台的模块

还是老样子,我们先退出当先登录用户,回到登录页面,登录管理员帐号

    1234567890
    root

看看我们的url跳转到 http://localhost:8000/admin

接着来添加我们的后台路由:

```php
#查看成绩排名
Route::get('admin/grade', [
    'as' => 'grade_list', 'uses' => 'Admin\GradeController@index']);
#上传分数
Route::post('admin/upload_grade', [
    'as' => 'upload_grade', 'uses' => 'Admin\AdminController@upload_grade']);
#资源控制器,学生的增删改查
Route::resource('admin', 'Admin\AdminController');
```

首先来看看我们的资源控制器, [官方文档](http://www.golaravel.com/laravel/docs/5.0/controllers/), 运行(注意路径):

    php artisan make:controller Admin/AdminController

我们当前的url对应着index方法,进入AdminController.php:

    public function __construct()
    {
        $this->middleware('admin');
    }

这是什么意思？先查看Kernel.php,我们向 $routeMiddleware 数组里面添加:

    'admin' => 'App\Http\Middleware\isAdmin'

代表注册中间件 admin,接着运行如下命令新建isAdmin.php:

    php artisan make:middleware isAdmin

进入到isAdmin.php:

```php
public function handle($request, Closure $next)
{
    if (!Auth::check()) {
        return Redirect::route('login');
    } else {
        if (!Auth::user()->is_admin) {
            session()->flash('message_warning', '您不是管理员！无法进入相关区域');
            return Redirect::route('stu_home');
        }
    }
    return $next($request);
}
```

过滤没有登录的用户,重定向到登录页,过滤普通登录用户,重定向到学生登录首页,而且，返回一条警告信息,提示那是管理员区域.打开我们的flash.blade.php,增加:

```html
@if (Session::has('message_warning'))
    <div class="alert alert-warning">
        {{ session('message_warning') }}
    </div>
@endif
```

现在来测试我们的中间件工作如何

* 在url中输入http://localhost:8000/login,会发现无法跳转,现在你可以回过头看看之前路由中添加的中间件, [点击跳转](#route1)

* 在url中输入http://localhost:8000/logout,退出登录回到登录页

* 输入一组学生帐号,然后在url中输入http://localhost:8000/admin,你会看到页面刷新,并且弹出警告信息.

![warning](http://img0.ph.126.net/r-Y8HYxnc9GaoJYbNjp8mA==/2777313595222015641.jpg)

下面,继续查看AdminController中的index方法:

```php
public function index()
{
    $result = User::where('is_admin', 0);
    $count = $result->count();
    $users = $result->paginate(10);
    return view('Admin.index', compact('users', 'count'));
}
```

$count,是学生数量,先传入,后面要使用,$users,这里我不知道怎么说,就是可以实现分页功能,参考官方文档,[Link](http://www.golaravel.com/laravel/docs/5.0/pagination/),代表我后面的视图文件中需要分页,每页显示10个user信息.接下来新建我们的视图文件 Admin/index.blade.php

```html
@extends('master')

@section('title')
    管理员
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">

                @include('errors.list')

                <h3 align="center">学生信息表</h3>
                <table class="table table-hover">
                    <tr>
                        <td>学号</td>
                        <td>姓名</td>
                        <td>性别</td>
                        <td>手机</td>
                        <td>班级</td>
                        <td>邮箱</td>
                        <td>操作</td>
                    </tr>
                    @if (count($users))
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->sex }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->pro_class }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal{{$user->id}}">更新分数</button>
                                    <form action="{{ url('admin/'.$user->id) }}" style='display: inline' method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('确定删除?')">删除</button>
                                    </form>
                                </td>
                            </tr>

                            read1

                        @endforeach
                    @else
                        <h1>没有学生名单,请管理员添加</h1>
                    @endif
                </table>
                <?php echo $users->render(); ?>
            </div>
            read2
        </div>

    </div>
@stop
```

注意两个 read 区域,后面用来填充其他功能,这个时候登录管理员帐号密码,你应该能看到下面的效果

![Index](http://img2.ph.126.net/ht_p4ve2bjdgztWscVeKjg==/6619130367956856221.jpg)

<?php echo $users->render(); ?>  输出分页列表,现在我们只有两组数据,所以暂时看不到,待会完成添加学生的功能之后再来测试这个效果.我们先做删除功能,可以看到删除按钮提交到
http://localhost:8000/admin/1210311232, form表单里面有个值为DELETE的隐藏输入域,告诉路由,这个请求对应这资源控制器的 destory 方法,我们来完成

```php
public function destroy(User $user)
{
    $name = $user->name;
    $user->delete();
    session()->flash('message', $name."同学已经被移除");
    return Redirect::back();
}
```

看到参数 User $user, 为什么不是id,你一定会这样想.我们打开 App/Http/Provider/RouteServiceProvider.php,修改boot方法,这里我们可以查阅官方文档,[路由模型绑定](http://www.golaravel.com/laravel/docs/5.0/routing/)

```php
public function boot(Router $router)
{
    parent::boot($router);

    $router->bind('admin', function($id){
        return \App\User::findOrFail($id);
    });

    //$router->model('admin', 'App/User');
}
```

上面两种写法都行,看个人喜好.上面写法比较直观,相信你现在也知道了destory方法参数为什么可以那样写了,你可以在destory中dd($user);在浏览器中点击删除,确定删除,就可以看到页面中输出对应的user信息,下面,去掉destory中dd($user),刷新,可以看到对应同学消失,并且出现提示信息,还是贴个图片,我觉得这样能反馈一些信息.

![Delete](http://img2.ph.126.net/eC6f0VCiWj85AnBCZh_U_g==/3355744672446850589.jpg)

可能看到上面图片中的右侧栏吧,我们先把它完成,然后一一实现它的功能.将index视图文件中的read2替换成:

    @include('Admin.right_bar')

接着新建Admin/right_bar.blade.php:

```html
<div class="col-md-2">
    <h3>总人数: {{ $count }}</h3>
    <a href="/admin"><button class="btn btn-success btn-lg">学生列表</button></a>
    <br /><br />
    <a href="/admin/create"><button class="btn btn-primary btn-lg">添加学生</button></a>
    <br /><br />
    <a href="/admin/grade"><button class="btn btn-info btn-lg">成绩排名</button></a>
    <br /><br />
    <a href="{{ URL::route('download_stu_list_excel') }}"><button class="btn btn-default btn-lg">下载名单</button></a>
    <br /><br />
    <a href="{{ URL::route('download_grade_list_excel') }}"><button class="btn btn-lg btn-default">导出成绩</button></a>
</div>
```

学生列表 -- 返回学生列表,即 http://localhost:8000/admin

添加学生 -- 添加学生页面,即 http://localhost:8000/admin/create

成绩排名 -- 查看成绩列表,即 http://localhost:8000/admin/grade

下载名单 -- 下载学生信息Excel

导出成绩 -- 下载学生成绩Excel

添加学生,对应AdminController中的create方法:

```php
public function create(){
    $result = User::where('is_admin', 0);
    $count = $result->count();
    return view('Admin.create', compact('count'));
}
```

接着去创建Admin/create.blade.php:

```html
@extends('master')

@section('title')
    添加学生
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>添加学生</h2>
                <hr />

                @include('errors.list')

                <div class="form-group">
                    {!! Form::model($user = new \App\User, ['url' => 'admin/', 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            {!! Form::label('id', '学号: ', ['class' => 'control-label col-md-1']) !!}
                            <div class="col-md-4">
                                {!! Form::text('id', old('id'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', '姓名: ', ['class' => 'control-label col-md-1']) !!}
                            <div class="col-md-4">
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-5">
                                {!! Form::submit('完成,创建', ['class' => 'btn btn-success form-control']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            @include('Admin.right_bar')
        </div>
    </div>
@stop
```

点击添加学生:

![create](http://img2.ph.126.net/X-coZOxhAC6V5qYOaQTPGg==/6599300675750906321.jpg)

这里我们Form::model(obj, [options]),传入一个新的对象$user, 这里可以查看 /vendor/illuminate/html/FormBuilder.php中的model方法,Form自动帮你填好表单,这里因为是新建,表单为空,后面你就明白了. 接着看我们的url地址, http://localhost:8000/admin,对应控制器中的store方法,

```php
public function store(Request $request)
{
    $this->validate($request, [
        'id' => 'required|digits:10|unique:users',
        ]);
    $user = new User;
    $user->id = $request->id;
    $user->name = $request->name;
    $user->password = Hash::make($user->id);
    $user->save();
    session()->flash('message', $user->name."同学添加成功");
    DB::insert('insert into grades (user_id, math, english, c, sport, think,soft)
        values (?,?,?,?,?,?,?)', [$request->id,null,null,null,null,null,null]);
    return Redirect::to('admin');
}
```

我解释一下,这里,也就是我的思路,管理员只能添加学生初始化它的学号,姓名,密码(默认为学号),同时在grades表中添加对应的一条记录,至于写法为什么这么不优雅！因为我尝试其他的都不行,你有兴趣可以试试,有好的方法也可以提交给我,创建成功后返回admin并提示信息.

现在我们开始添加学生吧,超过10条就可以了,以便于我们后面的效果测试

![list](http://img1.ph.126.net/_L4uIqT4-nyfjOqYMWPg5Q==/1166432303506973500.jpg)

接下来完成我们更新成绩功能.

    #上传分数
    Route::post('admin/upload_grade', [
        'as' => 'upload_grade', 'uses' => 'Admin\AdminController@upload_grade']);

这是一个post路由(响应post http请求), 现在完成更新分数的form表达,讲前面的redd1替换成

    @include('Admin.upload_grade')

创建Admin/upload_grade.blade.php:

```html
<div class="modal fade" id="myModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">{{ $user->name }}</h4>
            </div>
            {!! Form::model($user->grade, ['url' => '/admin/upload_grade', 'class' => 'form-horizontal']) !!}

              <div class="modal-body">

                {!! Form::hidden('user_id', $user->id) !!}
                <h4>
                  {!! Form::label('math', '高数: ', ['class' => 'control-label']) !!}
                  {!! Form::text('math', null, ['class' => 'form-control', 'required']) !!}
                </h4>
                <h4>
                  {!! Form::label('english', '英语: ', ['class' => 'control-label']) !!}
                  {!! Form::text('english', null, ['class' => 'form-control', 'required']) !!}
                </h4>
                <h4>
                  {!! Form::label('c', 'C语言: ', ['class' => 'control-label']) !!}
                  {!! Form::text('c', null, ['class' => 'form-control', 'required']) !!}
                </h4>
                <h4>
                  {!! Form::label('sport', '体育: ', ['class' => 'control-label']) !!}
                  {!! Form::text('sport', null, ['class' => 'form-control', 'required']) !!}
                </h4>
                <h4>
                  {!! Form::label('think', '思修: ', ['class' => 'control-label']) !!}
                  {!! Form::text('think', null, ['class' => 'form-control', 'required']) !!}
                </h4>
                <h4>
                  {!! Form::label('soft', '软件: ', ['class' => 'control-label']) !!}
                  {!! Form::text('soft', null, ['class' => 'form-control', 'required']) !!}
                </h4>

              </div>

              <div class="modal-footer">
                {!! Form::button('关闭', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                {!! Form::submit('提交', ['class' => 'btn btn-success']) !!}
              </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
```

现在刷新浏览器,点击更新分数

![upload_grade](http://img2.ph.126.net/9WNcF_uh1fkVwOe0-k_9HQ==/6630559791327277643.jpg)

接下来就可以完成分数的上传功能,打开AdminController,添加:

```php
public function upload_grade(Request $request)
{
    $this->validate($request, Grade::rules());
    $grade = Grade::where('user_id', $request->user_id)->first();
    $grade->math = $request->math;
    $grade->english = $request->english;
    $grade->c = $request->c;
    $grade->sport = $request->sport;
    $grade->think = $request->think;
    $grade->soft = $request->soft;
    $grade->save();
    session()->flash('message', '成绩提交成功');
    return Redirect::back();
}
```

这里有个地方有点问题,分数应该是0-100,参考前面Grade.php中的静态方法

    digits_between:1,2   #代表是数字1位到2位,也就是0-99

本来应该使用 min:0|max:100 但是这里实际会把分数当作字符串处理,而不是数字,这样写,会判断成0-100长度的字符串,算是一个小bug吧,就先这样,我还没见过我们学校有考试100的人,哈哈！

下面,我们给每个人上传一下分数.你现在能随便登录一个学生帐号密码,能查询到自己的成绩

对了,别忘了在validation.php里面设置你的提示信息,这里就不再赘述.

接着,我们来完成成绩排名,看我们的路由,先新建Grade控制器:

    php artisan make:controller Admin/GradeController --plain

两个方法:

```php
public function __construct()
{
    $this->middleware('admin');
}

public function index()
{
    $result = User::where('is_admin', 0);
    $users = $result->get();
    $count = $result->count();
    return view('Admin.list', compact('count', 'users'));
}
```

$users是我们的学生信息资源,传递到Admin/list.blade.php视图.

```html
@extends('master')

@section('title')
    学生成绩列表
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3 align="center">学生成绩表</h3>
                <table class="table table-striped" id="sortTable">
                    <thead>
                        <tr>
                            <th class="col-md-2">学号 <a href="javascript:void(0)"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
                            <th>姓名 <a href="javascript:void(0)"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
                            <th>高数 <a href="javascript:void(0)"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
                            <th>英语 <a href="javascript:void(0)"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
                            <th>C语言 <a href="javascript:void(0)"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
                            <th>体育 <a href="javascript:void(0)"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
                            <th>思修 <a href="javascript:void(0)"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
                            <th>软件 <a href="javascript:void(0)"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
                        </tr>
                    </thead>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->grade->math}}</td>
                            <td>{{$user->grade->english}}</td>
                            <td>{{$user->grade->c}}</td>
                            <td>{{$user->grade->sport}}</td>
                            <td>{{$user->grade->think}}</td>
                            <td>{{$user->grade->soft}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            @include('Admin.right_bar')

        </div>
    </div>
@stop
```

在浏览其中点击成绩排名,你能看到所有人的成绩表吧

![grade1](http://img0.ph.126.net/J3hykK_OSTliVhw94Gxt-A==/6630546597187744827.jpg)

那么,问题来了,首先,分数太多,不能突出重点(我认为是不及格的分数),第二不能将科目分数进行排序,我们来一个一个解决.

分数的问题,我觉得讲不及格分数显示为红色比较好,js有点基础的同学应该很中意就办到了.

我们先给tr设置一个class属性

    ...
    @foreach ($users as $user)
        <tr class="myGrade">
    ...

打开我们的main.js,添加:

```js
$('.myGrade').each(function(){
    $(this).children().each(function(){
        if ($(this).html() < 60){
            $(this).addClass("notPass");
        }
    });
});
```

然后新建一个mian.css文件,放在public/css目录下

    .notPass{
        color: red;
    }

这个时候你再次刷新浏览器,你可以看到这样的效果了(有点夸张,大学挂科人数不多的)

![grade2](http://img1.ph.126.net/WWHqs3szjNCoQbLZidegxA==/6630875351164737127.jpg)

接着完成表单的排序,官网打开速度很慢,可自行百度下载,或者去项目源文件找到 /resource/js/jquery.tablesorter.min.js ,拷贝到public/js/目录下, 在master.blade.php下引入

    <script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script>

然后在main.js里面添加这样一行:

    $("#sortTable").tablesorter();

回到list视图文件,给table添加一个id 为 sortTable

刷新浏览器,你就能点击表头进行排序了.更多用法你也可以去参考官方文档

现在我们可以使用前端自动化工具来处理我们的css和js脚本文件了

安装node,安装gulp,在根目录下执行:

    npm install

如果你实在安装不成功,可以去googel各种安装方法,或者跳过此节,这样只讲述了基础用法,
我们接着继续resources目录下创建css和js文件夹,接着将以下文件复制到:

    js/
      bootstrap.min.js
      jquery.min.js
      jquery.tablesorter.min.js
      main.js

    css/
      bootstrap.min.js
      main.js

然后打开gulpfile.js,修改:

```js
var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.styles([
        "bootstrap.min.css",
        "main.css"
        ]);

    mix.scripts([
        "jquery.min.js",
        "bootstrap.min.js",
        "jquery.tablesorter.min.js",
        "main.js"
        ]);
});
```

接着执行:

    gulp

你就可以找到 public/css/all.css 和 public/js/all.js文件了

接着你可以删除master.blade.php里所有引入的css和js脚本,现在只需要引入两个文件:

```html
<link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">

<script type="text/javascript" src="/js/all.js"></script>
```

刷新浏览器,查看各个功能,正常使用(确保public文件夹下引入bootstrap的fonts文件)

最后,我们完成名单表和成绩表的导出功能,这里我们使用laravel Excel

在composer.json require中加入:

    "maatwebsite/excel": "~2.0.0"

执行:

    composer update

安装成功后在config/app.php中加入

    'Maatwebsite\Excel\ExcelServiceProvider',

    'Excel'     => 'Maatwebsite\Excel\Facades\Excel',

然后我们先测试一下是否能成功运行,参考官方文档,[Laravel Excel](http://www.maatwebsite.nl/laravel-excel/docs/export),测试各种功能

这里我只是演示一下,新建一个TestController,在route.php中添加

    Route::get('/test', 'TestController@index');

在TestController的index方法中添加:

```php
Excel::create('测试', function($excel) {

$excel->sheet('Sheetname', function($sheet) {

    $sheet->fromArray(array(
        array('data1', 'data2'),
        array('data3', 'data4')
    ));

});

})->export('xls');
```

然后你可以修改right_bar.blade.php中一个超链接地址为 href="/test",接着点击,你会发现浏览器提示下载文件   测试.xls,就是这么简单.

最后我们来完成名单成绩的下载,添加路由:

```php
Route::get('download/stuList', [
'as' => 'download_stu_list_excel', 'uses' => 'Admin\ExcelController@stuList']);

Route::get('download/grade', [
'as' => 'download_grade_list_excel', 'uses' => 'Admin\ExcelController@grade']);
```

执行:

    php artisan make:controller Admin/EcxelController --plain

```php
/**
 * 得到学生名单，下载excel文档
 */
public function stuList()
{
    $users = $this->getUsersDatas();

    Excel::create('学生信息表', function($excel) use($users) {

        $excel->sheet('sheetName', function($sheet) use($users) {

                $sheet->fromArray($users, null, 'A1', false, false);

                $sheet->prependRow(1, array(
                    '学号', '姓名', '性别', '手机', '班级', '邮箱'
                ));
                $sheet->setWidth([
                    'A' => 11,
                    'B' => 8,
                    'C' => 5,
                    'D' => 12,
                    'E' => 9,
                    'F' => 20,
                    ]);
                $sheet->getDefaultStyle();

        });

    })->export('xls');
}

/**
 * @return 学生信息数组
 */
public function getUsersDatas()
{
    return User::where('is_admin', 0)
                ->select('id', 'name', 'sex', 'phone', 'pro_class', 'email')
                ->get()
                ->toArray();
}

/**
 * 得到成绩表
 */
public function grade()
{
    $grades = $this->getGradeDatas();

    Excel::create('学生成绩表', function($excel) use($grades) {

        $excel->sheet('sheetName', function($sheet) use($grades) {

            $sheet->fromArray($grades, null, 'A1', false, false);

            $sheet->prependRow(1, array(
                '学号', '姓名', '高数', '英语', 'C语言', '体育', '思修', '软件'
                ));

            $sheet->setWidth([
                'A' => 11,
                'B' => 10,
                'C' => 5,
                'D' => 5,
                'E' => 6,
                'F' => 5,
                'G' => 5,
                'H' => 5,
                ]);

        });
    })->export('xls');

}

/**
 * 获取学生成绩数组
 */
public function getGradeDatas()
{
    $grades = Grade::select('user_id', 'id', 'math',
        'english', 'c', 'sport', 'think', 'soft')->get()->toArray();

    foreach ($grades as $key => $value) {
        $grades[$key]['id'] = User::findOrFail($value['user_id'])->name;
    }

    return $grades;

}
```

我总结了一下Excel的输出

* 生成数据数组
* 输出数据表

所以我写了两个得到想要输出的数据功能函数,这里对照官方文档看一下,没什么好解释的,然后刷新浏览器,你就可以下载名单和导出成绩了.

最后,真心谢谢能看到这样的小伙伴!
-----

### 修改密码功能

laravel5中给我们提供了简单使用的修改密码功能,官方文档,[link](http://www.golaravel.com/laravel/docs/5.0/authentication/).

由于我们之前执行了  php artisan fresh, 所以laravel5自带的一些模块被我们删除了,别急，还是先新建我们的路由,在routes.php中添加:

    Route::controller('password', 'PasswordController');

执行:

    php artisan make:controller PasswordController --plain

修改PasswordController.php:

```php
<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
     * @return void
     */
    public function __construct(Guard $auth, PasswordBroker $passwords)
    {
        $this->auth = $auth;
        $this->passwords = $passwords;
        $this->subject = '学生成绩系统用户密码修改';
        $this->redirectTo = '/';
        $this->middleware('guest');
    }

}
```

这些是laravel5自带的,我只是直接借用过来

这时候修改我们的login.blade.php:

```php
...
{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
<a class="btn btn-link" href="{{ url('/password/email') }}">忘记密码？</a>
...
```

我们到登录页,点击忘记密码,游览器会提示我们 view(auth.password) 找不到,我们去新建视图文件auth/password.blade.php:

```html
@extends('master')

@section('title')
    修改密码
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">密码找回</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('errors.list')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    发送邮件
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
```

这时候来配置我们的一些文件,打开config/mail.php:

    'host' => 'smtp.126.com',     //这里126换成163也可以,qq没试过

    'port' => 25,

    'from' => ['address' => '邮箱帐号', 'name' => '学生成绩系统'],

    'username' => '邮箱帐号',

    'password' => '邮箱密码',

接着,新建我们的修改密码数据库表

    php artisan make:migration create_password_resets_table

修改 ..create_password_resets_table.php:

```php
public function up()
{
    Schema::create('password_resets', function(Blueprint $table)
    {
        $table->string('email')->index();
        $table->string('token')->index();
        $table->timestamp('created_at');
    });
}

public function down()
{
    Schema::drop('password_resets');
}
```

执行:

    php artisan migrate

这是时候,建立我们的[邮件视图文件],新建emails/password.blade.php:

```php
Click here to reset your password: {{ url('password/reset/'.$token) }}
```

这时候刷新浏览器,填写一个存在的邮箱后(前提是你登录进去修改过的邮箱),这里需要使用自己的邮箱方便测试,点击发送,马上你就可以收到邮件了.

点击邮件中的链接,浏览器会提示里找不到view(auth.reset),新建reset.blade.php

```html
@extends('master')

@section('title')
    修改密码
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">

                    @include('errors.list')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail </label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
```

接着你就可以测试密码修改了,这个功能也就完成了.

拓展

* 你可以在 /resources/lang/en/passwords.php下查看修改密码的一些提示信息,你也可以按照自己的想法去修改他们

* 你可以在 /vendor/laravel/framework/src/Illuminate/Foundation/Auth/ResetPasswords.php 看到修改密码功能实现的各个细节,包括更改密码视图地址,更改成功后自动执行登录等,可以去看看.

#### 修正:
当初创建学生无法初始化grade是没有道理的，现在你可以直接这样了，修改AdminController，干掉那段不干净的代码吧!

    $grade = new Grade;
    $grade->user_id = $reuqest->id;
    $grade->save();
