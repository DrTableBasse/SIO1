<?php foreach (\Samuel\Shop\Shop::getAll() as $element){ ?>
    <?= $element['nom_produit'] ?>
    <?= $element['quantite_produit'] ?>
    <?= $element['prix_produit'] ?>
    <?= $element['description_produit'] ?>
    <?= $element['image_produit'] ?>
    <?= $element['slug'] ?>
<?php } ?>
