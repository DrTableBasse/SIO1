<?php
//Afficher produit par membre
if(\Samuel\Shop\Shop::afficherProduitByMemberId($_SESSION['id'])){
    foreach (\Samuel\Shop\Shop::afficherProduitByMemberId($_SESSION['id']) as $product) {
        echo "<br />";
        echo "<br />";
        echo $product["nom_produit"];

        echo "<br />";

        echo $product["description_produit"];
    }
}
//Afficher produit par membre
    //on stock toutes les informations dans la variables produits puis traitement de données
    foreach (\Samuel\Shop\Shop::getAll() as $product) {
        $id = $product->id;

        if(isset($_POST['supprimer'])){
            \Samuel\Shop\Shop::deleteProductById($id);
        }
        //dans la variable produit on utilise la fonction getUserByProduct dans laquelle on stock l'id du membre
        $userPseudo = \Samuel\Shop\Shop::getUserByProduct($product->members_id);
        ?>
        <br />
        <br />
        Pseudo : <?= $userPseudo['pseudo'] ?>
        <br />
        Nom Produit: <?= $product->nom_produit ?>
        <br />
        Description : <?= $product->description_produit ?>
        <br />
        <form method="post" ><input type="submit" name="supprimer" value="suprimer le produit"></form>

<?php
    }
    ?>
