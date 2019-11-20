<?php
// product : id, name, price, category_id

// Add product :
function addProduct(PDO $db, $name, $price, $category_id)
{
    $sql = "INSERT INTO products (name, price, category_id) VALUES(:name, :price, :category_id)";
                                          
    $stmt = $db->prepare($sql);
                                              
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT); 
    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);       
                                      
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update product name:
function updateProductName(PDO $db, $id, $name)
{
    $sql = "UPDATE products SET name = :name WHERE id = :id";

    $stmt = $pdo->prepare($sql);                                  
    
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update product price:
function updateProductPrice(PDO $db, $id, $price)
{
    $sql = "UPDATE products SET price = :price WHERE id = :id";

    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update product category:
function updateProductCategory(PDO $db$id, $category)
{
    $sql = "UPDATE products SET category = :category WHERE id = :id";

    $stmt = $db->prepare($sql);                
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
   
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Get product name:
function getProductName(PDO $db, $id)
{
    $sql = "SELECT name FROM products WHERE id =  :id";
    
    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);  

    $stmt->execute();
    $productName = $stmt->fetch(PDO::FETCH_NUM);
    return $productName;
}

// ------------------------------------------------------------------------------------------------------------ //

// Get product category:
function productCategoryGet(PDO $db,; $id)
{
    $sql = "SELECT category FROM products WHERE id =  :id";
    
    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);  

    $stmt->execute();
    $productCategory = $stmt->fetch(PDO::FETCH_NUM);
    return $productCategory;
}

// ------------------------------------------------------------------------------------------------------------ //

// Delete product :
function productDelete(PDO $db, $id)
{
    $sql = "DELETE FROM products WHERE id =  :id";
    
    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);  

    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //
