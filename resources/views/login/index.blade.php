@extends('layouts.main')
@push('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="login-container">
        <div class="container pt-lg-7">
            <div class="row justify-content-center">
              <div class="col-lg-5">
                <h1 class="title"> Authentification </h1>
                <div class="card bg-secondary shadow border-0">

                  <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                      <small>Connectez-vous au tableau de bord</small>
                    </div>
                    <form method="POST" class="form" action="{{ route('login-action') }}">
                        @csrf
                        <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                          </div>
                          <input class="form-control" name="username"  value="{{ old('username') }}" placeholder="Utilisateur" type="text">
                        </div>
                      </div>
                      <div class="form-group focused">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                          </div>
                          <input class="form-control" name="password" placeholder="Mot de passe" type="password">
                        </div>
                      </div>

                      <div class="text-center">
                        <input type="submit" class="btn btn-primary my-4" value="Se connecter" />
                      </div>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
            <div class="notification">

                @if ( \Session::has('success'))
                    {!! \Session::get('success') !!}
                @elseif ( \Session::has('fail'))
                    {!! \Session::get('fail') !!}
                @else
                @endif
            </div>
    </div>
@endsection
