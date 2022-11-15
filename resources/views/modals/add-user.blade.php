<div id="add-user-modal" class="modal">
    <h1 class="title">Ajouter un utilisateur</h1>
    <form id="add-user" class="form form-modal" method="POST" action="{{ route('add-user') }}">
        @csrf
        <div class="field">
            <div class="label" for="username">Utilisateur</div>
            <div class="input">
                <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="password">Mot de passe</div>
            <div class="input">
                <input type="password" id="password" name="password" placeholder="Mot de passe" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="cpassword">Confirmation du MDP</div>
            <div class="input">
                <input type="password" id="c_password" name="c_password" placeholder="Confirmer le mot de passe" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="name">Nom complet</div>
            <div class="input">
                <input type="text" id="name" name="name" placeholder="Nom et Prénom(s)" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="phone">Téléphone</div>
            <div class="input">
                <input type="tel" id="phone" name="phone" placeholder="Téléphone" />
            </div>
        </div>
        <div class="field">
            <div class="label" for="role">Rôle</div>
            <div class="input">
                <select id="user-role" name="role" style="width: 100%;">
                    <option selected value="0">Administrateur</option>
                    <option value="1" >Utilisateur normal</option>
                    <option value="2" >Revendeur</option>
                </select>
            </div>
        </div>


    </form>
    <a href="#" class="modal-close" rel="modal:close">Retour</a>
    <a href="#" class="modal-add" onclick="document.getElementById('add-user').submit();">Ajouter</a>
</div>
