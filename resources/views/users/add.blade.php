@extends('layouts.main')

@section('content')

<div class="form">
    <h1 class="title">Ajouter un utilisateur</h1>
    <form method="POST" action="{{ route('add-user') }}" >
        @csrf
        <div class="field">
            <div class="label" for="lastname">Nom</div>
            <div class="input">
                <input type="text" id="lastname" name="lastname" placeholder="Nom de famille" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="firstnames">Prénom(s)</div>
            <div class="input">
                <input type="text" id="firstnames" name="firstnames" placeholder="Prénom(s)" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="phone">Téléphone</div>
            <div class="input">
                <input type="tel" id="phone" name="phone" placeholder="Téléphone" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="userrole">Rôle</div>
            <div class="input">
                <select name="userrole" id="userrole">
                    <option value="0">Administrateur</option>
                    <option value="1" selected>Livreur simple</option>
                    {{-- <option value="2">Livreur avancé</option> --}}
                </select>
            </div>
        </div>
        <div class="field">
            <div class="label" for="username">Utilisateur</div>
            <div class="input">
                <input type="text" id="username" name="username" placeholder="Utilisateur" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="password">Mot de passe</div>
            <div class="input">
                <input type="text" id="password" name="password" placeholder="Mot de passe" />
            </div>
        </div>
        <div class="field">
            <div class="label" for=""></div>
            <div class="input">
                <input type="submit" value="Ajouter" />
            </div>
        </div>


    </form>
    <div class="notification">
        @error('username')
            {!! $message !!}
        @enderror

        @if ( \Session::has('success'))
            {!! \Session::get('success') !!}
        @endif
        @if ( \Session::has('fail'))
            {!! \Session::get('fail') !!}
        @endif
    </div>
</div>

@endsection
