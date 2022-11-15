<div id="add-client-modal" class="modal">
    <h1 class="title">Ajouter un client</h1>
    <form id="add-client" class="form form-modal" method="POST" action="{{ route('add-client') }}">
        @csrf
        <div class="field">
            <div class="label" for="lastname">Nom</div>
            <div class="input">
                <input type="text" id="lastname" name="lastname" placeholder="Nom de famille" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="firstnames">Prénom(s)</div>
            <div class="input">
                <input type="text" id="firstnames" name="firstnames" placeholder="Prénom(s)" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="address">Adresse</div>
            <div class="input">
                <input type="text" id="address" name="address" placeholder="Adresse complète" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="phones">Tél.</div>
            <div class="input grid">
                <input type="tel" id="phones" name="phones[]" placeholder="Numéro de téléphone" />
                <a class="button button-success" id="addPhone"> &plus; </a>
            </div>
        </div>
        <div class="field">
            <div class="label" for=""></div>
            <div class="input" id="phonesList">
            </div>
        </div>


    </form>
    <a href="#" class="modal-close" rel="modal:close">Retour</a>
    <a href="#" class="modal-add" onclick="document.getElementById('add-client').submit();">Ajouter</a>
</div>
