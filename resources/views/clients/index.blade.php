@extends('layouts.main')

@section('content')
<div class="two-cols">
    <div class="items-list clients-list">
        <div class="list-item lhead">
            <div>#</div>
            <div>Nom complet</div>
            <div>Adresse</div>
            <div>Téléphone</div>

        </div>
    @foreach ($Clients as $Client)
        <div class="list-item">
            <div>{!! $Client->code !!}</div>
            <div>{!! $Client->fullname !!}</div>
            <div>{!! $Client->address !!}</div>
            <div>{!! $Client->phone !!}</div>

        </div>
    @endforeach
    </div>

</div>
@endsection
