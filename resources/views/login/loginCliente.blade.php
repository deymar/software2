@extends('./../layouts/inicio/estructura')

@section('styles')
    <link rel="stylesheet" href="/css/login/loginStyle.css">    
@endsection

@section('title')
    Login Cliente
@endsection

@section('imagen_fondo')
    <img src="/imagenes/atencionCliente.jpg" alt="fondo">
@endsection

@section('content')
    <div class="container">

        <div class="content-login">
            <div class="title">
                Acceso del Cliente
            </div>
            <form id="formLogin" class="form-login" action="{{route('validarLoginHuesped')}}" method="POST">
                {{-- toquen nesesario para los formularios --}}
                @csrf
                <div class="input-vertical">
                    @if ($errors->has('usuario'))
                        <div class="error-message">
                            {{ $errors->first('usuario') }}
                        </div>
                    @endif
                    
                    @if (session('error'))
                        <div class="error-message">
                            {{ session('error') }}
                        </div>
                    @endif
                    <input
                        class="input-mediano" 
                        type="text" 
                        name="usuario" 
                        id="" 
                        placeholder="Nombre de Usuario" 
                        autocomplete="off">
                </div>

                <div class="input-vertical">
                    @if ($errors->has('password'))
                        <div class="error-message">
                            {{$errors->first('password')}}
                        </div>
                    @endif
                    <input
                        class="input-mediano" 
                        type="password" 
                        name="password" 
                        id="" 
                        placeholder="Contraseña"
                        autocomplete="off">
                </div>
                
                <div class="input-horizontal">
                    <input class="btn-form" type="submit" value="Ingresar">
                    <input class="btn-form" type="submit" value="Regresar">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var validacionURL = "<?php echo route('validarLoginHuesped');?>",
            homeURL = "<?php echo url('/');?>";
    </script>   
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/login.js"></script>
@endsection