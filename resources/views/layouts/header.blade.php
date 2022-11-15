@if (auth()->check())
    <div class="nav header">
        <div class="brand">
            <div class="logo"></div>
        </div>

       <div class="nav-section">
        @if (\Auth::user()->role == "0")
        <a href="{{ route('add-user-page') }}">Ajouter utilisateur</a>
        <a href="{{ route('add-delivery-page') }}">Ajouter livraison</a>
        <a href="{{ route('add-client-page') }}">Ajouter client</a>
        <a href="{{ route('add-factory-page') }}">Ajouter usine</a>
        <a href="{{ route('add-product-page') }}">Ajouter produit</a>
        @else
        @endif

        </div>
    </div>
@endif
