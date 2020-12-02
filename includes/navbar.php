<nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php"><img src="images/logo.png" width=300 height=300></a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="index.php">Accueil</a>
                <a class="navbar-item" href="products.php">Affichage produits</a>
            </div>

            <div class="navbar-end">
                <?php
            if (!empty($_SESSION)) {
                ?>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link"><?php echo $_SESSION['username']; ?></a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="profil.php">Interface manager</a>
                        <a class="navbar-item" href="new_add.php">Ajouter produits</a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="?logout">Deconnexion</a>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-info" href="add_profil.php"><strong>Nouveau profil</strong></a>
                    </div>
                </div>
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-primary" href="signin.php"><strong>Se connecter</strong></a>
                    </div>
                </div>
                <?php
            }
            ?>
            </div>
        </div>
    </nav>