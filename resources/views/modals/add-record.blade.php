<div id="add-record-modal" class="modal">
    <h1 class="title">Ajouter une license</h1>
    <form id="add-record" class="form  add-record-form" method="POST" action="{{ route('add-record') }}">
        @csrf
        <div class="form-modal">
            <div class="field-title">
                <h3>Informations du client</h3>
                <hr />
            </div>
            <div class="field">
                <div class="label">Client</div>
                <div class="input">
                    <select id="record-client" name="client_code" style="width: 100%;">
                        <option selected value="-1" disabled>Choisissez un client</option>
                        <option selected value="0">Nouveau Client</option>
                        @foreach ($Clients as $Client)
                            <option value="{!! $Client->code !!}">{!! $Client->lastname !!} {!! $Client->firstnames !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="field">
                <div class="label">Code</div>
                <div class="input">
                    <input type="text" id="code" name="code" placeholder="Généré automatiquement" disabled />
                </div>
            </div>
            <div class="field">
                <div class="label">Nom</div>
                <div class="input">
                    <input class="record-input" type="text" id="lastname" name="lastname" placeholder="Nom de famille" />
                </div>
            </div>
            <div class="field">
                <div class="label">Prénom(s)</div>
                <div class="input">
                    <input class="record-input" type="text" id="firstnames" name="firstnames" placeholder="Prénom(s)" />
                </div>
            </div>
            <div class="field">
                <div class="label">Tél.</div>
                <div class="input">
                    <input class="record-input" type="text" id="phones" name="phones" placeholder="Numéro de téléphone" />
                </div>
            </div>
            <div class="field">
                <div class="label">Adresse</div>
                <div class="input">
                    <input class="record-input" type="text" id="address" name="address" placeholder="Adresse" />
                </div>
            </div>
            <div class="field">
                <div class="label"></div>
                <div class="input"><h2>Nombre d'interventions</h2></div>
            </div>


            <div class="field">
                <div class="label">Téléphoniques</div>
                <div class="input">
                    <input  type="number" min="0" id="interventions_tel" name="interventions_tel" placeholder="Nombre d'interventions téléphoniques maximal" />
                </div>
            </div>
            <div class="field">
                <div class="label">En ligne</div>
                <div class="input">
                    <input  type="number" min="0" id="interventions_online" name="interventions_online" placeholder="Nombre d'interventions en ligne maximal" />
                </div>
            </div>
            <div class="field">
                <div class="label">Déplacement client</div>
                <div class="input">
                    <input type="number" min="0" id="interventions_client" name="interventions_client" placeholder="Nombre d'interventions (déplacement du client) maximal" />
                </div>
            </div>
            <div class="field">
                <div class="label">Déplacement staff</div>
                <div class="input">
                    <input  type="number" min="0" id="interventions_staff" name="interventions_staff" placeholder="Nombre d'interventions (déplacement du staff) maximal" />
                </div>
            </div>
        </div>
        <div class="form-modal">
            <div class="field-title">
                <h3>Informations du logiciel</h3>
                <hr />
            </div>
            <div class="field">
                <div class="label">N° de Bon</div>
                <div class="input">
                    <input  type="text" id="receipt" name="receipt" placeholder="Bon N°" />
                </div>
            </div>
            <div class="field">
                <div class="label">Logiciel</div>
                <div class="input">
                    <select id="record-software" name="software" style="width: 100%;">
                        <option selected value="-1" disabled>Choisissez un logiciel</option>
                        @foreach ($Software as $software)
                            <option value="{!! $software->id !!}">{!! $software->name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="field">
                <div class="label">N° Série</div>
                <div class="input">
                    <input type="text" id="serial_number" name="serial_number" placeholder="Numéro de série" />
                </div>
            </div>
            <div class="field">
                <div class="label">Type d'installation</div>
                <div class="input">
                    <select id="record-activation-type" name="activation_type" style="width: 100%;">
                        <option selected value="-1" disabled>Type d'installation</option>
                        @foreach ($ActivationTypes as $ActivationType)
                            <option value="{!! $ActivationType->id !!}">{!! $ActivationType->name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="field">
                <div class="label">Code Act.</div>
                <div class="input">
                    <input type="text" id="activation_code" name="activation_code" placeholder="Code d'activation" />
                </div>
            </div>
            <div class="field">
                <div class="label">Clé Cont.</div>
                <div class="input">
                    <input type="text" id="control_key" name="control_key" placeholder="Clé de contrôle" />
                </div>
            </div>
            <div class="field">
                <div class="label">Date Act.</div>
                <div class="input">
                    <input type="date" id="activation_date" name="activation_date" placeholder="Date d'activation" />
                </div>
            </div>
            <div class="field">
                <div class="label">Garantie (en mois)</div>
                <div class="input">
                    <input type="number" id="warranty" name="warranty" min="0" placeholder="Garantie en mois (eg: 12)" />
                </div>
            </div>
            <div class="field">
                <div class="label">Date Form.</div>
                <div class="input">
                    <input type="date" id="training_date" name="training_date" placeholder="Date de formation" />
                </div>
            </div>
            <div class="field">
                <div class="label">Agent Form.</div>
                <div class="input">
                    <input type="text" id="agent" name="agent" placeholder="Agent de formation" />
                </div>
            </div>
            <div class="field">
                <div class="label">Montant</div>
                <div class="input">
                    <input type="number" id="amount" name="amount" placeholder="Montant" min="0" />
                </div>
            </div>
            <div class="field">
                <div class="label">Payé ?</div>
                <div class="input">
                    <input type="checkbox" id="status" name="status" />
                </div>
            </div>
            <div class="field">
                <div class="label">Commentaires</div>
                <div class="input">
                    <input type="text" id="comments" name="comments" placeholder="Commentaires"  />
                </div>
            </div>
        </div>

    </form>
    <a href="#" class="modal-close" rel="modal:close">Retour</a>
    <a href="#" class="modal-add" onclick="document.getElementById('add-record').submit();">Ajouter</a>

</div>
