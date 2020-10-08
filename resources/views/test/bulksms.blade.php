<html>
<body>
<form action='' method='post'>
    @csrf
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    @endif

    @if( session( 'success' ) )
        {{ session( 'success' ) }}
    @endif

    <label>Phone numbers (seperate with a comma [,])
        <input type='text' name='numbers'/>
    </label>

    <label>Message
        <textarea name='message'></textarea>
    </label>

    <button type='submit'>Send!</button>
</form>
</body>
</html>
