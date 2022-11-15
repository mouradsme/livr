<div id="edit-client-modal" class="modal">
    <h1 class="title">Modifier un client</h1>
    <form id="edit-client" class="form form-modal" method="POST" action="{{ route('edit-client') }}">
        @csrf
        <div class="field">
            <div class="label" for="edit-lastname">Nom</div>
            <div class="input">
                <input type="text" id="edit-lastname" name="lastname" placeholder="Nom de famille" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="edit-firstnames">Prénom(s)</div>
            <div class="input">
                <input type="text" id="edit-firstnames" name="firstnames" placeholder="Prénom(s)" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="edit-address">Adresse</div>
            <div class="input">
                <input type="text" id="edit-address" name="address" placeholder="Adresse complète" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="edit-phones">Tél.</div>
            <div class="input grid">
                <input type="tel" id="edit-phones" name="phones[]" placeholder="Numéro de téléphone" />
                <a class="button button-success" id="editPhone"> &plus; </a>
            </div>
        </div>
        <div class="field">
            <div class="label" for=""></div>
            <div class="input" id="edit-phonesList">
            </div>
        </div>

        <input id="edit-client-code" type="hidden" name="code" value="" />
    </form>
    <a href="#" class="modal-close" rel="modal:close">Retour</a>
    <a href="#" class="modal-add" onclick="document.getElementById('edit-client').submit();">Mettre à jour</a>
</div>
