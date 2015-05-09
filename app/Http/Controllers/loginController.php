<?php namespace App\Http\Controllers;

use Auth;
use App\User;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller {

	public function loginGet()
    {
        return view('login');
    }

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
                ->withErrors('学号或者密码不正确，请重试！');
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return Redirect::route('login');
    }

}
