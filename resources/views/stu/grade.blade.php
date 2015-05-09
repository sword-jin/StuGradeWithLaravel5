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