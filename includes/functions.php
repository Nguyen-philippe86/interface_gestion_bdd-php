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
            header('Location: profil.php?');
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
// AJOUTER UN PRODUITS
function ajoutProduits($name, $reference, $alert, $price, $quantity, $category, $user_id)
{
    global $conn;

    try {
        $sth = $conn->prepare('INSERT INTO products (products_name,reference,alert,price,quantity,category_id,user_id) 
        VALUES (:products_name, :reference, :alert, :price, :quantity, :category_id, :user_id)');
        $sth->bindValue(':products_name', $name, PDO::PARAM_STR);
        $sth->bindValue(':reference', $reference, PDO::PARAM_STR);
        $sth->bindValue(':alert', $alert, PDO::PARAM_STR);
        $sth->bindValue(':price', $price, PDO::PARAM_STR);
        $sth->bindValue(':quantity', $quantity, PDO::PARAM_INT);
        $sth->bindValue(':category_id', $category, PDO::PARAM_INT);
        $sth->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        if ($sth->execute()) {
            echo "<div class='container'>
                    <article class='message is-link'>
                        <div class='message-header'>Info<a href='profil.php'><button class='delete'></button></a></div>
                        <div class='message-body'>Le produit a bien été ajouté à la base de données</div>
                    </article>
                </div><br>";
        }
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }
}
// AJOUTER UNE CATEGORIE"
function ajoutCategorie($addCategory)
{
    global $conn;

    try {
        $sth = $conn->prepare('INSERT INTO categories (categories_name) VALUES (:categories_name)');
        $sth->bindValue(':categories_name', $addCategory, PDO::PARAM_STR);
        if ($sth->execute()) {
            header('Location: add_products.php?id='.$conn->lastInsertId());
        }
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }
}
// AFFICHAGE PRODUIT PAGE "INDEX.PHP"

function affichageProduits()
{
    global $conn;

    $sth = $conn->prepare('SELECT p.*,c.categories_name,u.username 
    FROM products AS p 
    LEFT JOIN categories AS c ON p.category_id = c.categories_id 
    LEFT JOIN users AS u ON p.user_id = u.id 
    ORDER BY category_id, products_name');
    $sth->execute();
    $products = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($products as $product) {?>

<div class="container">
    <div class="row">
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
            <th class="is-warning"><strong><?php echo $product['quantity']; ?>
                </strong>
            </th>
            <td><?php echo $product['reference']; ?>
            </td>
            <td><?php echo $product['price']; ?>
            </td>
            <td><?php echo $product['username']; ?>
            </td>
        </tr>
    </div>
</div>
<?php
    }
}

// AFFICHAGE PRODUIT PAGE "PROFIL.PHP"
function affichageProduitByUser()
{
    global $conn;

    $sth = $conn->prepare('SELECT p.*,c.categories_name,u.username FROM products AS p LEFT JOIN categories AS c ON p.category_id = c.categories_id LEFT JOIN users AS u ON p.user_id = u.id ORDER BY category_id, products_name');
    $sth->execute();
    $products = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($products as $product) {?>

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
        <strong><?php echo $product['quantity']; ?>
        </strong>
    </th>
    <td><?php echo $product['reference']; ?>
    </td>
    <td><?php echo $product['price']; ?>
    </td>
    <td><?php echo $product['username']; ?>
    </td>
    <td> <a href="edit_products.php?id=<?php echo $product['products_id']; ?>"
            class="btn btn-outline-danger"><i class="fas fa-pen"></i></a></td>
    </td>
</tr>

<?php
    }
}
// MODIFICATION DE PRODUITS
function modifProduits($name, $reference, $alert, $price, $quantity, $category, $id, $user_id)
{
    global $conn;

    try {
        $sth = $conn->prepare('UPDATE products 
        SET products_name=:products_name, reference=:reference, price=:price, alert=:alert, quantity=:quantity, category_id=:category_id
        WHERE products_id=:products_id AND user_id=:user_id');
        $sth->bindValue(':products_name', $name);
        $sth->bindValue(':reference', $reference);
        $sth->bindValue(':alert', $alert);
        $sth->bindValue(':price', $price);
        $sth->bindValue(':quantity', $quantity);
        $sth->bindValue(':category_id', $category);
        $sth->bindValue(':products_id', $id);
        $sth->bindValue(':user_id', $user_id);
        if ($sth->execute()) {
            echo "<div class='container'>
            <article class='message is-link'>
                <div class='message-header'>Info<a href='profil.php'><button class='delete'></button></a></div>
                <div class='message-body'>Votre modification a bien été prise en compte </div>
            </article>
        </div><br>";
        }
    } catch (PDOException $e) {
        echo 'Error : '.$e->getMessage();
    }
}

////////////////////////////// TABLETTE //////////////////////////////

// AFFICHAGE PRODUIT PAGE "TAB.PHP"
function pageTablette()
{
    global $conn;

    $sth = $conn->prepare('SELECT p.*,c.categories_name,u.username FROM products AS p LEFT JOIN categories AS c ON p.category_id = c.categories_id LEFT JOIN users AS u ON p.user_id = u.id ORDER BY category_id, products_name');
    $sth->execute();
    $products = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($products as $product) {?>
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
            <input type="submit" name="updateTab" class="fa btn btn-primary" value="&#xf00c;"></input>
        </form>
    </th>
</tr>
<?php
    }
}
// MODIFICATION QUANTITE PAGE "TAB.PHP"
function modifTablette($quantity, $id)
{
    global $conn;

    try {
        $sth = $conn->prepare('UPDATE products SET quantity=:quantity WHERE products_id=:products_id');
        $sth->bindValue(':quantity', $quantity);
        $sth->bindValue(':products_id', $id);
        if ($sth->execute()) {
            echo "<div class='container'>
                    <article class='message is-link'>
                        <div class='message-header'>Info<a href='tab.php'><button class='delete'></button></a></div>
                        <div class='message-body'>Votre modification a bien été prise en compte </div>
                    </article>
                </div><br>";
        }
    } catch (PDOException $e) {
        echo 'Error : '.$e->getMessage();
    }
}
