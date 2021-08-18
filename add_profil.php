<?php

$title = 'Nouveau profil';

require 'includes/header.php';

if (!empty($_POST['submit_signup']) && !empty($_POST['username_signup']) && !empty($_POST['password1_signup'])) { // Condition pour une inscription
    $pass_su = htmlspecialchars($_POST['password1_signup']); // sécurité htmlspecialchars
    $repass_su = htmlspecialchars($_POST['password2_signup']);
    $username_su = htmlspecialchars($_POST['username_signup']);
    inscription($username_su, $pass_su, $repass_su);
}
?>
<!--formulaire pour créer un nouveau profil-->
<div class="container">
    <div class="columns">
        <div class="column">

            <h2 class="title is-3">Nouveau profil</h2>
            <form
                action="<?php $_SERVER['REQUEST_URI']; ?>"
                method="post">
                <div class="field">
                    <label class="label">Nom d'utilisateur</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="username" placeholder="Choisir un nom d'utilisateur" value=""
                            name="username_signup">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Mot de passe</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" placeholder="Choisir un mot de passe" value=""
                            name="password1_signup">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Entrez à nouveau votre mot de passe</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" placeholder="Entrez à nouveau votre mot de passe" value=""
                            name="password2_signup">
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <input type="submit" value="Créer" name="submit_signup" class="button is-info">
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
