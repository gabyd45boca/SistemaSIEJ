@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.login_message'))

@section('auth_body')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-image: url('{{ asset('vendor/adminlte/dist/img/fondo.png') }}');
            background-size: cover; /* Cambiado a 'contain' para mantener el tamaño original */
            background-repeat: no-repeat; /* Evita la repetición de la imagen */
            background-position: center center; /* Centra la imagen en el fondo */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        /* ... (resto del código) ... */

        @media (max-width: 640px) {
            /* Ajustes específicos para pantallas pequeñas */
            body {
                background-size: cover; /* Ajusta el tamaño de la imagen para que quepa completamente en pantallas pequeñas */
            }
            h1 {
                text-align: center; /* Alinea el texto al centro en pantallas pequeñas */
                font-size: 3xl; /* Tamaño de fuente para pantallas pequeñas */
            }
        }

        .btn-custom {
            background-color: #696969; /* Cambia el color de fondo */
            border: none; /* Elimina el borde */
            color: white; /* Cambia el color del texto */
            transition: background-color 0.3s ease; /* Transición suave para el hover */
        }

        .btn-custom:hover {
            background-color: #357abd; /* Cambia el color de fondo al hacer hover */
        }
        
    </style>
    <form action="{{ $login_url }}" method="post">
        @csrf

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.password') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Login field --}}
        <div class="row">
            <div class="col-7">
                <div class="icheck-primary" title="{{ __('adminlte::adminlte.remember_me_hint') }}">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label for="remember">
                        {{ __('adminlte::adminlte.remember_me') }}
                    </label>
                </div>
            </div>

            <div class="col-5">
                <button type="submit" class="btn btn-block btn-lg d-flex align-items-center justify-content-center btn-custom">
                    <span class="fas fa-user mr-2"></span>
                    {{ __('adminlte::adminlte.sign_in') }}
                </button>
            </div>

        </div>

    </form>
@stop

