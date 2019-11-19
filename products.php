<?php
// product : id, name, price, category_id

// Add product :
function add_product(PDO $db)
{
    $sql = "INSERT INTO products (name, price, category_id VALUES(:name, :price, :category_id)";
                                          
    $stmt = $pdo->prepare($sql);
                                              
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam(':price', $_POST['price'], PDO::PARAM_INT); 
    $stmt->bindParam(':category_id', $_POST['category_id'], PDO::PARAM_INT);       
                                      
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update product :
function update_product(PDO $db)
{
    $sql = "UPDATE products SET name = :name, price = :price, category_id = :category_id WHERE id = :id";

    $stmt = $pdo->prepare($sql);                                  
    
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam(':price', $_POST['price'], PDO::PARAM_INT); 
    $stmt->bindParam(':category_id', $_POST['category_id'], PDO::PARAM_INT);
   
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Delete product :
function delete_product(PDO $db)
{
    $sql = "DELETE FROM products WHERE id =  :id";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);  

    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //
