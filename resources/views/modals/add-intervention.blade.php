<div id="add-intervention-modal" class="modal">
    <h1 class="title">Ajouter une intervention</h1>
    <form id="add-intervention" class="form  " method="POST" action="{{ route('add-intervention') }}">
        @csrf
        <div class="form-modal">
            <div class="field">
                <div class="label" for="intervention-record">License</div>
                <div class="input">
                    <select id="intervention-record" name="intervention_record" style="width: 100%;">
                        <option value="-1" selected disabled>Choisir la license</option>
                        @foreach ( $Records as $Record )
                            <option value="{!! $Record->id !!}"> #{!! $Record->id !!} | {!! $Record->client_code !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="field">
                <div class="label" for="intervention-record">Interventions restantes</div>
                <div class="input">
                    <table class="remaining-interventions">
                        <tr>
                            <td>Téléphone</td>
                            <td id="interventions-phone-count">0</td>
                            <td id="interventions-phone"><input type="radio" name="intervention_type" value="phone"/></td>
                        </tr>
                        <tr>
                            <td>En ligne</td>
                            <td id="interventions-online-count">0</td>
                            <td id="interventions-online"><input type="radio" name="intervention_type" value="online"/></td>
                        </tr>
                        <tr>
                            <td>Déplacement client</td>
                            <td id="interventions-client-count">0</td>
                            <td id="interventions-client"><input type="radio" name="intervention_type" value="client"/></td>
                        </tr>
                        <tr>
                            <td>Déplacement staff</td>
                            <td id="interventions-staff-count">0</td>
                            <td id="interventions-staff"><input type="radio" name="intervention_type" value="staff"/></td>
                        </tr>
                    </table>
                </div>
            </div>
{{--
            <div class="field">
                <div class="label" for="intervention-type">Type d'intervention</div>
                <div class="input">
                    <select id="intervention-type" name="intervention_type" style="width: 100%;">
                        @foreach ( $InterventionTypes as $Type )
                            <option id="intervention-option-{!! $Type->key !!}" value="{!! $Type->id !!}"> {!! $Type->name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
            <div class="field">
                <div class="label" for="intervention-date">Date d'intervention</div>
                <div class="input">
                    <input id="intervention-date" name="intervention_date" type="date" />
                </div>
            </div>
            <div class="field">
                <div class="label" for="intervention-agent">Agent</div>
                <div class="input">
                    <input id="intervention-agent" name="intervention_agent" type="text" />
                </div>
            </div>
            <div class="field">
                <div class="label" for="intervention-comments">Commentaires</div>
                <div class="input">
                    <input id="intervention-comments" name="intervention_comments" type="text" />
                </div>
            </div>
        </div>
    </form>
    <a href="#" class="modal-close" rel="modal:close">Retour</a>
    <a href="#" class="modal-add" onclick="document.getElementById('add-intervention').submit();">Ajouter</a>

</div>
