<!DOCTYPE html>
<html>
<head>
    <!-- là où doit être le fichier -->
    <base href="/www/taff_samuel_bis/">
    <meta charset="utf-8">
    <title></title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="public/css/style.css?<?= date("s") ?>">

</head>
<body>

<nav>
    <ul>
        <li><a href="accueil">Accueil</a></li>
        <li><a href="information">Information</a></li>
        <li><a href="inscription">Inscription</a></li>
        <li><a href="connexion">Connexion</a></li>
        <?php if(isset($_SESSION['user'])): ?>
            <li><a href="user">Espace Membre</a></li>
            <li><a href="logout">LogOut</a></li>
            <li><a href="ajout">Ajouter un Produit</a></li>
            <li><a href="afficherProduit">Afficher Produit</a></li>
        <?php endif; ?>
    </ul>
</nav>

<?= $content ?>

<footer>
    &copy; Samuel  &copy;
</footer>
</body>
</html>


