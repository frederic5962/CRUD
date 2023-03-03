<?php
session_start();
//on inclut la connexion a la base
require_once('connect.php');

$sql  = 'SELECT * FROM `liste`';

// on prepare la requete
$query = $db->prepare($sql);

//on execute la requete
$query->execute();

//on stocke le resultat dans un tableau associatif
$result = $query->fetchall(PDO::FETCH_ASSOC);

//ferme la bdd
require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php
                    if(!empty($_SESSION['Erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['Erreur'].'
                      </div>';
                      $_SESSION['Erreur'] = "";
                    }
                ?>
                <h1>liste des produits</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Nombre</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        //foreach boucle sur la variable reult
                        foreach($result as $produit){
                        ?>
                        <tr> 
                            <td><?= $produit['id'] ?></td>
                            <td><?= $produit['lis_produit'] ?></td>
                            <td><?= $produit['lis_prix'] ?></td>
                            <td><?= $produit['lis_nombre'] ?></td>
                            <td><a href="details.php?id=<?= $produit['id'] ?>">Voir</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add.php" class="btn btn-primary">Ajouter un produit</a>       
            </section>
        </div>
    </main>


</body>
</html>