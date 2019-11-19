<?php
session_start();
function validatePassword() : bool
{
    if (isset($_POST['password'])) {
        $_SESSION["password"] = $_POST['password'];
    } else {
        $_SESSION["password"]="";
    }
    
    return preg_match("#^[a-zA-Z0-9_]{3,10}$#", $_SESSION["password"]);
}

function validateMail() :bool
{
    $_SESSION["mail"]=($_POST["email"]);
    return preg_match("#^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$#", $_SESSION["mail"]);
}

function passwordVerif() : bool
{
    $bdd=connexDB();
    try {
        //retrouver le hash du pwd ds la bdd where email=POST_mail
        $sql_query=$bdd->prepare("SELECT password,username FROM users WHERE email= ?");
        $sql_query->bindParam(1, ($_POST["email"]), PDO::PARAM_STR);
        $sql_query->execute();
        $hash = $sql_query->fetch();

        $_SESSION['username'] = $hash[1];
    } catch (PDOException $e) {
        //echo 'Connexion DB KO : ' . $e->getMessage();
    }

    return  password_verify($_SESSION["password"], $hash[0]);
}
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

function getId()
{
    $db=connexDB();
    
    $sql_query = $db->prepare("SELECT id FROM users where email= ?");
    
    if ($_SESSION["new"]=true) {
        $sql_query->bindParam(1, $_SESSION["mail"], PDO::PARAM_STR);
    } else {
        $sql_query->bindParam(1, $_POST["email"], PDO::PARAM_STR);
    }
    
    $sql_query->execute();
    $id=intval($sql_query->fetch());
    var_dump("ID=".$id);
    var_dump($_POST);
    return $id;
}

function isAdmin() : ?bool
{
    $db=connexDB();
    $sql_query = $db->prepare("SELECT admin FROM users where id= ?");
    $sql_query->bindParam(1, $_SESSION["id"], PDO::PARAM_STR);
    $sql_query->execute();
    $tab=$sql_query->fetch();
    $isAdmin=$tab[0];
    var_dump("ADMIN=".$isAdmin);
    return $isAdmin;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login.php</title>
</head>
<body>
<?php
if (isset($_SESSION["ErrorMsg"])) {
    echo($_SESSION["ErrorMsg"]);
}

$validateForm=true;
$mail=null;
$password=null;
//$header="login.php";

$_SESSION["id"]=getId();
$_SESSION["admin"]=isAdmin();



if (isset($_POST['email'])) {
    $mail= $_POST['email'];
    $_SESSION['mail']=$mail;
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $_SESSION['password']=$password;
}

if (!$mail==null or !$password==null) {
    if (!validateMail()) {
        //echo ("Invalid mail.\n");
        $validateForm=false;
    }
    if (!validatePassword()) {
        //echo ("Invalid password.\n");
        $validateForm=false;
    }
    if (!passwordVerif()) {
        echo("User not found with this email/password.\n");
        $validateForm=false;
    }

    var_dump("VAL=".$validateForm);

    if ($validateForm) {
        if ($_SESSION["admin"]) {
            header('Location: admin.php');
        } else {
            header('Location: index.php');
        }
    }
    //var_dump("Header=".$header);
}

$valueMail="";
$valuePassword="'password'";

if (isset($_SESSION["new"])) {
    $valueMail=$_SESSION['mail'];
    $valuePassword=$_SESSION['password'];
    echo("Merci pour votre inscription, cliquez sur SUBMIT pour vous connecter automatiquement!\n");
} else {
     //echo("Saisissez votre email et password.\n");
 }
?>

    <form method="post" action="login.php" >
    <label>EMAIL</label><input  type="text" name="email" placeholder="Entrez votre email" <?php echo("value=".$valueMail) ?>>
    <br>
    <label>PASSWORD</label><input  type="password" name="password" value=<?php echo($valuePassword) ?>>
    <br>
    <input  type="submit" value="submit" />
    </form>
    </body>
    </html>
