<?php
//category : id, name, parent_id

// Add category :
function add_category(PDO $db)
{
  
    $sql = "INSERT INTO categories (name, parent_id VALUES(:name, :parent_id)";
                                          
    $stmt = $pdo->prepare($sql);
                                              
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);       
    $stmt->bindParam(':parent_id', $_POST['parent_id'], PDO::PARAM_INT); 
                                      
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update category :
function update_category(PDO $db)
{
    $sql = "UPDATE categories SET name = :name, parent_id = :parent_id  WHERE id = :id";

    $stmt = $pdo->prepare($sql);                                  
    
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);       
    $stmt->bindParam(':parent_id', $_POST['parent_id'], PDO::PARAM_INT);    
   
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Delete category :
function delete_category(PDO $db)
{
    $sql = "DELETE FROM categories WHERE id =  :id";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);  

    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //
