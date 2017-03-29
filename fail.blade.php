@if(Session::has('error'))
    <div class="alert alert-danger notify">
        {{ Session::get('error') }}
    </div>

@elseif($errors->any())
    <div class="alert alert-danger notify">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif