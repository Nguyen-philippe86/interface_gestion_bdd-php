<?php

require 'includes/header.php';

$sql = 'SELECT * FROM categories'; // requete SQL pour filtre
$res = $conn->query($sql);
$categories = $res->fetchAll();

if (isset($_POST['search_form'])) {
    $category = strip_tags($_POST['product_category']);
    $search_text = strip_tags($_POST['search_text']);

    $sql2 = "SELECT * 
            FROM products 
            LEFT JOIN categories ON products.category_id = categories.categories_id 
            WHERE category_id LIKE '%{$category}%' AND products_name LIKE '%{$search_text}%'
            ORDER BY category_id, products_name";

    $res2 = $conn->query($sql2);
    $search = $res2->fetchAll();
}

?>
<div class="container">
    <div class="columns">
        <div class="column">

            <h2 class="title is-3">Visu Tablette</h2>
            <!--formulaire de recherche par catégorie ou par nom-->
            <form action="tab.php" method="POST">
                <div class="form-inline">
                    <div class="form-group">
                        <input type="text" name="search_text" id="InputText" placeholder="Rechercher par nom"
                            class="form-control mb-2 mx-2">
                    </div>
                    <div class="form-group">
                        <select class="form-control mb-2 mx-2" id="InputCategory" name="product_category">
                            <option value="" selected> -- Filtrer par catégorie -- </option>
                            <?php foreach ($categories as $category) { ?>
                            <option
                                value="<?php echo $category['categories_id']; ?>">
                                <?php echo $category['categories_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <input type="submit" value="Recherche" name="search_form" class=" mb-2 button is-link">
                    <?php if (isset($search)) {
    echo '<a href="tab.php" class="btn btn-danger mx-2 mb-2">Reset</a>';
} ?>
                </div>
            </form>
            <br>

            <div>
                <!--en tête du tableau-->
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Categorie d'équipement</th>
                            <th scope="col">Nom du produit</th>
                            <th scope="col" colspan=3>Quantité en stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--affiche la quantité après le filtre par categorie-->
                        <?php
                        if (isset($search)) {
                            foreach ($search as $product) {?>
                        <tr>
                            <td><?php echo $product['categories_name']; ?>
                            </td>
                            <td><?php echo $product['products_name']; if ($product['alert'] >= $product['quantity']) {
                                echo "<strong>
                                        <span class='icon-text has-text-danger'>
                                            <span class='icon'>
                                                <i class='fas fa-exclamation-triangle'></i>
                                            </span>
                                            <span>Stock faible</span>     
                                        </span>
                                    </strong>";
                            }?>
                            </td>
                            <th class="is-warning">
                                <form action="process.php" method="POST">

                                    <input type="number" name="quantity_tab"
                                        value="<?php echo $product['quantity']; ?>" />

                                    <input type="hidden" name="product_id"
                                        value="<?php echo $product['products_id']; ?>" />
                                    <input type="submit" name="updateTab" class="fa btn btn-primary"
                                        value="&#xf00c;"></input>
                                </form>
                            </th>
                        </tr>
                        <?php
                            }
                        }
                        pageTablette(); // affiche le tableau normalement
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
