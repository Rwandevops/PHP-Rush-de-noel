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
            SQLUpdateCategoryName($conn, $this->Id, $name); // modif de la bdd
        }

    public function getName($conn)
        {
            return SQLgetCategoryName($conn, $this->Id);
        }

    public function setParentId($conn, $parentId)
        {
            $this->parentId = $parentId;
            SQLUpdateCategoryParentId($conn, $this->id, $parentId); // enregistrement dans la BDD
        }
    
    public function getParentId($conn)
        {
            return SQLgetCategoryParentId($conn, $this->Id);
        }
    
    public function __construct($conn, $name, $parent_id)
        {
            $this->name = $name;
            $this->parentId = $parent_id;
            self::$Id++;
            SQLAddCategory($conn, $name, $parent_id);  // enregistrement dans la BDD
        }

    public function __destruct($conn, $id)
        {
            SQLdeleteCategory($conn, $id); //détruire la ligne product dans la BDD
        }
  public function datalistLine()
        {
             return sprintf('<option value="%s">',$this->name);
        }
}
