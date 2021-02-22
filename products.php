<?php
    $title = 'Produits';
    require 'includes/header.php';
?>

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Nom du produit</th>
            <th scope="col">Références stock</th>
            <th scope="col">Prix unitaire</th>
            <th scope="col">Quantité en stock</th>
            <th scope="col">Categorie d'équipement</th>
            <th scope="col">Auteur</th>
        </tr>
    </thead>
    <tbody>
        <?php
            affichageProduits();
        ?>
    </tbody>
</table>

<?php
    require 'includes/footer.php';
