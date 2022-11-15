<div id="export-records-modal" class="modal">
    <h1 class="title">Paramètres d'exportation</h1>
    <form id="export-records" class="form form-modal" method="POST" action="{{ route('export-records') }}">
        @csrf

        <div class="field">
            <div class="label" for="role">Exporter tout?</div>
            <div class="input">
                <input type="checkbox" name="export_all" id="export-all" checked />
            </div>
        </div>
        <div class="field">
            <div class="label" for="role">De</div>
            <div class="input">
                <input type="date" name="export_from" id="export-from" disabled/>
            </div>
        </div>
        <div class="field">
            <div class="label" for="role">A</div>
            <div class="input">
                <input type="date" name="export_to" id="export-to" disabled/>
            </div>
        </div>


    </form>
    <a href="#" class="modal-close" rel="modal:close">Retour</a>
    <a href="#" class="modal-add" onclick="document.getElementById('export-records').submit();">Exporter</a>
</div>
