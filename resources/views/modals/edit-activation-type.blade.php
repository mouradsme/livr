<div id="edit-activation-type-modal" class="modal">
    <h1 class="title">Modifier un type d'installation</h1>
    <form id="edit-activation-type" class="form form-modal" method="POST" action="{{ route('edit-activation-type') }}">
        @csrf
        <div class="field">
            <div class="label" for="edit-activation-type-name">Désignation</div>
            <div class="input">
                <input type="text" id="edit-activation-type-name" name="name" placeholder="Désignation du type" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="edit-activation-type-code">Code</div>
            <div class="input">
                <input type="text" id="edit-activation-type-code" name="code" placeholder="Code/Symbole du type" />
            </div>
        </div>

        <input type="hidden" id="edit-activation-type-id" name="id" />

    </form>
    <a href="#" class="modal-close" rel="modal:close">Retour</a>
    <a href="#" class="modal-add" onclick="document.getElementById('edit-activation-type').submit();">Modifier</a>
</div>
