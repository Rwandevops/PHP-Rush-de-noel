<?php

class user
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

    public function displayProduct(product $product)
        {
            $product->display();
        }

    public function displaySelf()
        {
            // Afficher profil
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
}

class admin extends user
{
    private $isAdmin = true;
    
    public function createAdmin($name, $email, $password)
        {
            __construct($name, $email, $password);
            // + inscription à la BDD
        }
    
    public function createUser($name, $email, $password)
        {
            parent::__construct($name, $email, $password);
            // + inscription à la BDD
        }
    
    public function deleteUser(user $user)
        {
            $user->__destruct();
            // + inscription dans la BDD
        }

//    public function modifyUser(user $user)
//        {
//             à écrire
//        }

    public function getIsAdmin()
        {
            return $this->isAdmin;
        }

    private function setToAdmin(user $user)
        {
            $user_ID = $user->id;
            createAdmin($user->name, $user->email, $user->password);
            echo($user->name . " est maintenant administrateur");
            deleteUser($user);
            // + modif de la bdd
        }
    
    private function setToUser(admin $admin)
        {
            createUser($admin->name, $admin->email, $admin->password);
            echo($admin->name . " est maintenant simple utilisateur");
            __destruct($admin);
            // + modif de la bdd
        }

    public function createProduct($name, $category, $price)
        {
            $this->construct($name, $category, $price);
            // + inscription à la BDD
        }
    
    public function deleteProduct(product $product)
        {
            $product->__destruct();
            // + inscription dans la BDD
        }

//    public function modify_product()
//        {
            // à écrire
//        }

    public function __construct()
        {
            parent::__construct();
            $this->isAdmin = true;
        }
}


