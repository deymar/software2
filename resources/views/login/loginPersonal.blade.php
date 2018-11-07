@extends('./../layouts/inicio/estructura')

@section('styles')
    <link rel="stylesheet" href="/css/login/loginStyle.css">    
@endsection

@section('title')
    Login Personal
@endsection

@section('imagen_fondo')
    <img src="/imagenes/personaHotel.jpg" alt="fondo">
@endsection

@section('content')
    <div class="container">

        <div class="content-login">
            <div class="title">
                Acceso de Personal
            </div>
            <form id="formLogin" class="form-login" action="{{route('validarLogin')}}" method="POST">
                {{-- toquen nesesario para los formularios --}}
                @csrf
                <div class="input-vertical">
                    <div class="error-message">

                    </div>
                    <input
                        class="input-mediano" 
                        type="text" 
                        name="user" 
                        id="" 
                        placeholder="Nombre de Usuario" 
                        autocomplete="off">
                </div>

                <div class="input-vertical">
                    <div class="error-message">

                    </div>
                    <input
                        class="input-mediano" 
                        type="text" 
                        name="pass" 
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
        var validacionURL = "<?php echo route('validarLogin');?>",
            homeURL = "<?php echo url('/');?>";
    </script>   
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/login.js"></script>
@endsection