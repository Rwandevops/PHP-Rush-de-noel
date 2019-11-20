<?php
require_once('class_database');
require_once('SQLQueriesProduct');

class Product extends Database
{
    private $name;
    private $category;
    private $price;
    private static $Id = 0;

    public function getName($conn)
        {
            return SQLGetProductName($conn, $this->Id);
        }

    public function setName($conn, $name)
        {
            $this->name = $name;
            SQLUpdateProductName($conn, $this->Id, $name);
        }

    public function getCategory()
        {
            return SQLGetProductCategory($conn, $this->Id);
        }

    public function setCategory($category)
        {
            $this->category = $category;
            SQLUpdateProductCategory$conn, $this->Id, $category);
        }
    
    public function getPrice()
        {
            return SQLGetProductPrice($conn, $this->Id);
        }

    public function setPrice($price)
        {
            $this->price = $price;
            SQLUpdateProductPrice($conn, $this->Id, $price);
        }

    public function __construct($name, $category, $price)
        {
            $this->name = $name;
            $this->category = $category;
            $this->price = $price;
            self::$Id++;
            addProduct($conn, $name, $category, $price); // enregistrement dans la BDD
        }

    public function __destruct($conn)
        {
            delete_product($conn, $this->Id); //détruire la ligne product dans la BDD
        }
}
