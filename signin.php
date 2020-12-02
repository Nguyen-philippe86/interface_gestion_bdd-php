<?php
require 'includes/header.php';

if (!empty($_POST['submit_login']) && !empty($_POST['username_login']) && !empty($_POST['password_login'])) {
    $pass_login = htmlspecialchars($_POST['password_login']);
    $username_login = htmlspecialchars($_POST['username_login']);
    connexion($username_login, $pass_login);
}
?>
<div class="container">
    <div class="columns">
        <div class="column">
            <h2 class="title is-3">Connexion</h2>
            <form
                action="<?php $_SERVER['REQUEST_URI']; ?>"
                method="post">
                <div class="field">
                    <label class="label">Nom d'utilisateur</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Entrez votre nom d'utilisateur" value="" name="username_login">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Mot de passe</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" placeholder="Entrez votre mot de passe" value=""
                        name="password_login">
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <input type="submit" value="Se connecter" name="submit_login" class="button is-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require 'includes/footer.php';
