@extends('layouts.main')

@section('content')



<div class="two-cols">
    <div class="items-list deliveries-list">
        <div class="list-item lhead">
            <div>#</div>
            @handheld

            @elsehandheld
            <div>Livreur</div>
            @endhandheld
            <div>Client</div>
            @handheld

            @elsehandheld
            <div>Date</div>
            @endhandheld
            <div>Etat</div>

        </div>
    @foreach ($Deliveries as $code => $Delivery)
    @php
        $DeliveryArray = json_decode($Delivery[0], 1);
    @endphp
        <div class="list-item">
            <div>{!! $code !!}</div>

            @handheld

            @elsehandheld
            <div>{!! $DeliveryArray['deliverer_name'] !!}</div>
            @endhandheld
            <div>{!! $DeliveryArray['client_name'] !!}</div>

            @handheld

            @elsehandheld
            <div>{!! $DeliveryArray['created_at'] !!}</div>
            @endhandheld
            <div>
                @if ($DeliveryArray['status'] == '1')
                    <a href="#" class="button scanDelivery" data-code="{{ $code }}"><i class="fa fa-qrcode"></i></a>
                @endif
            </div>


        </div>
    @endforeach
    </div>

</div>
<div class="modal micromodal-slide" id="qr-scanner" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="qr-scanner-title">
          <header class="modal__header">
            <h2 class="modal__title" id="qr-scanner-title">
              Confirmer une livraison
            </h2>
            <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
          </header>
          <main class="modal__content" id="qr-scanner-content">
            <div style="width: 500px" id="reader"></div>
          </main>
          <footer class="modal__footer">
            <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">OK</button>
          </footer>
        </div>
      </div>
    </div>


@endsection
