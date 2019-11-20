<?php
require_once('class_database');

class Product extends Database
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
            setName($name);
            setCategory($category);
            setPrice($price);
            self::$ID++;
            // + enregistrement dans la BDD
        }

    public function __destruct()
        {
            //détruire la ligne product dans la BDD
        }
}
