<?php
require_once('class_user.php');

class Admin extends User
{
    protected $isAdmin = true;
    
    public function adminCreate($name, $email, $password)
        {
            __construct($name, $email, $password);
            // + inscription à la BDD
        }
    
    public function userCreate($name, $email, $password)
        {
            parent::__construct($name, $email, $password);
            // + inscription à la BDD
        }
    
    public function userDelete(user $user)
        {
            $user->__destruct();
            // + inscription dans la BDD
        }

   public function userNameModify(user $user, $name)
       {
            $user->setName($name);
       }

    public function userEmailModify(user $user, $email)
       {
            $user->setEmail($email);
       }

    public function userPasswordModify(user $user, $password)
       {
            $user->setPassword($name);
       }

    public function getIsAdmin()
        {
            return $this->isAdmin;
        }

    private function setToAdmin(user $user)
        {
            $user_ID = $user->id;
            createAdmin($user->name, $user->email, $user->password);
            echo($user->name . " est maintenant administrateur.\n");
            deleteUser($user);
            // + modif de la bdd
        }
    
    private function setToUser(admin $admin)
        {
            createUser($admin->name, $admin->email, $admin->password);
            echo($admin->name . " est maintenant simple utilisateur.\n");
            __destruct($admin);
            // + modif de la bdd
        }

    public function productCreate($name, $category, $price)
        {
            $this->__construct($name, $category, $price);
            // + inscription à la BDD
        }
    
    public function productDelete(product $product)
        {
            $product->__destruct();
            // + inscription dans la BDD
        }

   public function productNameModify(product $product, $name)
       {
            $product->setName = $name;
       }

    public function productCategoryModify(product $product, $category)
       {
            $product->setCategory = $category;
       }

    public function productPriceModify(product $product, $price)
       {
            $product->setPrice = $price;
       }

    public function categoryNameModify(category $category, $name)
       {
           $category->name = $name;
       }
       
    public function __construct()
        {
            parent::__construct();
            $this->isAdmin = true;
        }
    
    public function dataListLine()
    {
        return sprintf('<option value="%s">',$this->name);
    }
}
