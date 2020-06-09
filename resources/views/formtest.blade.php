@if($errors->any())

    @foreach($errors->all() as $key)
        {{ $key."<br>" }}
    @endforeach

@endif

<form action="{{ route('.forminsert') }}" method="POST">
    {{ @csrf_field() }}
    <input type="text" name="ad"><br><br>
    <select name="ad2[]" multiple="multiple">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select><br><br>
    <input type="checkbox" name="durumu">1<br><br>
    <input type="submit" name="gnc" value="Gnd">
</form>