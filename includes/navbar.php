<!--navbar d'acceuil-->
<nav class="navbar navbar-expand-lg navbar-dark mb-3">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php"><img src="images/logo.png" width=300 height=300></a>
    </div>

    <button class="navbar-toggler button is-medium is-rounded is-outlined is-dark" type="button" data-toggle="collapse"
        data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fas fa-ellipsis-v"></i></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <div class="navbar-start">
                    <a class="navbar-item" href="index.php">Accueil</a>
                </div>
            </li>
        </ul>

        <!--Menu déroulant qui s'affiche uniquement lorsqu'on est connectée-->
        <?php if (!empty($_SESSION)) { ?>
        <div id="navbarText" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="navbar-item">
                    <div class="navbar-start">
                        <a class="navbar-item" href="tab.php?id">Modifier le stock</a>
                    </div>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav">
            <div class="dropdown nav-item dropleft">

                <div class="navbar-end">
                    <div class="navbar-item dropdown dropleft is-hoverable">
                        <a href="#" class="button is-rounded is-outlined dropdown-toggle" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown"><span><?php echo $_SESSION['username']; ?></span><span
                                class="icon is-large">
                                <i class="fas fa-user-circle fa-lg"></i></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="profil.php">Interface manager</a>
                            <a class="dropdown-item" href="add_products.php">Ajouter un produit</a>
                            <a class="dropdown-item" href="add_profil.php">Créer un nouveau profil</a>
                            <a class="dropdown-item" href="tab.php">Modifier stock</a>
                            <hr>
                            <a class="dropdown-item" href="?logout">Déconnexion</a>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
        <?php
            } else {
                ?>
        <!--Sinon affiche le bouton qui sert à se connecter pour afficher le menu déroulant-->
        <ul>
            <li class="nav-item">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-link" href="signin.php"><strong>Se connecter</strong></a>
                    </div>
                </div>
            </li>
        </ul>
        <?php
            } ?>

    </div>
</nav>