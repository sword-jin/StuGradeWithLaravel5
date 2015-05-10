<?php namespace App\Http\Controllers\Stu;

use Auth;
use Redirect;
use App\User;
use App\Http\Requests\StudentMesRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StudentController extends Controller {

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
        $grade = Auth::user()->grade;

        return view('stu.home', compact('grade'));
    }

    /**
     * 返回修改资料页面
     * @return [type] [description]
     */
    public function edit()
    {
        return view('stu.edit');
    }

    public function update(StudentMesRequest $request)
    {
        Auth::user()->update($request->all());

        session()->flash('message', '个人信息修改成功');

        return Redirect::route('stu_home');
    }

}
