@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif