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