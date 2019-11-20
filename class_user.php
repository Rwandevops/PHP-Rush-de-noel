<?php
require_once('class_database.php');
require_once('SQLQueriesUser.php');
class User extends Database
{
    protected $name;
    protected $email;
    protected $password;
    protected $isAdmin = false;
    private static $Id = 0;

    public function getName($conn)
        {
            return SQLgetUserName($conn, $this->Id);
        }

    public function setName($conn, $name)
        {
            $this->name = $name;
            SQLUserNameUpdate($conn, $this->Id, $name); // modif dans la BDD
        }

    public function getEmail($conn)
        {
            return SQLGetUserEmail($conn, $this->Id);
        }

    public function setEmail($conn, $email)
        {
            $this->email = $email;
            SQLUserUpdate($conn, $this->Id, $email); // modif dans la BDD
        }
    
    public function setPassword($conn, $password)
        {
            $this->password = password_hash($password);
            SQLUserUpdate($conn, $this->Id, $this->password); // modif dans la BDD
        }
    
    public function getPassword()
        {
            return SQLGetUserPassword($conn, $this->Id);
        }

    public function getIsAdmin()
        {
            return SQLGetUserIsAdmin($conn, $this->Id);
        }

    public function productDisplay(product $product)
        {
            $product->display();
        }

    public function selfDisplay()
        {
            header('location:profil.php');
        }
    
    protected function getSelfUser() //=displayself
        {
            $sql="SELECT * FROM users"; //where id=id
            $result=$this->connect()->query($sql);
            $numRows=$result->rowCount();
            if ($numRows>0)
            {
                while($row=$result->fetch(PDO::FETCH_ASSOC))
                {
                    $data[]=$row;
                }
                return $data;
            }
        }
    
    public function productSearchEngine(product $product)
        {
            // recherche un produit dans la BDD
        }
    
    public function dataListLine()
    {
        return sprintf('<option value="%s">',$this->name);
    }

    public function __construct($name, $email, $password)
        {
            $this->name = $name;
            $this->email = $email;
            $this->password = password_hash($password);
            self::$ID++;
            SQLAddUser($conn, $name, $email, $this->password); // enregistrement dans la BDD
        }

    public function __destruct()
        {
            SQLDeleteUser($conn, $this->Id); // détruit la ligne user dans la BDD
        }
}
