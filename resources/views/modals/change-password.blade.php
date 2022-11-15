<div id="change-password-modal" class="modal">
    <h1 class="title">Changer le mot de passe</h1>
    <form id="change-password" class="form form-modal" method="POST" action="{{ route('change-password') }}">
        @csrf
        <div class="field">
            <div class="label" for="password">Mot de passe actuel</div>
            <div class="input">
                <input type="password" id="old-password" name="old_password" placeholder="Mot de passe actuel" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="password">Nouveau Mot de passe</div>
            <div class="input">
                <input type="password" id="password" name="password" placeholder="Nouveau mot de passe" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="cpassword">Confirmer le nouveau mot de passe</div>
            <div class="input">
                <input type="password" id="c_password" name="c_password" placeholder="Confirmer le mot de passe" />
            </div>
        </div>


    </form>
    <a href="#" class="modal-close" rel="modal:close">Retour</a>
    <a href="#" class="modal-add" onclick="document.getElementById('change-password').submit();">Mettre à jour</a>
</div>
