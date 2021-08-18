<?php

    $title = 'Processing';

    require 'includes/header.php';

    if ('POST' != $_SERVER['REQUEST_METHOD']) { //VERROUILLAGE D'ACCES
        echo "<div class='alert alert-danger'> La page à laquelle vous tentez d'accéder n'existe pas </div>";
    } elseif (isset($_POST['product_submit'])) { // AJOUTER UN PRODUIT
        if (!empty($_POST['product_name']) && !empty($_POST['product_reference']) && !empty($_POST['product_price']) && !empty($_POST['product_quantity']) || (isset($_POST['product_quantity']) && '0' === $_POST['product_quantity']) && !empty($_POST['product_alert']) || (isset($_POST['product_alert']) && '0' === $_POST['product_alert']) && !empty(['product_category'])) {
            $name = strip_tags($_POST['product_name']);
            $reference = strip_tags($_POST['product_reference']);
            $alert = strip_tags($_POST['product_alert']);
            $price = strip_tags($_POST['product_price']);
            $quantity = strip_tags($_POST['product_quantity']);
            $category = strip_tags($_POST['product_category']);
            $user_id = $_SESSION['id'];
            ajoutProduits($name, $reference, $alert, $price, $quantity, $category, $user_id);
        } else {
            echo "<div class='container'>
                    <article class='message is-danger'>
                        <div class='message-header'>Info<a href='add_product.php'><button class='delete'></button></a></div>
                        <div class='message-body'>Tous les champs sont requis !</div>
                    </article>
                </div><br>";
        }
    } elseif (isset($_POST['category_submit'])) { // AJOUTER UNE CATEGORIE
        if (!empty($_POST['product_addCategory'])) {
            $addCategory = strip_tags($_POST['product_addCategory']);
            ajoutCategorie($addCategory);
        } else {
            echo "<div class='container'>
                    <article class='message is-danger'>
                        <div class='message-header'>Info<a href='add_product.php'><button class='delete'></button></a></div>
                        <div class='message-body'>Erreur !</div>
                    </article>
                </div><br>";
        }
    } elseif (isset($_POST['product_edit'])) { // MODIFIER LA FICHE PRODUIT
        if (!empty($_POST['product_name']) && !empty($_POST['product_reference']) && !empty($_POST['product_price']) && !empty($_POST['product_quantity']) || (isset($_POST['product_quantity']) && '0' === $_POST['product_quantity']) && !empty($_POST['product_alert']) || (isset($_POST['product_alert']) && '0' === $_POST['product_alert']) && !empty(['product_category'])) {
            $name = strip_tags($_POST['product_name']);
            $reference = strip_tags($_POST['product_reference']);
            $alert = strip_tags($_POST['product_alert']);
            $price = strip_tags($_POST['product_price']);
            $quantity = strip_tags($_POST['product_quantity']);
            $category = strip_tags($_POST['product_category']);
            $user_id = $_SESSION['id'];
            $id = strip_tags($_POST['product_id']);

            modifProduits($name, $reference, $alert, $price, $quantity, $category, $id, $user_id);
        } else {
            echo "<div class='container'>
            <article class='message is-danger'>
                <div class='message-header'>Info<a href='edit_product.php'><button class='delete'></button></a></div>
                <div class='message-body'>Votre modification a échoué !</div>
            </article>
        </div><br>";
        }
    } elseif (isset($_POST['updateTab'])) { // MODIFIER LA QUANTITE TABLETTE
        if (!empty($_POST['quantity_tab']) || (isset($_POST['quantity_tab']) && '0' === $_POST['quantity_tab'])) {
            $quantity = strip_tags($_POST['quantity_tab']);
            $id = strip_tags($_POST['product_id']);
            modifTablette($quantity, $id);
        } else {
            echo "<div class='container'>
            <article class='message is-danger'>
                <div class='message-header'>Info<a href='tab.php'><button class='delete'></button></a></div>
                <div class='message-body'>Votre modification a échoué !</div>
            </article>
        </div><br>";
        }
    } elseif (isset($_POST['product_delete'])) { // SUPPRESSION DE PRODUIT
        try {
            $sth = $conn->prepare('DELETE FROM products WHERE products_id = :products_id AND user_id =:user_id');
            $sth->bindValue(':products_id', $_POST['product_id']);
            $sth->bindValue(':user_id', $_SESSION['id']);
            $sth->execute();

            echo "<div class='container'>
                    <article class='message is-danger'>
                        <div class='message-header'>Info<a href='profil.php'><button class='delete'></button></a></div>
                        <div class='message-body'> Vous avez supprimé l'article n°".$_POST['product_id'].'</div>
                    </article>
                </div><br>';
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    }

    require 'includes/footer.php';
