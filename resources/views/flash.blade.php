@if (Session::has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@if (Session::has('message_warning'))
    <div class="alert alert-warning">
        {{ session('message_warning') }}
    </div>
@endif