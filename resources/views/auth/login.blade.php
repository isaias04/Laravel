@extends('layouts.login') 

@section('title', 'Iniciar sesión')

@section('content')
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black shadow">
          <div class="row g-0">
            <!-- Formulario -->
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                    <i class="bi bi-person" style="font-size: 5rem; color: #2757F5;"></i>
                  <h4 class="mt-1 mb-5 pb-1">Bienvenido al sistema</h4>
                </div>

                <form method="POST" action="{{ route('login') }}">
                  @csrf

                  <p class="mb-4">Ingresa tus credenciales para continuar</p>

                  <!-- Email -->
                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email"
                      class="form-control @error('email') is-invalid @enderror"
                      value="{{ old('email') }}" required autofocus
                      placeholder="Correo electrónico" />
                    <label class="form-label" for="email">Correo electrónico</label>
                    @error('email')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <!-- Password -->
                  <div class="form-outline mb-4">
                    <input type="password" id="password" name="password"
                      class="form-control @error('password') is-invalid @enderror"
                      required placeholder="Contraseña" />
                    <label class="form-label" for="password">Contraseña</label>
                    @error('password')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <!-- Recordarme -->
                  <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                      {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      Recordarme
                    </label>
                  </div>

                  <!-- Botón de login -->
                <div class="text-center pt-1 mb-5 pb-1 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Ingresar
                        </button>
                        @if (Route::has('password.request'))
                        <a class="text-muted d-block" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?</a>
                            @endif
                        </div>


                  <!-- Registro -->
                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">¿No tienes una cuenta?</p>
                    @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="btn btn-outline-primary">Regístrate</a>
                    @endif
                  </div>
                </form>

              </div>
            </div>

            <!-- Imagen y texto lateral -->
           <div class="col-lg-6 d-flex align-items-center gradient-custom-2 animate-slide-in">
  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
    <h4 class="mb-4">Imnovación y arte</h4>
    <p class="small mb-0">
      Accede a herramientas que te ayudarán a gestionar tu información de forma segura y eficiente.
      Únete a nuestra comunidad y descubre todo lo que tenemos para ofrecerte.
    </p>
  </div>
</div>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection