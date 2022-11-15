@extends('layouts.main')

@section('content')

<div class="form">
    <h1 class="title">Ajouter une boutique</h1>
    <form method="POST" action="{{ route('add-client') }}" >
        @csrf
        <div class="field">
            <div class="label" for="lastname">Nom du propriétaire</div>
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
            <div class="label" for="register">N° du registre</div>
            <div class="input">
                <input type="text" id="register" name="register" placeholder="N° du registre" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="address">Adresse</div>
            <div class="input">
                <input type="text" id="address" name="address" placeholder="Adresse complète" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="phone">Téléphone</div>
            <div class="input">
                <input type="tel" id="phone" name="phone" placeholder="Téléphone" />
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
