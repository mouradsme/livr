<div id="add-software-modal" class="modal">
    <h1 class="title">Ajouter un logiciel</h1>
    <form id="add-software" class="form form-modal" method="POST" action="{{ route('add-software') }}">
        @csrf
        <div class="field">
            <div class="label" for="name">Désignation</div>
            <div class="input">
                <input type="text" id="name" name="name" placeholder="Nom du logiciel" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="code">Code</div>
            <div class="input">
                <input type="text" id="code" name="code" placeholder="Code à utiliser dans les formules" />
            </div>
        </div> 
        <div class="field">
            <div class="label" for="description">Description</div>
            <div class="input">
                <input type="text" id="description" name="description" placeholder="Description" />
            </div>
        </div> 


    </form>
    <a href="#" class="modal-close" rel="modal:close">Retour</a>
    <a href="#" class="modal-add" onclick="document.getElementById('add-software').submit();">Ajouter</a>
</div>