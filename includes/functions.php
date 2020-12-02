<?php
require 'includes/config.php';

// INSCRIPTION
function inscription($username, $motDePasse, $motDePasse2)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE username = '{$username}'";
    $res = $conn->query($sql);
    $count = $res->fetchColumn();

    if (!$count) {
        if ($motDePasse === $motDePasse2) {
            try {
                $motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
                $sth = $conn->prepare('INSERT INTO users (username,password) VALUES (:username, :password)');
                $sth->bindValue('username', $username);
                $sth->bindValue('password', $motDePasse);
                $sth->execute();
                echo '<div class="notification is-succes is-light">
                <button class="delete"></button>
                L\'utilisateur a bien été enregistré ! 
                </div>';
            } catch (PDOException $e) {
                echo 'Error'.$e->getMessage();
            }
        } else {
            echo '<div class="notification is-danger is-light">
            <button class="delete"></button>
            Les mots de passe ne concordent pas ! 
            </div>';
        }
    } elseif ($count > 0) {
        echo '<div class="notification is-danger is-light"
        <button class="delete"></button>
        Ce nom d\'utilisateur existe déjà !
        </div>';
    }
}
// CONNEXION
function connexion($username_login, $pass_login)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE username = '{$username_login}'";
    $res = $conn->query($sql);
    $user = $res->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $db_pass = $user['password'];
        if (password_verify($pass_login, $db_pass)) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];
            header('Location: index.php?');
        } else {
            echo '<div class="notification is-danger is-light"
        <button class="delete"></button>
        Mot de passe erroné
        </div>';
        }
    } else {
        echo '<div class="notification is-danger is-light"
        <button class="delete"></button>
        Cet utilisateur n\'existe pas
        </div>';
    }
}
// AJOUT PRODUIT
function ajoutAnnonce($title, $price, $description, $address, $city, $author)
{
    global $conn;
    // Vérification du prix (doit être un entier, et inférieur à 1 million d'euros)
    if (is_int($price) && $price > 0 && $price < 1000000) {
        // Utilisation du try/catch pour capturer les erreurs PDO/SQL
        try {
            // Création de la requête avec tous les champs du formulaire
            $sth = $conn->prepare('INSERT INTO adverts (title,description,price,city,address,author) VALUES (:title, :description, :price, :city, :address, :author)');
            $sth->bindValue(':title', $title, PDO::PARAM_STR);
            $sth->bindValue(':price', $price, PDO::PARAM_INT);
            $sth->bindValue(':description', $description, PDO::PARAM_STR);
            $sth->bindValue(':address', $address, PDO::PARAM_STR);
            $sth->bindValue(':city', $city, PDO::PARAM_STR);
            $sth->bindValue(':author', $author, PDO::PARAM_INT);
            // Affichage conditionnel du message de réussite
            if ($sth->execute()) {
                echo "<div class='alert alert-success'> Votre annonce a été ajouté</div>";
                header('Location: profil.php?id='.$conn->lastInsertId());
            }
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    }
}
// FONCTION D'AFFICHAGE DE LA LISTE DES PRODUITS
function affichageProduits()
{
    global $conn;
    // Requête SQL
    $sth = $conn->prepare('SELECT p.*,c.categories_name,u.username FROM products AS p LEFT JOIN categories AS c ON p.category_id = c.categories_id LEFT JOIN users AS u ON p.user_id = u.id');
    $sth->execute(); //Exécution de requête

    $products = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($products as $product) {
        //Pour chaque produit '$produit' de la table '$products'...
        // on crée les éléments HTML suivant :?>
        <div class="container">
            <div class="row">
                <tr>
                    <td><?php echo $product['products_name']; ?>
                    </td>
                    <td><?php echo $product['reference']; ?>
                    </td>
                    <td><?php echo $product['price']; ?>
                    </td>
                    <td><?php echo $product['quantity']; ?>
                    </td>
                    <td><?php echo $product['categories_name']; ?>
                    </td>
                    <td><?php echo $product['username']; ?>
                    </td>
                    <td> <a
                            href="product.php?id=<?php echo $product['products_id']; ?>">Afficher
                            l'article</a>
                    </td>
                </tr>
            </div>
        </div>
<?php
    }
}
// AFFICHAGE PRODUIT DE L'UTILISATEUR
function affichageAdvertsByUser($user_id)
{
    global $conn;
    $sth = $conn->prepare("SELECT * FROM products INNER JOIN users ON products.user_id = users.id WHERE user_id = {$user_id}");
    $sth->execute();

    $products = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($products as $products) {
        ?>
<tr>
    <th scope="row"><?php echo $products['products_name']; ?>
    </th>
    <td><?php echo $products['reference']; ?>
    </td>
    <td><?php echo $products['price']; ?>
    </td>
    <td><?php echo $products['quantity']; ?> $
    </td>
    <td><?php echo $products['category_id']; ?>
    </td>
    <td> <a href="product.php?id=<?php echo $products['products_id']; ?>"
            class="fa btn btn-outline-primary"><i class="fas fa-eye"></i></a>
    </td>
    <td> <a href="edit_products.php?id=<?php echo $products['products_id']; ?>"
            class="fa btn btn-outline-warning"><i class="fas fa-pen"></i></a>
    </td>
    <td>
        <form action="process.php" method="POST">
            <input type="hidden" name="ad_id"
                value="<?php echo $products['ad_id']; ?>
            <input type="submit" name="products_delete" class="fa btn btn-outline-danger" value="&#xf2ed;"></input>
        </form>
    </td>
</tr>
<?php
    }
}