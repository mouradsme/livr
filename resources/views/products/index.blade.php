@extends('layouts.main')

@section('content')
<div class="two-cols">
    <div class="items-list factories-list">
        <div class="list-item lhead">
            <div>#</div>
            <div>Produit</div>
            <div>Prix</div>
            <div># Usine</div>

        </div>
    @foreach ($Products as $Product)
        <div class="list-item">
            <div>{!! $Product->id !!}</div>
            <div>{!! $Product->name !!}</div>
            <div>{!! $Product->price !!}</div>
            <div>{!! $Product->factory !!}</div>

        </div>
    @endforeach
    </div>

</div>
@endsection
