<?php
class Password
{
    public function hashPassword($password) : string
    {
        $hash=password_hash($password, PASSWORD_DEFAULT);
        return $hash;
    }
    public function passwordVerif($password) : bool
    {
        $db=new Database();
        $conn=$db->connect();

        try {
            //retrouver le hash du pwd ds la bdd where email=POST_mail
            $sql_query=$conn->prepare("SELECT password,username FROM users WHERE email= ?");
            $sql_query->bindParam(1, $password($_POST["email"]), PDO::PARAM_STR);
            $sql_query->execute();
            $hash = $sql_query->fetch();

            $_SESSION['username'] = $hash[1];
        } catch (PDOException $e) {
            //echo 'Connexion DB KO : ' . $e->getMessage();
        }

        return  password_verify($_SESSION["password"], $hash[0]);
    }
}