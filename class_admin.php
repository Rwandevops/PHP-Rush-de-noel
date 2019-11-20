<?php
require_once('class_user.php');
require_once('SQLQueriesCategory.php');
require_once('SQLQueriesProduct.php');
require_once('SQLQueriesUser.php');

class Admin extends User
{
    protected $isAdmin = true;
    
    public function createAdmin($conn, $name, $email, $password)
        {
            __construct($name, $email, $password); // SQL géré dans __construct
        }
    
    public function createUser($conn, $name, $email, $password)
        {
            parent::__construct($name, $email, $password); // SQL géré dans __parent::construct
        }
    
    public function deleteUser($conn, user $user)
        {
            $user->__destruct($conn, $user->getId()); // SQL géré dans __destruct
        }

   public function modifyUserName($conn, user $user, $name)
       {
            $user->setName($conn, $user->getId(), $name); // SQL géré dans la méthode de user
       }

    public function modifyUserEmail($conn, $user, $email)
       {
            $user->setEmail($conn, $user->getId(), $email); // SQL géré dans la méthode setEmail
       }

    public function modifyUserPassword($conn, user $user, $password)
       {
            $user->setPassword($conn, $user->getId(), $password); // SQL géré dans la méthode setPassword
//            SQLUserPasswordUpdate($conn, $id, $password); // modification de la BDD
       }

    public function getIsAdmin($conn, $id)
        {
            return SQLgetUserIsAdmin($conn, $id);
        }

    private function setUserToAdmin($conn, user $user)
        {
            $name = $user->name;
            $email = $user->email;
            $password = $user->password;
            deleteUser($conn, $user); // SQL géré dans deleteUser
            createAdmin($conn, $name, $email, $password); // SQL géré dans createAdmin
            echo($name . " est maintenant administrateur.\n");
            SQLUpdateUserIsAdmin($conn, $this->id, true); // modification de la BDD
        }
    
    private function setAdminToUser($conn, admin $admin)
        {
            $name = $admin->name;
            $email = $admin->email;
            $password = $admin->password;
            $admin->__destruct($conn); // SQL géré dans __destruct
            createUser($conn); // SQL géré dans la BDD
            echo($name . " est maintenant simple utilisateur.\n");
            
            SQLUpdateUserIsAdmin($conn, $this->id, false); // modification de la BDD
        }

    public function createProduct($conn, $name, $category, $price)
        {
            $product = new product($conn, $name, $category, $price); // SQL géré par product->__construct
        }
    
    public function deleteProduct($conn, product $product)
        {
            $product->__destruct($conn, $product->id); // SQL géré dans la méthode __destruct
        }

   public function modifyProductName($conn, product $product, $name)
       {
            setName($conn, $product->getId(), $name); // SQL géré dans setName
       }

    public function modifyProductCategory($conn, product $product, $productCategory)
       {
            $product->setProductCategory($conn, $product->getProductId(), $productCategory); // SQL géré dans la méthode setProductCategory
       }

    public function modifyProductPrice($conn, product $product, $price)
       {
            $product->setPrice($conn, $product->getProductId(), $price); // SQL géré dans la méthode getProductId();
       }

    public function modifyCategoryName($conn, category $category, $name)
       {
           $category->setName($conn, $category->getId(), $name); // SQL géré dans la méthode setName
       }
       
    public function dataListLine()
        {
            return sprintf('<option value="%s">',$this->name);
        }
    
    protected function getAllUsers()
        {
            $sql="SELECT * FROM users";
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

    public function __construct($conn)
        {
            parent::__construct(); // SQL géré dans cette méthode
            $this->isAdmin = true;
            SQLUserIsAdminUpdate($conn, $this->getId(), true); // modif de la BDD
        }
}
