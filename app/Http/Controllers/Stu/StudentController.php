<?php namespace App\Http\Controllers\Stu;

use Auth;
use Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StudentController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function home()
    {
        $grade = Auth::user()->grade;

        return view('stu.home', compact('grade'));
    }

    public function edit()
    {
        return view('stu.edit');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|digits:11',
            'pro_class' => 'required',
            'email' => 'required|email'
            ]);

        Auth::user()->update($request->all());

        session()->flash('message', '个人信息修改成功');

        return Redirect::route('stu_home');
    }

}
