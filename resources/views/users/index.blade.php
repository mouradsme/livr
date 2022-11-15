@extends('layouts.main')

@section('content')
<div class="two-cols">
    <div class="items-list users-list">
        <div class="list-item lhead">
            <div>#</div>
            <div>Utilisateur</div>
            <div>Nom complet</div>
            <div>Téléphone</div>

        </div>
    @foreach ($Users as $User)
        <div class="list-item">
            <div>{!! $User->id !!}</div>
            <div>{!! $User->username !!}</div>
            <div>{!! $User->name !!}</div>
            <div>{!! $User->phone !!}</div>

        </div>
    @endforeach
    </div>

</div>
@endsection
