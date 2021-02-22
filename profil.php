<?php

$title = 'Profil';
require 'includes/header.php';

$user_id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = '{$user_id}'";
$res = $conn->query($sql);
$user = $res->fetch(PDO::FETCH_ASSOC);

?>
<div class="container">
    <div class="columns">
        <div class="column">
            <h3>Bienvenue <?php echo $_SESSION['username']; ?>
            </h3>
            <div class="row">
                <div class="col-8">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nom du produit</th>
                                <th scope="col">Références stock</th>
                                <th scope="col">Prix unitaire</th>
                                <th scope="col">Quantité en stock</th>
                                <th scope="col">Categorie d'équipement</th>
                                <th scope="col">Auteur</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    affichageAdvertsByUser($user_id);
                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';