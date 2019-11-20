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
            // + enregistrement dans la BDD
        }

    public function getEmail()
        {
            return $this->email;
        }

    public function setEmail($email)
        {
            $this->email = $email;
            // + enregistrement dans la BDD
        }
    
    public function setPassword($password)
        {
            $this->password = password_hash($password);
            // + enregistrement dans la BDD
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
            // + enregistrement dans la BDD
        }

    public function __destruct()
        {
            //détruire la ligne user dans la BDD
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
