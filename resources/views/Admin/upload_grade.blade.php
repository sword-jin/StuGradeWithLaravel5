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