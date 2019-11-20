<?php
//category : id, name, parent_id

// Add category :
function addCategory(PDO $db, $name, $parent_id)
{
  
    $sql = "INSERT INTO categories (name, parent_id VALUES(:name, :parent_id))";
                                          
    $stmt = $db->prepare($sql);
                                              
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);       
    $stmt->bindParam(':parent_id', $parent_id, PDO::PARAM_INT); 
                                      
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update category name:
function updateCategoryName(PDO $db, $id, $name)
{
    $sql = "UPDATE categories SET name = :name WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);           
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);           
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update category parent_id:
function updateCategoryParentId(PDO $db, $id, $parent_id)
{
    $sql = "UPDATE categories SET parent_id = :parent_id WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':parent_id', $parent_id, PDO::PARAM_INT);           
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Get category name:
function getCategoryName(PDO $db, $id)
{
    $sql = "SELECT name FROM users WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);           
    $stmt->execute();
    $categoryName = $stmt->fetch(PDO::FETCH_NUM);
    return $categoryName[0];
}

// Get category parent_id:
function getCategoryParentId(PDO $db, $id)
{
    $sql = "SELECT parent_id FROM users WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);           
    $stmt->execute();
    $categoryParentId = $stmt->fetch(PDO::FETCH_NUM);
    return $categoryParentId[0];
}

// Delete category :
function deleteCategory(PDO $db, $id)
{
    $sql = "DELETE FROM categories WHERE id =  :id";
    
    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);  

    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //
