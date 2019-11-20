<?php
require_once("database.php");
require_once("validate.php");
require_once("password.php");
require_once("user.php");

$pass=new Password();

$verif=new Validate();


// VERIF SESSION ADMIN ET NEW
session_start();

function getId()
{
    $db=new Database();
    $conn=$db->connect();
    
    $sql_query = $conn->prepare("SELECT id FROM users where email= ?");
    
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

function getIsAdmin() : ?bool
{
    $db=new Database();
    $conn=$db->connect();
    $sql_query = $conn->prepare("SELECT admin FROM users where id= ?");
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
$_SESSION["admin"]=getIsAdmin();



if (isset($_POST['email'])) {
    $mail= $_POST['email'];
    $_SESSION['mail']=$mail;
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $_SESSION['password']=$password;
}

if (!$mail==null or !$password==null) {
    if (!$verif->validateMail()) {
        //echo ("Invalid mail.\n");
        $validateForm=false;
    }
    if (!$verif->validatePassword()) {
        //echo ("Invalid password.\n");
        $validateForm=false;
    }
    if (!$pass->passwordVerif()) {
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

if ($_SESSION["new"]) {
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
