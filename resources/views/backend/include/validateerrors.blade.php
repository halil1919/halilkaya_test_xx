@if($errors->any())
    @foreach($errors->all() as $key)
        <div class="alert alert-danger">{{ $key }}</div>
    @endforeach
@endif
