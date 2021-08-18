<?php
require 'includes/header.php';

$sql = 'SELECT * FROM categories'; // Requete SQL pour afficher les différents catégories dans le formulaire
$res = $conn->query($sql);
$categories = $res->fetchAll();
?>

<!--1er formulaire pour ajouter un nouveau produit-->
<div class="container">

    <form action="process.php" method="POST">
        <h3 class="title is-3">Ajoutez un nouveau produit</h2>

            <div class="field">
                <label class="label">Nom du produit</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" placeholder="Nom du produit" value="" name="product_name">
                </div>
            </div>
            <div class="field">
                <label class="label">Référence stock</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" placeholder="Référence" value="" name="product_reference">
                </div>
            </div>
            <div class="field">
                <label class="label">Prix unitaire</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" placeholder="Prix" value="" name="product_price">
                </div>
            </div>
            <div class="field">
                <label class="label">Quantité</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="number" placeholder="Quantité" value="" name="product_quantity">
                </div>
            </div>
            <div class="field">
                <label class="label">Seuil d'alerte</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="number" placeholder="Seuil d'alerte" value="" name="product_alert">
                </div>
            </div>
            <div class="form-group">
                <label class="label">Catégorie de l'article</label>
                <select class="form-control" id="InputCategory" name="product_category">
                    <?php foreach ($categories as $category) { ?>
                    <option
                        value="<?php echo $category['categories_id']; ?>">
                        <?php echo $category['categories_name']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" name="product_submit">Ajouter le produit</button>
                </div>
            </div>
    </form>
    <hr>
</div>
<br>

<!--2ème formulaire pour ajouter une nouvel catégorie-->
<div class="container">
    <form action="process.php" method="POST">
        <div class="row align-items-end">
            <div class="col-4">
                <h5 class="title is-5">Ajoutez une nouvel catégorie :</h2>
            </div>
            <div class="col-3">
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Nom de la catégorie" name="product_addCategory">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary" name="category_submit">Créer la catégorie</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br>
</div>

<?php
require 'includes/footer.php';
