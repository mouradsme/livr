@extends('layouts.main')

@section('content')

<div class="form">
    <h1 class="title">Ajouter une livraison</h1>
    <div class="form-inner"  >
        @csrf

        <div class="field">
            <div class="label" for="deliverer">Livreur</div>
            <div class="input">
                <select name="deliverer" id="deliverer">
                    @foreach ( $Deliverers as $Deliverer )
                        <option value="{{ $Deliverer->id }}">{{ $Deliverer->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <div class="label" for="client">Client</div>
            <div class="input">
                <select name="client" id="client">
                    @foreach ( $Clients as $Client )
                        <option value="{{ $Client->id }}">{{ $Client->fullname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="field">
            <div class="label" for=""></div>
            <div class="input">
                <a href="#" class="button" id="addProduct">Ajouter un produit</a>
            </div>
        </div>
        <div class="field">
            <div class="label" for=""></div>
            <div class="input">
                <a href="#" class="button" id="viewProducts">Voir les produits (<span id="cartTotal">0</span>)</a>
            </div>
        </div>


        <div class="field">
            <div class="label" for=""></div>
            <div class="input">
                <input type="submit" value="Ajouter" id="addDelivery"/>
            </div>
        </div>


    </div>
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



<div class="modal micromodal-slide" id="products-list-modal" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="products-list-modal-title">
          <header class="modal__header">
            <h2 class="modal__title" id="products-list-modal-title">
              Liste des produits
            </h2>
            <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
          </header>
          <main class="modal__content" id="products-list-modal-content">

          </main>
          <footer class="modal__footer">
            <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">OK</button>
          </footer>
        </div>
      </div>
    </div>
<div class="modal micromodal-slide" id="add-product-modal" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="add-product-modal-title">
        <header class="modal__header">
          <h2 class="modal__title" id="add-product-modal-title">
            Ajouter un produit
          </h2>
          <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        </header>
        <main class="modal__content" id="add-product-modal-content">
            <p>
                <select name="product" id="product">
                    @foreach ($Products as $Product)
                        <option value="{{ json_encode($Product) }}">{{ $Product->name }} | {{ $Product->price }} DZD | {{ $Product->factory_name }}</option>
                    @endforeach
                </select>
            </p>
          <p>
            <input id="product_quantity" type="number" min="1" placeholder="Quantité"/>
          </p>


        </main>
        <footer class="modal__footer">
          <button id="addToCart" class="modal__btn modal__btn-primary">Ajouter</button>
          <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Retour</button>
        </footer>
      </div>
    </div>
  </div>
@endsection
