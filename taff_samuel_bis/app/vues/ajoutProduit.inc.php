




<form method="post">
    <h1>connexion</h1>
    <input type="text" name="NomProduit" placeholder="Veuillez rentrer le nom de votre produit">
    <input type="text" name="Quantite" placeholder="Veuillez rentrer le nombre de produit(s) que vous vendez">
    <input type="text" name="Prix" placeholder="Veuillez rentrer le prix de votre produit">
    <input type="text" name="Description" placeholder="Veuillez décrire votre produit">
    <input type="submit" name="AjoutProduit">

</form>

<?php

if(isset($_POST['AjoutProduit'])){
    if(\Samuel\Website\siteInterface::banWordList($_POST['Description'])){
        echo "Votre paragraphe contient des mots interdits. Veuillez le changer.";
    }
    else{
        $title = $_POST['NomProduit'];
        $slug = \Samuel\Website\siteInterface::slugify($title);
        $qtk = $_POST['Quantite'];
        $prix = $_POST['Prix'];
        $desc = $_POST['Description'];

        \Samuel\Shop\Shop::addProduct($title,$qtk,$prix,$desc,$slug,$_SESSION['id']);
    }
}

?>