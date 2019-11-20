<?php
//user : id, username, password, email, admin

// Add user :
function userAdd(PDO $db)
{
    $sql = "INSERT INTO users (username, password, email, admin VALUES(:username, :password, :email, :admin))";
                                          
    $stmt = $db->prepare($sql);
                                              
    $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
    $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR); 
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);       
    $stmt->bindParam(':admin', $_POST['admin'], PDO::PARAM_INT); 
                                      
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update user name:
function userNameUpdate(PDO $db)
{
    $sql = "UPDATE users SET username = :username WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    
    $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);  
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update user email:
function userEmailUpdate(PDO $db)
{
    $sql = "UPDATE users SET email = :email WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);  
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update user name:
function userPasswordUpdate(PDO $password)
{
    $sql = "UPDATE users SET password = :password WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    
    $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);    
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Update user isAdmin:
function userIsAdminUpdate(PDO $db, bool $isAdmin)
{
    $sql = "UPDATE users SET isAdmin = :isAdmin WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    
    $stmt->bindParam(':isAdmin', $isAdmin, PDO::PARAM_STR);
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Get user isAdmin:
function userIsAdminGet(PDO $db)
{
    $sql = "SELECT isAdmin FROM users WHERE id = :id";

    $stmt = $db->prepare($sql);                                  
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);     
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Delete user :
function userDelete(PDO $db)
{
    $sql = "DELETE FROM users WHERE id =  :id";
    
    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);  

    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //
