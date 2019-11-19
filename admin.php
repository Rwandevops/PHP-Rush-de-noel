<?php
// si l'utilisateur n'est pas administrateur ou pas enregistré, on le (vire) redirige vers login
if(!$_SESSION["admin"])
    {
        echo("Vous n'êtes pas administrateur\n");
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin page</title>
    // ajouter le lien vers le CSS
</head>
<body>
    // create user
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>Créer un utilisateur</label>
                <input type="name" name="name">
            <button type="submit" class="btn" name="user_create">CREATE!!</button>
        </div>
    </form>

    // delete user
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>Supprimer l'utilisateur</label>
                <input type="name" name="name">
            <button type="submit" class="btn" name="user_delete">DELETE!!</button>
        </div>
    </form>

    // modify user
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>Modifier l'utilisateur</label>
                <input type="name" name="name">
            <button type="submit" class="btn" name="user_modify">MODIFY!!</button>
        </div>
    </form>

    // display user
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>Afficher l'utilisateur</label>
                <input type="name" name="name">
            <button type="submit" class="btn" name="user_display">DISPLAY!!</button>
        </div>
    </form>

    // add product
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>Créer produit</label>
                <input type="name" name="name">
            <button type="submit" class="btn" name="product_create">CREATE!!</button>
        </div>
    </form>

    // delete product
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>Supprimer produit</label>
                <input type="name" name="name">
            <button type="submit" class="btn" name="product_delete">DELETE!!</button>
        </div>
    </form>

    // edit product
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>Editer un produit</label>
                <input type="name" name="name">
            <button type="submit" class="btn" name="product_modify">EDIT!!</button>
        </div>
    </form>

    // display product
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>Afficher un produit</label>
                <input type="name" name="name">
            <button type="submit" class="btn" name="product_display">DISPLAY!!</button>
        </div>
    </form>

    // add category
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>Créer catégorie</label>
                <input type="name" name="name">
            <button type="submit" class="btn" name="category_create">CREATE!!</button>
        </div>
    </form>

    // delete product
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>Supprimer une catégorie</label>
                <input type="name" name="name">
            <button type="submit" class="btn" name="category_delete">DELETE!!</button>
        </div>
    </form>

    // edit product
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>Editer une catégorie</label>
                <input type="name" name="name">
            <button type="submit" class="btn" name="category_modify">EDIT!!</button>
        </div>
    </form>
</body>
</html>