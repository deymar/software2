@extends('../layouts/personal/estructuraPersonal')

@section('body-personal')

<div class="bienvenida">
    Bienvenid@ {{auth('personal')->user()->user_name}}
</div>

@endsection
