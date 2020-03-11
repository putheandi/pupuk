@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert bg-olive">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger disabled">
        {{ session('error') }}
    </div>
@endif

@if(session('deleted'))
    <div class="alert alert-warning disabled">
        {{ session('deleted') }}
    </div>
@endif
