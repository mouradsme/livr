@extends('layouts.main')

@section('content')
<div class="two-cols">
    <div class="items-list factories-list">
        <div class="list-item lhead">
            <div>#</div>
            <div>Usine</div>
            <div>Adresse</div>
            <div>Téléphone</div>

        </div>
    @foreach ($Factories as $Factory)
        <div class="list-item">
            <div>{!! $Factory->code !!}</div>
            <div>{!! $Factory->name !!}</div>
            <div>{!! $Factory->address !!}</div>
            <div>{!! $Factory->phone !!}</div>

        </div>
    @endforeach
    </div>

</div>
@endsection
