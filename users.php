<?php
//user : id, username, password, email, admin

// Add user :
function add_user(PDO $db)
{
    $sql = "INSERT INTO users (username, password, email, admin VALUES(:username, :password, :email, :admin)";
                                          
    $stmt = $pdo->prepare($sql);
                                              
    $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
    $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR); 
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);       
    $stmt->bindParam(':admin', $_POST['admin'], PDO::PARAM_INT); 
                                      
    $stmt->execute();

}

// ------------------------------------------------------------------------------------------------------------ //

// Update user :
function update_user(PDO $db)
{
    $sql = "UPDATE users SET username = :username, password = :password, email = :email, admin = :admin WHERE id = :id";

    $stmt = $pdo->prepare($sql);                                  
    
    $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
    $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR); 
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);       
    $stmt->bindParam(':admin', $_POST['admin'], PDO::PARAM_INT);  
   
    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //

// Delete user :
function delete_user(PDO $db)
{
    $sql = "DELETE FROM users WHERE id =  :id";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);  

    $stmt->execute();
}

// ------------------------------------------------------------------------------------------------------------ //