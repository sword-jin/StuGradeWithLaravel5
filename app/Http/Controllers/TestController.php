<?php namespace App\Http\Controllers;

use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TestController extends Controller {

	public function index()
    {
        return view('test');
    }

    public function post()
    {
        $file = Input::file('grade');
        \Excel::load($file->getRealPath(), function($reader){})->get();
        return redirect()->back();
    }

}
