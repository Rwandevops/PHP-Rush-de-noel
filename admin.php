<?php
require_once("user.php");
require_once("category-product.php");
require_once("database.php");
require_once("viewuser.php"); 
session_start();

function connexDB() : PDO
{
    $dsn = 'mysql:dbname=pool_php_rush;host=127.0.0.1:3306';
    $user = 'root';
    $password = 'password';

    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Connexion DB OK ';
    } catch (PDOException $e) {
        //echo 'Connexion DB KO : ' . $e->getMessage();
    }
    return $db;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <!-- ajouter le lien vers le CSS -->
    <title>Admin.php</title>
</head>
<body>
    <?php if (isset($_SESSION['id'])) {
    echo("BRAVO ".$_SESSION['username'].", vous etes sur la page Admin -;)");
//session_destroy();
} else {
        header('Location: login.php');
    }
    ?>
    <a href="logout.php">LOG OUT</a>
    <br>



    <?php
// si l'utilisateur n'est pas administrateur ou pas enregistré, on le (vire) redirige vers login
if(!$_SESSION["admin"])
    {
        echo("Vous n'êtes pas administrateur\n");
        header('location:index.php');
    }

$users=new ViewUser();
$users->showAllUsers();



?>


   <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// create user Créer un utilisateur</label>
                <input type="text" name="user_create">
            <button type="submit" class="btn" >CREATE!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// delete user Supprimer un utilisateur</label>
                <input type="text" name="user_delete">
            <button type="submit" class="btn" >DELETE!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// update user Modifier un utilisateur</label>
                <input type="text" name="user_update">
            <button type="submit" class="btn" >UPDATE!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// display user Afficher un utilisateur</label>
                <input type="text" name="user_display">
            <button type="submit" class="btn" >DISPLAY!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// add product Créer un produit</label>
                <input type="text" name="product_create">
            <button type="submit" class="btn" >CREATE!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// delete product Supprimer un produit</label>
                <input type="text" name="product_delete">
            <button type="submit" class="btn" >DELETE!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// update product Editer un produit</label>
                <input type="text" name="product_update">
            <button type="submit" class="btn" >UPDATE!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// display product Afficher un produit</label>
                <input type="text" name="product_display">
            <button type="submit" class="btn" >DISPLAY!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// display product Afficher une catégorie</label>
                <input type="text" name="category_display">
            <button type="submit" class="btn" >DISPLAY!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// add category Créer une catégorie</label>
                <input type="text" name="category_create">
            <button type="submit" class="btn" >CREATE!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// delete category Supprimer une catégorie</label>
                <input type="text" name="category_delete">
            <button type="submit" class="btn" >DELETE!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// update category Editer une catégorie</label>
                <input type="text" name="category_update">
            <button type="submit" class="btn" >UPDATE!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// grant admin permission Ajouter privilège Admin à User</label>
                <input type="text" name="grant_admin">
            <button type="submit" class="btn" >UPDATE!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// revoke admin permission Retirer privilège Admin à User</label>
                <input type="text" name="revoke_admin">
            <button type="submit" class="btn" >UPDATE!!</button>
        </div>
    </form>
    <br>
    
    <form method="post" action="admin.php">
        <div class ="admin">
            <label>// display profile Afficher son profil</label>
                <input type="text" name="display_profile">
            <button type="submit" class="btn" >DISPLAY!!</button>
        </div>
    </form>


    <!-- <label>USER SEARCH ENGINE:</label>
        <input type="text" list="users"/>
        <datalist id="users">
            <?php
                // $admin=new admin($_SESSION['username'],$_SESSION['mail'],$_SESSION['password']);
                // $sqlconnection=connexDB();
                // $sql_query = "SELECT username from users order by id";
                // $cmd = $sqlconnection->prepare($sql_query);
                // $cmd->execute();
                // $result = $cmd->fetchAll(PDO::FETCH_CLASS,"user");
                // foreach($result as $admin) {
                //     echo $user->datalistLine();
                // }
            ?>
        </datalist> 
             -->
            <!-- <br>
            <label>CATEGORY SEARCH ENGINE:</label>
        <input type="text" list="categories"/>
        <datalist id="categories">
            <?php
                // $category=new category("CHAISE",null);
                // $sqlconnection=connexDB();
                // $sql_query = "SELECT name from categories order by id";
                // $cmd = $sqlconnection->prepare($sql_query);
                // $cmd->execute();
                // $result = $cmd->fetchAll(PDO::FETCH_CLASS,"category");
                // var_dump($result);
                // foreach($result as $category) {
                //     echo $category->datalistLine();
                // }
            ?>
         </datalist>  -->
            <!--  
        <br>
            <label>PRODUCT SEARCH ENGINE:</label>
        <input type="text" list="products"/>
        <datalist id="products">   -->
            <?php
                // $admin=new admin($_SESSION['username'],$_SESSION['mail'],$_SESSION['password']);
                // $sqlconnection=connexDB();
                // $sql_query = "SELECT name from products order by id";
                // $cmd = $sqlconnection->prepare($sql_query);
                // $cmd->execute();
                // $result = $cmd->fetchAll(PDO::FETCH_CLASS,"product");
                // foreach($result as $admin) {
                //     echo $user->datalistLine();
                // }
            ?>
        <!-- </datalist>  -->

</body>
</html>