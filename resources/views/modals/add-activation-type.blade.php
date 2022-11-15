<div id="add-activation-type-modal" class="modal">
    <h1 class="title">Ajouter un type d'installation</h1>
    <form id="add-activation-type" class="form form-modal" method="POST" action="{{ route('add-activation-type') }}">
        @csrf
        <div class="field">
            <div class="label" for="name">Désignation</div>
            <div class="input">
                <input type="text" id="name" name="name" placeholder="Désignation du type" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="name">Code</div>
            <div class="input">
                <input type="text" id="code" name="code" placeholder="Code/Symbole du type" />
            </div>
        </div>


    </form>
    <a href="#" class="modal-close" rel="modal:close">Retour</a>
    <a href="#" class="modal-add" onclick="document.getElementById('add-activation-type').submit();">Ajouter</a>
</div>
