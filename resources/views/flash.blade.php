@if (Session::has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif