<?php
require_once('class_database.php');

class Category
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
    
        public function __construct($name, $parent_id)
        {
            setName($name);
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
