<div id="edit-software-modal" class="modal">
    <h1 class="title">Ajouter un logiciel</h1>
    <form id="edit-software" class="form form-modal" method="POST" action="{{ route('edit-software') }}">
        @csrf
        <div class="field">
            <div class="label" for="edit-software-name">Désignation</div>
            <div class="input">
                <input type="text" id="edit-software-name" name="name" placeholder="Nom du logiciel" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="edit-software-code">Code</div>
            <div class="input">
                <input type="text" id="edit-software-code" name="code" placeholder="Code à utiliser dans les formules" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="edit-software-description">Description</div>
            <div class="input">
                <input type="text" id="edit-software-description" name="description" placeholder="Description" />
            </div>
        </div>

        <input type="hidden" id="edit-software-id" name="id" />
    </form>
    <a href="#" class="modal-close" rel="modal:close">Retour</a>
    <a href="#" class="modal-add" onclick="document.getElementById('edit-software').submit();">Modifier</a>
</div>
