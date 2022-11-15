@extends('layouts.main')

@section('content')

<div class="form">
    <h1 class="title">Ajouter une usine</h1>
    <form method="POST" action="{{ route('add-factory') }}" >
        @csrf
        <div class="field">
            <div class="label" for="name">Nom</div>
            <div class="input">
                <input type="text" id="name" name="name" placeholder="Nom de l'usine" />
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
        @if ( \Session::has('success'))
            {!! \Session::get('success') !!}
        @endif
        @if ( \Session::has('fail'))
            {!! \Session::get('fail') !!}
        @endif
    </div>
</div>

@endsection
