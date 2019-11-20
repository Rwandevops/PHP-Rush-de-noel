<?php
//user : id, username, password, email, admin

// Add user :
function userAdd(PDO $db,$username,$password,$email,$admin)
{
    $sql = "INSERT INTO users (username, password, email, admin VALUES(:username, :password, :email, :admin))";
                                          
    $stmt = $db->prepare($sql);
                                              
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR); 
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);       
    $stmt->bindParam(':admin', $admin, PDO::PARAM_BOOL); 
                                      
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update user name:
function userNameUpdate(PDO $db,$username,$id)
{
    $sql = "UPDATE users SET username = :username WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update user email:
function userEmailUpdate(PDO $db,$email,$id)
{
    $sql = "UPDATE users SET email = :email WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update user name:
function userPasswordUpdate(PDO $db, $password, $id)
{
    $sql = "UPDATE users SET password = :password WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);    
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update user isAdmin:
function userIsAdminUpdate(PDO $db, bool $isAdmin, $id)
{
    $sql = "UPDATE users SET isAdmin = :isAdmin WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    
    $stmt->bindParam(':isAdmin', $isAdmin, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Get user Name:
function userNameGet(PDO $db, $id)
{
    $sql = "SELECT name FROM users WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);     
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Get user Email:
function userEmailGet(PDO $db,$email)
{
    $sql = "SELECT email FROM users WHERE email = :email";

    $stmt = $db->prepare($sql);                                  
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);     
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Get user id:
function userIdGet(PDO $db,$email)
{
    $sql = "SELECT id FROM users WHERE email = :email";

    $stmt = $db->prepare($sql);                                  
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);     
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Get user Password:
function userPasswordGet(PDO $db, $id)
{
    $sql = "SELECT password FROM users WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);     
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Get user isAdmin:
function userIsAdminGet(PDO $db,$id)
{
    $sql = "SELECT isAdmin FROM users WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);     
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Delete user :
function userDelete(PDO $db,$id)
{
    $sql = "DELETE FROM users WHERE id =  :id";
    
    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);  

    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //
