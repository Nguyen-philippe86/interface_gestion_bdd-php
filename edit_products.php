<?php

$title = 'Modification de produit';

require 'includes/header.php';

$id = $_GET['id']; // requete SQL qui permet de reprendre les infos de la BDD
$sql1 = "SELECT p.*, c.* FROM products AS p INNER JOIN categories AS c ON p.category_id = c.categories_id WHERE p.products_id = {$id}";
$sql2 = 'SELECT * FROM categories';

$res1 = $conn->query($sql1);
$product = $res1->fetch(PDO::FETCH_ASSOC);
$res2 = $conn->query($sql2);
$categories = $res2->fetchAll();
?>

<div class="container">
    <h2 class="title is-3">Modifier produit</h2>
    <div class="row">
        <div class="col-12">
            <!--début du formulaire de modification-->
            <form action="process.php" method="POST">

                <div class="form-group">
                    <label for="InputName">Nom du produit</label>
                    <input type="text" class="form-control" id="InputName"
                        value="<?php echo $product['products_name']; ?>"
                        name="product_name" required>
                </div>

                <div class="form-group">
                    <label for="InputReference">Référence stock</label>
                    <input type="text" class="form-control" id="InputReference"
                        value="<?php echo $product['reference']; ?>"
                        name="product_reference" required>
                </div>

                <div class="form-group">
                    <label for="InputPrice">Prix unitaire</label>
                    <input type="text" class="form-control" id="InputPrice"
                        value="<?php echo $product['price']; ?>"
                        name="product_price" required>
                </div>

                <div class="form-group">
                    <label for="InputQuantity">Quantité</label>
                    <input type="number" class="form-control" id="InputQuantity"
                        value="<?php echo $product['quantity']; ?>"
                        name="product_quantity" required>
                </div>

                <div class="form-group">
                    <label for="InputAlert">Seuil d'alerte</label>
                    <input type="number" class="form-control" id="InputAlert"
                        value="<?php echo $product['alert']; ?>"
                        name="product_alert" required>
                </div>

                <div class="form-group">
                    <label for="InputCategory">Catégorie de l'article</label>
                    <select class="form-control" id="InputCategory" name="product_category">
                        <!--1ère option : Affiche la categorie de la table categories enregistrée pour cet article-->
                        <option
                            value="<?php echo $product['category_id']; ?>"
                            selected>
                            -- <?php echo $product['categories_name']; ?>
                            --
                        </option>
                        <?php foreach ($categories as $category) { ?>
                        <!--2ème option : Affiche la liste de TOUTES les catégories-->
                        <option
                            value="<?php echo $category['categories_id']; ?>">
                            <?php echo $category['categories_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-">
                            <input type="hidden" name="product_id"
                                value="<?php echo $product['products_id']; ?>" />
                            <button type="submit" class="btn btn-success" name="product_edit">Modifier le
                                produit</button>
                        </div>
                        <div class="col-">
                            <form action="process.php" method="POST">
                                <input type="hidden" name="product_id"
                                    value="<?php echo $product['products_id']; ?>" />
                                <button type="submit" name="product_delete"
                                    class="btn btn-outline-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
