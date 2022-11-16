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
            <div>{!! date("d/m/Y H:i:s", strtotime($DeliveryArray['created_at'])) !!}</div>
            @endhandheld
            <div>
                @if ($DeliveryArray['status'] == '1')
                    En cours
                @endif
                @if ($DeliveryArray['status'] == '2')
                    Chargée
                @endif
                @if ($DeliveryArray['status'] == '3')
                    Déchargée
                @endif
            </div>

            <div>
                @if ($DeliveryArray['status'] == '1')
                    <a href="#" class="button chargeButton" data-code="{{ $code }}">Charger</a>
                @endif
                @if ($DeliveryArray['status'] == '2')
                    <a href="#" class="button dischargeButton" data-code="{{ $code }}">Décharger</a>
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

    <div class="modal micromodal-slide" id="charge-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
          <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="charge-modal-title">
            <header class="modal__header">
              <h2 class="modal__title" id="charge-modal-title">
                Informations de la commande
              </h2>
              <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="charge-modal-content">
                <div id="delivery-data"></div>
                <form class="form"  enctype="multipart/form-data" method="POST" action="{{ route('confirm-charge') }}">
                    <input id="code" name="code" type="hidden" />
                    <input id="latlong" name="latlong" type="hidden" />
                    <h1 class="title">Détails</h1>
                        <div class="form-inner"  >
                            @csrf

                            <div class="field">
                                <div class="label" for="issue">Problème (s'il en existe)</div>
                                <div class="input">
                                    <input id="issue" name="issue" placeholder="Aucun problème" type="text" />
                                </div>
                            </div>

                            <div class="field">
                                <div class="label" for="image">Image</div>
                                <div class="input">
                                    <input type="file" class="form-control" name="image" />
                                </div>
                            </div>


                            <div class="field">
                                <div class="label" for=""></div>
                                <div class="input">
                                    <button class="modal__btn modal__btn-primary">Confirmer</button>
                                </div>
                            </div>
                        </div>
                </form>
            </main>
            <footer class="modal__footer">
              <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
            </footer>
          </div>
        </div>
      </div>


      <div class="modal micromodal-slide" id="discharge-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
          <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="discharge-modal-title">
            <header class="modal__header">
              <h2 class="modal__title" id="discharge-modal-title">
                Informations de la commande
              </h2>
              <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="discharge-modal-content">
                <div id="ddelivery-data"></div>
                <form class="form"  enctype="multipart/form-data" method="POST" action="{{ route('confirm-discharge') }}">
                    <input id="dcode" name="dcode" type="hidden" />
                    <input id="dlatlong" name="dlatlong" type="hidden" />
                    <h1 class="title">Détails</h1>
                        <div class="form-inner"  >
                            @csrf

                            <div class="field">
                                <div class="label" for="issue">Problème (s'il en existe)</div>
                                <div class="input">
                                    <input id="dissue" name="dissue" placeholder="Aucun problème" type="text" />
                                </div>
                            </div>

                            <div class="field">
                                <div class="label" for="dimage">Image</div>
                                <div class="input">
                                    <input type="file" class="form-control" name="dimage" />
                                </div>
                            </div>


                            <div class="field">
                                <div class="label" for=""></div>
                                <div class="input">
                                    <button class="modal__btn modal__btn-primary">Confirmer</button>
                                </div>
                            </div>
                        </div>
                </form>
            </main>
            <footer class="modal__footer">
              <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
            </footer>
          </div>
        </div>
      </div>
@endsection
