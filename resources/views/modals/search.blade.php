@php
$fields = [
        ['records.id', 'ID de license'],
        ['software.name', 'Logiciel'],
        ['software.code', 'Logiciel (Code)'],
        ['records.client_code', 'Code Client'],
        ['records.activation_code', 'Code d\'Activation'],
        ['records.serial_number', 'N° de série'],
        ['records.agent', 'Agent'],
        ['records.control_key', 'Clé de contrôle'],
        ['records.status', 'Etat'],
        ['activation_types.name', 'Type d\'installation'],
        ['clients.lastname', 'Nom du client'],
        ['clients.firstnames', 'Prénom(s) du client'],
        ['clients.phones', 'Numéro(s) de téléphone']
        ];
@endphp
<div id="search-modal" class="modal">
    <h1 class="title">Recherche</h1>
    <form id="search" class="form form-modal" method="POST" action="{{ route('search') }}">
        @csrf
        <input type="hidden" name="route" value="records" />
                <div class="field">
                    <div class="label">Filter par </div>
                    <select name="filter_by" id="filter_by">
                        @foreach ($fields as $item)
                            <option value="{!! $item[0] !!}">{!! /* $InputFields[$item] */ $item[1] !!}</option>
                        @endforeach
                    </select>
                </div>


        <div class="field">
            <div class="label" for="name">Désignation</div>
            <div class="input">
                <input type="search" id="search" name="search" placeholder="Termes de recherche" />
            </div>
        </div>


    </form>
    <a href="#" class="modal-close" rel="modal:close">Retour</a>
    <a href="#" class="modal-add" onclick="document.getElementById('search').submit();">Recherche</a>
</div>
