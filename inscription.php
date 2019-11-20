<?php
require_once("validate.php");
require_once("database.php");
require_once("password.php");

session_start();


$db=new Database();
$conn=$db->connect();

$verif=new Validate();
$pass=new Password();

function writeDB(PDO $db)
{
    try {
        $hash=$pass->hashPassword($_POST["password"]);
        // définir newId et admin
        $newId=12;
        $admin=false;

        //test doublon email dans la table
        $doublon=null;
        $sql_query = $conn->prepare("SELECT email FROM users where email= ?");
        $sql_query->bindParam(1, $_POST["email"], PDO::PARAM_STR);
        $sql_query->execute();
        $doublon = $sql_query->fetch(PDO::FETCH_NUM);
        var_dump($doublon);
        var_dump($_POST);
        var_dump($_SESSION);
        
        if ($doublon[0]!=false) {
            $_SESSION["ErrorMsg"]="Erreur : Champ mail déjà renseigné dans la base !";
        }
        var_dump($_SESSION);
        
        $sql_query=$conn->prepare("INSERT INTO users (username, email, password, admin) VALUES(:name, :email, :password, :admin)");
        //$sql_query->bindParam(':id', $newId ,PDO::PARAM_INT);
        $sql_query->bindParam(':name', ($_POST["name"]), PDO::PARAM_STR);
        $sql_query->bindParam(':email', ($_POST["email"]), PDO::PARAM_STR);
        $sql_query->bindParam(':password', $hash, PDO::PARAM_STR);
        $sql_query->bindParam(':admin', $admin, PDO::PARAM_BOOL);
        $sql_query->execute();

        

        $sql_query = $conn->prepare("SELECT id FROM users where email= ?");
        $sql_query->bindParam(1, $_POST["email"], PDO::PARAM_STR);
        $sql_query->execute();
        $id = $sql_query->fetch();
        $_SESSION["id"]=$id[0];
    } catch (PDOException $ex) {
        //echo $ex->getMessage();
    }
    
    $_SESSION["new"]=true;
    $_SESSION["mail"]=$_POST["email"];
    $_SESSION["username"]=$_POST["name"];
    $_SESSION["password"]=$_POST["password"];
    $_SESSION["admin"]=$admin;
    if (empty($_SESSION["ErrorMsg"])) {
        //Appel Login.php
        header('Location: login.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription.php</title>
</head>
<body>
<?php
if (!empty($_SESSION["ErrorMsg"]) && $_SESSION["new"]) {
    echo($_SESSION["ErrorMsg"]);
    $_SESSION["ErrorMsg"]="";
    $_SESSION["new"]=false;
}
$validateForm=true;
$name=null;
$mail=null;
$password=null;
$password_confirm=null;

require_once("validate.php");



if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['email'])) {
    $mail = $_POST['email'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
if (isset($_POST['password_confirmation'])) {
    $password_confirm = $_POST['password_confirmation'];
}

if (!($name==null or $mail==null or $password==null or $password_confirm==null)) {
    if (!$verif->validateName($_POST["name"])) {
        echo("Invalid name.\n");
        $validateForm=false;
    }
    if (!$verif->validateMail($_POST["email"])) {
        echo("Invalid mail.\n");
        $validateForm=false;
    }
    if (!$verif->validatePassword($_POST["password"]) or !$verif->validatePasswordConfirmation($_POST["password"],$_POST["password_confirmation"])) {
        echo("Invalid password or password confirmation.\n");
        $validateForm=false;
    }

    if ($validateForm) {
        //$db=connect();
        writeDB($db);
    }
}
?>

    <form method="post" action="inscription.php" >
    <label>NOM</label><input  type="text" name="name" placeholder="Entrez votre nom">
    <br>
    <label>EMAIL</label><input  type="text" name="email" placeholder="Entrez votre email">
    <br>
    <label>PASSWORD</label><input  type="password" name="password" value="password">
    <br>
    <label>CONFIRM</label><input  type="password" name="password_confirmation" value="password_confirmation">
    <br>
    <input  type="submit" value="submit" />
    </form>
    </body>
    </html>
