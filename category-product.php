<?php

class product
{
    private $name;
    private $category;
    private $price;
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

    public function getCategory()
        {
            return $this->category;
        }

    public function setCategory($category)
        {
            $this->category = $category;
            // + enregistrement dans la BDD
        }
    
    public function getPrice()
        {
            return $this->price;
        }

    public function setPrice($price)
        {
            $this->price = $price;
            // + enregistrement dans la BDD
        }
    
    public function display()
        {
            // affiche le produit
        }

    public function __construct($name, $category, $price)
        {
            $this->setName($name);
            $this->setCategory($category);
            $this->setPrice($price);
            self::$ID++;
            // + enregistrement dans la BDD
        }

    public function __destruct()
        {
            //détruire la ligne product dans la BDD
        }
        public function datalistLine()
        {
             return sprintf('<option value="%s">',$this->name);
        }

}

class category
{
    private $name;
    protected $parentId;
    static $ID = 0;

    public function setName($name)
        {
            $this->name = $name;
        }

    public function getName()
        {
            return $this->name;
        }

    public function getParentId()
        {
            return $this->parentId;
        }
    
        public function __construct($name=null, $parent_id=null)
        {
            $this->setName($name);
            $this->parentId = $parent_id;
            self::$ID++;
            // + enregistrement dans la BDD
        }

    public function __destruct()
        {
            //détruire la ligne product dans la BDD
        }
        public function datalistLine()
        {
             return sprintf('<option value="%s">',$this->name);
        }
}