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
                        <tr class="myGrade">
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