@if (auth()->check())
    <div id="sidebar">

        @php
            $routes = array(
                ['clients', 'Clients'],
                ['factories', 'Usines'],
                ['products', 'Produits'],
                ['deliveries', 'Livraisons'],
                )

        @endphp
        <div class="item {{ request()->is('/') ? 'selected' : '' }}">
            <a href="{{ route('users') }}">Utilisateurs</a>
        </div>

        @foreach ($routes as $route)
        @php $Route = $route[0]; @endphp
        <div class="item {{ request()->is($Route) ? 'selected' : '' }}">
            <a href="{{ route($Route) }}">{{$route[1]}}</a>
        </div>


        @php $Route = '' @endphp
        @endforeach



    </div>
@endif
