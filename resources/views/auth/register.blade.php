@extends('layouts.Register')

@section('title', 'Registro')

@section('content')
<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<!-- Estilos personalizados -->

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header text-center fw-bold fs-5">
                    {{ __('Registro') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                <span class="d-inline-flex align-items-center">
                                    <i class="bi bi-person-fill me-2"></i>{{ __('Nombre') }}
                                </span>
                            </label>
                            <div class="col-md-8">
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                <span class="d-inline-flex align-items-center">
                                    <i class="bi bi-envelope-fill me-2"></i>{{ __('Correo electrónico') }}
                                </span>
                            </label>
                            <div class="col-md-8">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end">
                                <span class="d-inline-flex align-items-center">
                                    <i class="bi bi-lock-fill me-2"></i>{{ __('Contraseña') }}
                                </span>
                            </label>
                            <div class="col-md-8">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirmar contraseña -->
                        <div class="mb-3 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                                <span class="d-inline-flex align-items-center">
                                    <i class="bi bi-lock-fill me-2"></i>{{ __('Confirmar contraseña') }}
                                </span>
                            </label>
                            <div class="col-md-8">
                                <input id="password-confirm" type="password"
                                       class="form-control"
                                       name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- Botón -->
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-person-plus-fill me-2"></i>{{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>

                        <!-- Enlace a login -->
                        <div class="text-center mt-2">
                            <small class="text-muted">
                                ¿Ya tienes cuenta?
                                <a href="{{ route('login') }}" class="text-decoration-none text-primary">
                                    Inicia sesión
                                </a>
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection