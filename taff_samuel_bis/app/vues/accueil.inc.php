<?php
//Afficher produit par membre
    foreach(\Samuel\Shop\Shop::getAll() as $product){
        $id = $product->id;

        if(isset($_POST['supprimer'])){
            \Samuel\Shop\Shop::deleteProductById($id);
        }
        $userPseudo = \Samuel\Shop\Shop::getUserByProduct($product->members_id); ?>
        <br />
        <br />
        Pseudo :<?=$userPseudo['pseudo']?>
        <br />
        Nom Produit: <?= $product->nom_produit ?>
        <br />
        Description : <?= $product->description_produit ?>
        <br />

<?php } ?>