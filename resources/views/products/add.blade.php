@extends('layouts.main')

@section('content')

<div class="form">
    <h1 class="title">Ajouter un produit</h1>
    <form method="POST" action="{{ route('add-product') }}" >
        @csrf
        <div class="field">
            <div class="label" for="name">Désignation</div>
            <div class="input">
                <input type="text" id="name" name="name" placeholder="Nom du produit" />
            </div>
        </div>

        <div class="field">
            <div class="label" for="price">Prix unitaire</div>
            <div class="input">
                <input type="number" min="0" id="price" name="price" step="0.01" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="factory">Usine</div>
            <div class="input">
                <select name="factory">
                    @foreach ($Factories as $Factory)
                        <option value="{{ $Factory->id }}">{{ $Factory->name }}</option>
                    @endforeach
                </select>
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


<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-1-title">
            Micromodal
          </h2>
          <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        </header>
        <main class="modal__content" id="modal-1-content">
          <p>
            Try hitting the <code>tab</code> key and notice how the focus stays within the modal itself. Also, <code>esc</code> to close modal.
          </p>
        </main>
        <footer class="modal__footer">
          <button class="modal__btn modal__btn-primary">Continue</button>
          <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
        </footer>
      </div>
    </div>
  </div>
@endsection
