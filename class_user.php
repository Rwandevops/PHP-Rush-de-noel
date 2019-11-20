<?php
require_once('class_database.php');

class User extends Database
{
    protected $name;
    protected $email;
    protected $password;
    protected $isAdmin = false;
    private static $ID = 0;

    public function getName()
        {
            return $this->name;
        }

    public function setName($name)
        {
            $this->name = $name;
            update_user($conn); // modif dans la BDD
        }

    public function getEmail()
        {
            return $this->email;
        }

    public function setEmail($email)
        {
            $this->email = $email;
            update_user($conn); // modif dans la BDD
        }
    
    public function setPassword($password)
        {
            $this->password = password_hash($password);
            update_user($conn); // modif dans la BDD
        }
    
    public function getPassword()
        {
            return $this->password;
        }

    public function productDisplay(product $product)
        {
            $product->display();
        }

    public function selfDisplay()
        {
            header('location:profil.php');
        }

    public function __construct($name, $email, $password)
        {
            setName($name);
            setEmail($email);
            setPassword($password);
            self::$ID++;
            add_user($conn); // enregistrement dans la BDD
        }

    public function __destruct()
        {
            delete_user($conn); // détruit la ligne user dans la BDD
        }
    
    public function productSearchEngine(product $product)
        {
            // recherche un produit dans la BDD
        }
    
    public function dataListLine()
    {
        return sprintf('<option value="%s">',$this->name);
    }
}
