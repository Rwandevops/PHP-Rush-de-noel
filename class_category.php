<?php
require_once('class_database.php');
require_once('SQLQueriesCategory.php');

class Category extends Database
{
    private $name;
    protected $parentId;
    static $Id = 0;

    public function setName($conn, $name)
        {
            $this->name = $name;
            updateCategoryName($conn, $name); // modif de la bdd
        }

    public function getName($conn, $id)
        {
            return getCategoryName($conn, $id);
        }

    public function getParentId($conn, $id)
        {
            return getCategoryParentId($conn, $Id);
        }
    
    public function __construct($conn, $name, $parent_id)
        {
            setName($name);
            $this->parentId = $parent_id;
            self::$Id++;
            add_category($conn);  // enregistrement dans la BDD
        }

    public function __destruct($conn, $id)
        {
            delete_category($conn, $id); //détruire la ligne product dans la BDD
        }
  public function datalistLine()
        {
             return sprintf('<option value="%s">',$this->name);
        }
}
